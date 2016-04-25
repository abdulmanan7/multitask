<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require __DIR__ . "/../vendor/autoload.php";
date_default_timezone_set('UTC');

// spl_autoload_register(function ($class_name) {
// 	include $class_name . '.php';
// });

class Bitrix24 {
	protected $ci;
	protected $accessToken;
	protected $domain = "solarvent.bitrix24.de";
	protected $CLIENT_ID = "local.571a7f6ff11954.35288017";
	protected $CLIENT_SECRET = "b84c0178f2ea88b2d7d18fcbebf18b4c";
	protected $REDIRECT_URI = "https://www.solarvent.de/application/uploader/bitrix";
	protected $PATH = "https://www.solarvent.de/application/uploader/bitrix";
	protected $SCOPE = "crm";
	protected $PROTOCOL = "https";
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
	function save_refresh_code($refresh_code) {
		$this->ci->load->model('utilities_model', 'utility');
		$refresh_code = $this->ci->utility->save_refresh_code($refresh_code);
		return $refresh_code;
	}
	function save_lead($lead_data) {
		$fullResult = $this->call(
			'crm.lead.add',
			$params = array(
				'TITLE' => 'Enrico Müller',
				'NAME' => 'Enrico',
				'SECOND_NAME' => NULL,
				'LAST_NAME' => 'Müller',
				'SOURCE_ID' => '1',
				'SOURCE_DESCRIPTION' => 'iQ 3.0 Pelletheizung + Solaranlage',
				'STATUS_ID' => 'JUNK',
				'COMMENTS' => 'AK10008-02-16',
				'CURRENCY_ID' => 'EUR',
				'HAS_PHONE' => 'Y',
				'HAS_EMAIL' => 'Y',
				'ASSIGNED_BY_ID' => '6',
				'CREATED_BY_ID' => '1',
				'MODIFY_BY_ID' => '6',
				'OPENED' => 'Y',
				'ADDRESS' => 'Neschwitzer Straße 59',
				'ADDRESS_CITY' => 'Kamenz',
				'ADDRESS_POSTAL_CODE' => '01917',
				'ADDRESS_COUNTRY' => 'Deutschland',
				'ADDRESS_COUNTRY_CODE' => NULL,
				'PHONE'=> array("VALUE"=> "555888", "VALUE_TYPE"=> "WORK") 
				'EMAIL'=> array("VALUE"=> "555888", "VALUE_TYPE"=> "HOME") 
				)
			);
		return $fullResult;
	}
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
function get_access_token($refresh_code) {

	$params = array(
		"grant_type" => "refresh_token",
		"client_id" => $this->CLIENT_ID,
		"client_secret" => $this->CLIENT_SECRET,
		"redirect_uri" => $this->PATH,
		"scope" => $this->SCOPE,
		"refresh_token" => $refresh_code,
		);

	$path = "/oauth/token/";

	$query_data = $this->query("GET", $this->PROTOCOL . "://" . $this->domain . $path, $params);
		// pr($query_data);
	if (isset($query_data["access_token"])) {
		$_SESSION["query_data"] = $query_data;
		$_SESSION["query_data"]["ts"] = time();
		$refresh_code = $this->save_refresh_code($query_data['refresh_token']);
			// redirect("bitrix");
		$options['accessToken'] = $query_data["access_token"];
		$res = $this->save_lead($lead_data);
		return $res;
	} else {
		$error = "error occure! " . print_r($query_data);
	}
	return false;
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