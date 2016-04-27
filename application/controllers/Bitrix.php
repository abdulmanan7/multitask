<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitrix extends CI_Controller {
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
	public function __construct() {

		parent::__construct();
		// $this->load->library('bitrix_api');
		// $data2 = array('accessToken' => '');
		// $this->load->library('bitrix24', $data2);
		$this->load->model('utilities_model', 'utility');

	}
	function index() {
		$cache_data = $this->utility->get_refresh_code();
		$key_expiry = date("Y-m-d", strtotime("+1 month", strtotime($cache_data['updated'])));
		if (date("Y-m-d") > $key_expiry) {
			$requestedCode = $this->input->get('code');
			if (isset($requestedCode) && strlen($requestedCode) > 5) {
				$authResponse = $this->get_access_token($requestedCode);
				// $this->save_lead();
			} else {
				$this->get_code();
			}
			// $this->load->view('bitrixTest', $data);
		} else {
			$requestedCode = $this->input->get('code');
			if (isset($requestedCode)) {
				$authResponse = $this->get_access_token($requestedCode);
				//$refResponse = $this->refresh_token($authResponse['refresh_token']);
				pr($authResponse);
			}
			$data['refresh_code'] = $cache_data['refresh_code'];
			$res = $this->refresh_token($cache_data['refresh_code']);
			if (isset($res['access_token'])) {
				//$addStatus = $this->add();
				//$leads = $this->get_all_leads();
				// $allEmails = array();
				// foreach ($leads['result'] as $key => $email) {
				// 	$allEmails['res'] = $email['EMAIL'];
				// }
				// $Emails = array();
				// foreach ($allEmails as $key => $em) {
				// 	$allEmails['res']=$email['EMAIL'];
				// }
				pr($addStatus, 1);
				pr($leads);
				// pr($allEmails);
			} else {
				$this->get_code();
			}
		}
	}
	function get_code() {
		// clear auth session
		/******************* get code *************************************/
		$params = array(
			"response_type" => "code",
			"client_id" => $this->CLIENT_ID,
			"redirect_uri" => $this->REDIRECT_URI,
		);
		$path = "/oauth/authorize/";
		redirect($this->PROTOCOL . "://" . $this->domain . $path . "?" . http_build_query($params));
		/******************** /get code ***********************************/
	}
	function refresh_token($refresh_code) {

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
			$refresh_code = $this->utility->save_refresh_code($query_data['refresh_token']);

			//**************  assign the new recived refresh code to member
			$this->accessToken = $query_data["access_token"];
			// $res = $this->save_lead($lead_data);
			return $query_data;
		} else {
			$error = "error occure! " . print_r($query_data);
		}
		return false;
	}
	function get_access_token($code) {
		$domain = $this->domain;
		$member_id = $this->MEMBER_ID;

		$params = array(
			"grant_type" => "authorization_code",
			"client_id" => $this->CLIENT_ID,
			"client_secret" => $this->CLIENT_SECRET,
			"redirect_uri" => $this->REDIRECT_URI,
			"scope" => $this->SCOPE,
			"code" => $code,
		);
		$path = "/oauth/token/";

		$query_data = $this->query("GET", $this->PROTOCOL . "://" . $domain . $path, $params);
		if (isset($query_data["access_token"])) {
			//**************  save refresh code for next login
			$refresh_code = $this->utility->save_refresh_code($query_data['refresh_token']);
			//**************  assign the new recived refresh code to member
			$this->accessToken = $query_data["access_token"];
			// $res = $this->save_lead($lead_data);
			return $query_data;
		} else {
			$error = "error occure! " . print_r($query_data, 1);
		}
	}
	function get_all_leads($select = array()) {
		$cache_data = $this->utility->get_refresh_code();
		$refresh_code = $cache_data['refresh_code'];
		$res = $this->refresh_token($refresh_code);
		$fullResult = $this->call(
			'crm.lead.list',
			array(
				'auth' => $this->accessToken,
				// 'filter' => array("EMAIL" => "smadNawaxz@gmail.com"),
				//'select' => array("ID", "TITLE", "STATUS_ID", "OPPORTUNITY", "CURRENCY_ID", "EMAIL"),
			)
		);
		return $fullResult;
	}
	function get_lead_fields($select = array()) {
		$cache_data = $this->utility->get_refresh_code();
		$refresh_code = $cache_data['refresh_code'];
		$res = $this->refresh_token($refresh_code);
		$fullResult = $this->call(
			'crm.lead.fields',
			array(
				'auth' => $this->accessToken,
			)
		);
		pr($fullResult);
	}
	function get_user_fields($select = array()) {
		$cache_data = $this->utility->get_refresh_code();
		$refresh_code = $cache_data['refresh_code'];
		$res = $this->refresh_token($refresh_code);
		$fullResult = $this->call(
			'crm.lead.userfield.list',
			array(
				'auth' => $this->accessToken,
			)
		);
		pr($fullResult);
	}
	private function add($params = array()) {
		$fullResult = $this->call(
			'crm.lead.add',
			// array(
			// 	'fields' => array("TITLE","STATUS_ID","NAME","ASSIGNED_BY_ID","CREATED_BY_ID"),
			// 	'params' => array("Jan Doe","NEW","Zamarod",1,1)
			// 	)
			array(
				"auth" => $this->accessToken,
				"fields" => array(
					'TITLE' => 'Precise',
					'NAME' => 'Jan',
					'SECOND_NAME' => "Janay",
					'LAST_NAME' => 'Doe',
					'SOURCE_ID' => 'NEW',
					'SOURCE_DESCRIPTION' => 'iQ 3.0 Pelletheizung + Solaranlage',
					'STATUS_ID' => 'JUNK',
					'COMMENTS' => '<a href="http://sajidshah.com/proof/abdulmanan/mail_pdf">mypdf.pdf</a>',
					'CURRENCY_ID' => 'EUR',
					'HAS_PHONE' => 'Y',
					'HAS_EMAIL' => 'Y',
					'ASSIGNED_BY_ID' => '1',
					'CREATED_BY_ID' => '1',
					'MODIFY_BY_ID' => '1',
					'OPENED' => 'Y',
					'ADDRESS' => 'Neschwitzer Straße 59',
					'ADDRESS_CITY' => 'Kamenz',
					'ADDRESS_POSTAL_CODE' => '01917',
					'ADDRESS_COUNTRY' => 'Deutschland',
					'ADDRESS_COUNTRY_CODE' => NULL,
					'PHONE' => array("VALUE" => "555888", "VALUE_TYPE" => "WORK"),
					'EMAIL' => array("VALUE" => "jan@jan.com", "VALUE_TYPE" => "HOME"),
				),
			)
		);
		return $fullResult;
	}
	private function save_lead($NewData) {

		$user_email = $NewData['mail'];
		$leadRecord = $this->get_all_leads($user_email);
		if ($leadRecord['total'] > 0) {
			//inset lead here
			$this->add($NewData);
		}
	}
	function saveLead() {
		$postData = array(
			'TITLE' => 'Tufail zafar',
			'NAME' => "Tufail zafar",
			'SOURCE_DESCRIPTION' => "waiting to response great person",
			'ADDRESS' => "Dowra Road Afridi Abad ",
			'EMAIL_HOME' => "ahmadNazw@gmail.com",
			'PHONE_MOBILE' => "122354545",
			'COMMENTS' => "http://sajidshah.com/proof/abdulmanan/mail_pdf/fotobegehung",
		);

		//$this->bitrix->save_lead($postDate);
		$res = $this->bitrix_api->save_lead($postData);

	}
	function post() {

// POST processing
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$leadData = $_POST['DATA'];

			// get lead data from the form
			$postData = array(
				'TITLE' => $leadData['TITLE'],
				'COMPANY_TITLE' => $leadData['COMPANY_TITLE'],
				'NAME' => $leadData['NAME'],
				'LAST_NAME' => $leadData['LAST_NAME'],
				'COMMENTS' => $leadData['COMMENTS'],
				'ADDRESS' => "Dowra Road Afridi Abad ",
				'EMAIL_HOME' => "ahmadNazw@gmail.com",
			);
			//$this->load->library('bitrix');
			//$this->bitrix->save_lead($postDate);
			//$this->bitrix->save_lead($postDate);
			//die;
			// append authorization data
			if (defined('CRM_AUTH')) {
				$postData['AUTH'] = CRM_AUTH;
			} else {
				$postData['LOGIN'] = CRM_LOGIN;
				$postData['PASSWORD'] = CRM_PASSWORD;
			}

			// open socket to CRM
			$fp = fsockopen("ssl://" . CRM_HOST, CRM_PORT, $errno, $errstr, 30);
			if ($fp) {
				// prepare POST data
				$strPostData = '';
				foreach ($postData as $key => $value) {
					$strPostData .= ($strPostData == '' ? '' : '&') . $key . '=' . urlencode($value);
				}

				// prepare POST headers
				$str = "POST " . CRM_PATH . " HTTP/1.0\r\n";
				$str .= "Host: " . CRM_HOST . "\r\n";
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

				$output = '<pre>' . print_r($response[1], 1) . '</pre>';
				$out = str_replace("'", '"', $response[1]);
				//{'error':'201','ID':'6','error_message':'Lead has been added.','AUTH':'65498b98c545a3c3f49a9624654f2401'}
				//'<pre>'.print_r($response).'</pre>';
				////'<pre>'.print_r($result).'</pre>';
				//'<pre>'.print_r($out).'</pre>';
				pr(json_decode($out));
			} else {
				echo 'Connection Failed! ' . $errstr . ' (' . $errno . ')';
			}
		} else {
			$output = '';
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
	protected function executeRequest($url, array $additionalParameters = array()) {
		$additionalParameters['auth'] = $this->accessToken;
		$retryableErrorCodes = array(
			CURLE_COULDNT_RESOLVE_HOST,
			CURLE_COULDNT_CONNECT,
			CURLE_HTTP_NOT_FOUND,
			CURLE_READ_ERROR,
			CURLE_OPERATION_TIMEOUTED,
			CURLE_HTTP_POST_ERROR,
			CURLE_SSL_CONNECT_ERROR,
		);

		$curlOptions = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLINFO_HEADER_OUT => true,
			CURLOPT_VERBOSE => true,
			CURLOPT_CONNECTTIMEOUT => 5,
			CURLOPT_TIMEOUT => 5,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => http_build_query($additionalParameters),
			CURLOPT_URL => $url,
		);

		$this->rawRequest = $curlOptions;
		$curl = curl_init();
		curl_setopt_array($curl, $curlOptions);

		$curlResult = false;
		$retriesCnt = 1;
		while ($retriesCnt--) {
			$curlResult = curl_exec($curl);
			// handling network I/O errors
			$this->requestInfo = curl_getinfo($curl);
			curl_close($curl);
			break;
		}
		// handling json_decode errors
		$jsonResult = json_decode($curlResult, true);
		return $jsonResult;
	}
}
/* End of file Bitrix.php */
/* Location: ./application/controllers/Bitrix.php */