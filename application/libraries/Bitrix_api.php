<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitrix_api {
	protected $ci;
	protected $CRM_AUTH = FALSE;
	protected $AUTH = FALSE;
	protected $CRM_LOGIN = "abdul.manan.afridi@gmail.com";
	protected $CRM_PASSWORD = "coray848@";
	protected $CRM_HOST = "codeme2016.bitrix24.com";
	protected $CRM_PORT = "443";
	protected $CRM_PATH = "/crm/configs/import/lead.php";

//******* rest api setting **********//
	protected $accessToken;
	protected $rawRequest;
	protected $domain = "solarvent.bitrix24.de";
	protected $CLIENT_ID = "local.571a7f6ff11954.35288017";
	protected $CLIENT_SECRET = "b84c0178f2ea88b2d7d18fcbebf18b4c";
	protected $REDIRECT_URI = "https://www.solarvent.de/application/uploader/bitrix";
	protected $PATH = "https://www.solarvent.de/application/uploader/bitrix";
	protected $MEMBER_ID = "fa755ef17cf2097971587481b32702b7";
	protected $SCOPE = "crm";
	protected $PROTOCOL = "https";
	public function __construct($props = array()) {
		$this->ci = &get_instance();
		if (count($props) > 0) {
			$this->initialize($props);
		}
		$this->ci->load->model('utilities_model', 'utility');
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

		// pr($params);
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
		$link_name = $params['vorname'] . "_" . $params['nachname'] . "_" . $att_id . ".pdf";
		$today = date("d.m.Y");
		$res = $this->refresh_token();
		if (isset($res['access_token'])) {
			$fullResult = $this->call(
				'crm.lead.add',
				array(
					"auth" => $this->accessToken,
					"fields" => array(
						'TITLE' => $params['vorname'] . " " . $params['nachname'],
						'NAME' => $params['vorname'],
						'SECOND_NAME' => $params['nachname'],
						'LAST_NAME' => $params['nachname'],
						'SOURCE_ID' => '2',
						'SOURCE_DESCRIPTION' => $params['beschreibung'],
						'STATUS_ID' => '1',
						'COMMENTS' => '<a href="' . $link . '" targer="_blank">Fotobegehung.pdf</a>',
						'CURRENCY_ID' => 'EUR',
						'ASSIGNED_BY_ID' => '1',
						'CREATED_BY_ID' => '1',
						'MODIFY_BY_ID' => '1',
						'DATE_MODIFY' => $today,
						'DATE_MODIFY' => $today,
						'UF_CRM_1457464089' => $today,
						'UF_CRM_1461700550' => $params['bauobjektadress'],
						'ADDRESS' => $params['strabe_nr'] . " ," . $params['PLZ'] . " ," . $params['ort'] . " ," . $params['land'],
						'ADDRESS_CITY' => $params['ort'],
						'ADDRESS_POSTAL_CODE' => $params['PLZ'],
						'ADDRESS_COUNTRY' => $params['land'],
						'PHONE' => array('0' => array("VALUE" => $params['telefon'], "VALUE_TYPE" => "WORK")),
						'EMAIL' => array('0' => array("VALUE" => $params['email'], "VALUE_TYPE" => "HOME")),
					),
				)
			);
			return $fullResult;
		}
	}
	function add_lead($NewData) {

		$user_email = $NewData['email'];
		$leadRecord = $this->get_all_leads($user_email);
		if (!isset($leadRecord['total'])) {
			//inset lead here
			$res = $this->add($NewData);
			if (isset($res['result'])) {
				return true;
			} else {
				return false;
			}
		}
		return true;
	}
	function get_all_leads($term) {
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
	function get_lead_fields($select = array()) {
		$res = $this->refresh_token();
		if (isset($res['access_token'])) {
			$fullResult = $this->call(
				'crm.lead.fields',
				array(
					'auth' => $this->accessToken,
				)
			);
			return $fullResult;
		}
	}
	function get_user_fields($select = array()) {
		$res = $this->refresh_token();
		if (isset($res['access_token'])) {
			$fullResult = $this->call(
				'crm.lead.userfield.list',
				array(
					'auth' => $this->accessToken,
				)
			);
			return $fullResult;
		}
	}
	function save_lead($leadData) {
		if ($this->CRM_AUTH) {
			$leadData['AUTH'] = $this->CRM_AUTH;
		} else {
			$leadData['LOGIN'] = $this->CRM_LOGIN;
			$leadData['PASSWORD'] = $this->CRM_PASSWORD;
		}

		// open socket to CRM
		$fp = fsockopen("ssl://" . $this->CRM_HOST, $this->CRM_PORT, $errno, $errstr, 30);
		if ($fp) {
			// prepare POST data
			$strPostData = '';
			foreach ($leadData as $key => $value) {
				$strPostData .= ($strPostData == '' ? '' : '&') . $key . '=' . urlencode($value);
			}

			// prepare POST headers
			$str = "POST " . $this->CRM_PATH . " HTTP/1.0\r\n";
			$str .= "Host: " . $this->CRM_HOST . "\r\n";
			$str .= "Content-Type: application/x-www-form-urlencoded\r\n";
			$str .= "Content-Length: " . strlen($strPostData) . "\r\n";
			$str .= "Connection: close\r\n\r\n";

			$str .= $strPostData;

			// send POST to CRM
			fwrite($fp, $str);

			// get CRM headers
			$result = '';
			while (!feof($fp)) {
				$result .= fgets($fp, 128);
			}
			fclose($fp);

			// cut response headers
			$response = explode("\r\n\r\n", $result);

			//$output = '<pre>'.print_r($response[1], 1).'</pre>';
			//{'error':'201','ID':'6','error_message':'Lead has been added.','AUTH':'65498b98c545a3c3f49a9624654f2401'}
			$out = str_replace("'", '"', $response[1]);
			$this->save_log(json_decode($out), $leadData);
		} else {
			echo 'Connection Failed! ' . $errstr . ' (' . $errno . ')';
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
			// pr($postParams);
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
		// $params["auth"] = $this->accessToken;
		$url = $this->PROTOCOL . "://" . $this->domain . "/rest/" . $method;
		// return $this->executeRequest($url, $params);
		return $this->query("POST", $url, $params);
	}
}
/* End of file bitrix.php */
/* Location: ./application/libraries/bitrix.php */