<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitrix extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->load->library('bitrix_api');
		$data2 = array('accessToken' => '');
		$this->load->library('bitrix24', $data2);

	}
	function index($value = '') {
		$cache_data = $this->bitrix24->get_refresh_code();
		$data['refresh_code'] = $cache_data['refresh_code'];
		$key_expiry = date("Y-m-d", strtotime("+1 month", strtotime($cache_data['updated'])));
		$this->load->view('bitrixTest', $data);
		if (date("Y-m-d") > $key_expiry) {
		} else {
			$res = $this->bitrix24->get_access_token($cache_data['refresh_code']);
			pr($res);
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
}
/* End of file test.php */
/* Location: ./application/controllers/test.php */