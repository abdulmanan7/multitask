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
				$leads = $this->get_all_leads();
				pr($leads);
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
	function refresh_token($refresh_code = NULL) {
		if (!$refresh_code && strlen($refresh_code) < 10) {
			$cache_data = $this->utility->get_refresh_code();
			$refresh_code = $cache_data['refresh_code'];
		}
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