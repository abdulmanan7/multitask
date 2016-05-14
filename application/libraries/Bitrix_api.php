<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitrix_api {
	protected $ci;
//******* rest api setting **********//
	protected $accessToken;
	protected $today;
	protected $rawRequest;
	protected $domain = "solarvent.bitrix24.de";
	protected $CLIENT_ID = "local.571a7f6ff11954.35288017";
	protected $CLIENT_SECRET = "b84c0178f2ea88b2d7d18fcbebf18b4c";
	protected $REDIRECT_URI = "https://www.solarvent.de/application/uploader/bitrix";
	protected $PATH = "https://www.solarvent.de/application/uploader/bitrix";
	protected $MEMBER_ID = "fa755ef17cf2097971587481b32702b7";
	protected $SCOPE = array("crm", "task");
	protected $PROTOCOL = "https";
	public function __construct($props = array()) {
		$this->ci = &get_instance();
		if (count($props) > 0) {
			$this->initialize($props);
		}
		$this->ci->load->model('utilities_model', 'utility');
		$this->today = date("d.m.Y");
		$res = $this->refresh_token();
	}
	function initialize($config = array()) {
		foreach ($config as $key => $val) {
			$this->$key = $val;
		}
	}
	function refresh_token($refresh_code = NULL) {
		$cache_data = $this->ci->utility->get_refresh_code();
		$refresh_code = ($refresh_code) ? $refresh_code : $cache_data['refresh_code'];
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
		if (isset($query_data["access_token"])) {
			//**************  save refresh code for next login
			$refresh_code = $this->ci->utility->save_refresh_code($query_data['refresh_token']);

			//**************  assign the new recived refresh code to member
			$this->accessToken = $query_data["access_token"];
			// $res = $this->save_lead($lead_data);
			return $query_data;
		} else {
			$error = "error occure! " . print_r($query_data);
		}
		return false;
	}
	private function add($params = array()) {
		$link = $params['att_link'];
		if (isset($this->accessToken)) {
			$fullResult = $this->call(
				'crm.lead.add',
				array(
					"auth" => $this->accessToken,
					"fields" => array(
						'TITLE' => $params['vorname'] . " " . $params['nachname'],
						'NAME' => $params['vorname'],
						'SECOND_NAME' => $params['nachname'],
						'LAST_NAME' => $params['nachname'],
						'SOURCE_ID' => '3',
						'STATUS_ID' => 'NEW',
						'COMMENTS' => '<a href="' . $link . '" target="_blank">Fotobegehung.pdf</a>',
						'CURRENCY_ID' => 'EUR',
						'ASSIGNED_BY_ID' => '1',
						'CREATED_BY_ID' => '1',
						'MODIFY_BY_ID' => '1',
						'DATE_CREATE' => $this->today,
						'DATE_MODIFY' => $this->today,
						'UF_CRM_1457464089' => $this->today,
						'UF_CRM_1461700550' => $params['bauobjektadress'],
						'ADDRESS' => $params['strabe_nr'] . " " . $params['PLZ'] . " " . $params['ort'] . " " . $params['land'],
						'ADDRESS_CITY' => $params['ort'],
						'ADDRESS_POSTAL_CODE' => $params['PLZ'],
						'ADDRESS_COUNTRY' => $params['land'],
						'PHONE' => array('0' => array("VALUE" => $params['telefon'], "VALUE_TYPE" => "WORK")),
						'EMAIL' => array('0' => array("VALUE" => $params['email'], "VALUE_TYPE" => "HOME")),
					),
				)
			);
			$this->add_activity($fullResult['result'], $params['telefon']);
			return $fullResult;
		}
	}
	private function update_lead($pdata, $phone = NULL) {
		if (isset($this->accessToken)) {
			$fullResult = $this->call(
				'crm.lead.update',
				array(
					"auth" => $this->accessToken,
					'id' => $pdata['ID'],
					"fields" => array(
						'SOURCE_ID' => $pdata['SOURCE_ID'],
						'DATE_MODIFY' => $this->today,
						'UF_CRM_1457464089' => $this->today,
						'COMMENTS' => $pdata['COMMENTS'],
					),
				)
			);
			$this->add_activity($pdata['ID'], $phone);
			return $fullResult;
		}
	}
	/**
	 * Add a new activity to CRM
	 * @param array $fields - array of fields
	 * @link http://dev.1c-bitrix.ru/rest_help/crm/rest_activity/crm_activity_add.php
	 * @return array
	 */
	private function add_activity($lead_id, $phone = NULL) {
		$date = new DateTime('+1 day');
		$DEADLINE = $date->format('d.m.Y H:i:s');
		// $post_data = array(
		// 	"auth" => $this->accessToken,
		// 	"fields" => array(
		// 		"OWNER_ID" => $lead_id,
		// 		"OWNER_TYPE_ID" => 1, // see crm.enum.ownertype
		// 		"TYPE_ID" => 4, // see crm.enum.activitytype
		// 		"COMMUNICATIONS" => array("0" => array("VALUE" => $phone)),
		// 		'SUBJECT' => 'CRM: Eingang einer neuen Fotobegehung',
		// 		"START_TIME" => $this->today,
		// 		"END_TIME" => $this->today,
		// 		"COMPLETED" => "N",
		// 		"PRIORITY" => 3, // see crm.enum.activitypriority
		// 		"RESPONSIBLE_ID" => 1,
		// 		'DEADLINE' => $DEADLINE,
		// 		"AUTHOR_ID" => 8,
		// 		"NOTIFY_TYPE" => 0,
		// 		"NOTIFY_VALUE" => 0,
		// 		"DIRECTION" => 2,
		// 	),
		// );
		$post_data = array(
			"auth" => $this->accessToken,
			"fields" => array(
				"CREATED_BY" => 8, // see crm.enum.ownertype
				'TITLE' => 'CRM: Eingang einer neuen Fotobegehung',
				"START_DATE_PLAN" => $this->today,
				"END_DATE_PLAN" => $this->today,
				"PRIORITY" => 3, // see crm.enum.activitypriority
				"RESPONSIBLE_ID" => 1,
				'DEADLINE' => $DEADLINE,
				"PARENT_ID" => $lead_id,
				"TAGS" => array('CRM'),
			),
		);
		$fullResult = $this->call('crm.activity.add', $post_data);
		if ($phone == "03331231234") {
			pr($post_data, 1);
			pr($params, 1);
			pr($fullResult);
		}
		return $fullResult;
	}
	public function add_lead($NewData) {
		$user_email = $NewData['email'];
		$leadRecord = $this->get_all_leads($user_email);
		if (isset($leadRecord['total']) && $leadRecord['total'] == 0) {
			//inset lead here
			$res = $this->add($NewData);
		} else {
			$old_link = $leadRecord['result'][0]['COMMENTS'];
			$new_link = '<br><a href="' . $NewData['att_link'] . '" target="_blank">Fotobegehung.pdf</a>';
			$updataData['COMMENTS'] = $old_link . $new_link;
			$updataData['ID'] = $leadRecord['result'][0]['ID'];
			$updataData['SOURCE_ID'] = $leadRecord['result'][0]['SOURCE_ID'] == "3" ? "3" : "4";
			$res = $this->update_lead($updataData, $NewData['telefon']);
		}
		if (isset($res['result'])) {
			return true;
		} else {
			return false;
		}
	}
	function get_all_leads($term) {
		if (isset($this->accessToken)) {
			$fullResult = $this->call(
				'crm.lead.list',
				array(
					'auth' => $this->accessToken,
					'filter' => array("EMAIL" => $term),
					//'select' => array("ID", "TITLE", "STATUS_ID", "OPPORTUNITY", "CURRENCY_ID", "EMAIL"),
				)
			);
			return $fullResult;
		}
	}
	function save_log($params = '') {
		if (isset($params->ID) && $params->ID > 0) {
			$data = array(
				'id' => $params->ID,
				'status_code' => $params->error,
				'status_message' => $params->error_message,
				'auth' => $params->AUTH,
				'vorname' => $leadData['TITLE'],
				'email' => $leadData['EMAIL_HOME'],

			);
			$this->ci->db->insert('bitrix_log', $data);
		}
	}
	function query($method, $url, $data = null) {
		$query_data = "";
		$curlOptions = array(
			CURLOPT_RETURNTRANSFER => true,
		);
		if ($method == "POST") {
			$postParams = http_build_query($data);
			$curlOptions[CURLOPT_POST] = true;
			$curlOptions[CURLOPT_POSTFIELDS] = $postParams;
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
		$url = $this->PROTOCOL . "://" . $this->domain . "/rest/" . $method;
		return $this->query("POST", $url, $params);
	}
}
/* End of file bitrix.php */
/* Location: ./application/libraries/bitrix.php */