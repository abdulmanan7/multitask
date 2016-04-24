<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require __DIR__ . "/../vendor/autoload.php";
date_default_timezone_set('UTC');

// spl_autoload_register(function ($class_name) {
// 	include $class_name . '.php';
// });

class Bitrix {
	protected $ci;
	protected $accessToken;
	protected $domain = "solarvent.bitrix24.de";

	public function __construct($props = array()) {
		$this->ci = &get_instance();
		if (count($props) > 0) {
			$this->initialize($props);
		}
	}
	function initialize($config = array()) {
		foreach ($config as $key => $val) {
			$this->$key = $val;
		}
	}
	function get_refresh_code() {
		$this->ci->load->model('utilities_model', 'utility');
		$res = $this->ci->utility->get_refresh_code();
		return $res;
	}
	function save_refresh_code() {
		$this->ci->load->model('utilities_model', 'utility');
		$refresh_code = $this->ci->utility->save_refresh_code();
		return $refresh_code;
	}
	function save_lead($lead_data) {

	}
	function get_all_leads($select = array()) {
		$fullResult = $this->call(
			'crm.lead.list',
			array(
				'select' => array("EMAIL", "TITLE"),
			)
		);
		return $fullResult;
	}

	/**
	 * Add a new lead to CRM
	 * @param array $fields array of fields
	 * @param array $params Set of parameters. REGISTER_SONET_EVENT - performs registration of a change event in a lead in the Activity Stream.
	 * The lead's Responsible person will also receive notification.
	 * @link http://dev.1c-bitrix.ru/rest_help/crm/leads/crm_lead_add.php
	 * @return array
	 */
	public function add($fields = array(), $params = array()) {
		$fullResult = $this->call(
			'crm.lead.add',
			array(
				'fields' => $fields,
				'params' => $params,
			)
		);
		return $fullResult;
	}

	/**
	 * get list of lead fields with description
	 * @link http://dev.1c-bitrix.ru/rest_help/crm/leads/crm_lead_fields.php
	 * @return array
	 */
	public function fields() {
		$fullResult = $this->call(
			'crm.lead.fields'
		);
		return $fullResult;
	}
	/**
	 * Execute Bitrix24 REST API method
	 *
	/**
	 * Makes a request to the specified data to the specified address. In response expected JSON
	 *
	 * @param string $method GET|POST
	 * @param string $url address
	 * @param array|null $data POST-dannye
	 *
	 * @return array
	 */
	function query($method, $url, $data = null) {
		$query_data = "";

		$curlOptions = array(
			CURLOPT_RETURNTRANSFER => true,
		);

		if ($method == "POST") {
			$curlOptions[CURLOPT_POST] = true;
			$curlOptions[CURLOPT_POSTFIELDS] = http_build_query($data);
		} elseif (!empty($data)) {
			$url .= strpos($url, "?") > 0 ? "&" : "?";
			$url .= http_build_query($data);
		}

		$curl = curl_init($url);
		curl_setopt_array($curl, $curlOptions);
		$result = curl_exec($curl);

		return json_decode($result, 1);
	}

/**
 * Calling REST.
 *
 * @param string $domain portal
 * @param string $method called method
 * @param array $params the parameters of the method call
 *
 * @return array
 */
	function call($method, $params) {
		$params["auth"] = $this->accessToken;
		return query("POST", PROTOCOL . "://" . $this->domain . "/rest/" . $method, $params);
	}
	/**
	 * Get access token
	 *
	 * @return string | null
	 */
	public function getAccessToken() {
		return $this->accessToken;
	}
}

/* End of file Bitrix.php */
/* Location: ./application/libraries/Bitrix.php */
