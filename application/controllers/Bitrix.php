<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitrix extends CI_Controller {
	protected $accessToken;
	protected $domain = "solarvent.bitrix24.de";
	protected $CLIENT_ID = "local.571a7f6ff11954.35288017";
	protected $CLIENT_SECRET = "b84c0178f2ea88b2d7d18fcbebf18b4c";
	protected $REDIRECT_URI = "https://www.solarvent.de/application/uploader/bitrix";
	protected $PATH = "https://www.solarvent.de/application/uploader/bitrix";
	protected $SCOPE = "crm";
	protected $PROTOCOL = "https";
	public function __construct() {
		parent::__construct();
		// $this->load->library('bitrix_api');
		// $data2 = array('accessToken' => '');
		// $this->load->library('bitrix24', $data2);
		$this->load->model('utilities_model','utility');

	}
	function index($value = '') {
		$cache_data = $this->utility->get_refresh_code();
		$data['refresh_code'] = $cache_data['refresh_code'];
		$key_expiry = date("Y-m-d", strtotime("+1 month", strtotime($cache_data['updated'])));
		if (date("Y-m-d") > $key_expiry) {
			$this->load->view('bitrixTest', $data);
		} else {
			$res = $this->get_access_token($cache_data['refresh_code']);
			pr($res);
			if (isset($res['access_token'])) {

			} else {
				$this->load->view('bitrixTest', $data);
			}
			pr($res);
		}
	}
	function get_access_token($refresh_code) {

		$params = array(
			"grant_type" => "authorization_code",
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
			$_SESSION["query_data"] = $query_data;
			$_SESSION["query_data"]["ts"] = time();
			$refresh_code = $this->save_refresh_code($query_data['refresh_token']);
			// redirect("bitrix");
			$options['accessToken'] = $query_data["access_token"];
			// $res = $this->save_lead($lead_data);
			return $query_data;
		} else {
			$error = "error occure! " . print_r($query_data);
		}
		return false;
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
}
/* End of file test.php */
/* Location: ./application/controllers/test.php */