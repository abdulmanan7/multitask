<?php
/* Copyright 2015-2016 All Right Reserved
THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY
KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
IMPLIED WARRANTIES OF MERCHANTABILITY AND/OR FITNESS FOR A
PARTICULAR PURPOSE.
This source is subject to the codeME Permissive License
Further sale of the code or any modification to the code not permitted

|| Author: Abdul Manan developer at codeME
|| Source: http://pph.me/abdulmanan7
 */
class Bitrix_api {
	protected $CRM_AUTH = FALSE;
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
	protected $atteachment_folder = "https://www.solarvent.de/kalkulator-angebot/offers";
	public function __construct($props = array()) {
		if (count($props) > 0) {
			$this->initialize($props);
		}
		// $this->ci->load->model('utilities_model', 'utility');
	}
	function initialize($config = array()) {
		foreach ($config as $key => $val) {
			$this->$key = $val;
		}
	}
	/******** get store refresh code ****************/
	function get_code_from_local() {
		$stmt = $GLOBALS['conn']->prepare("SELECT * FROM  `api_cache`");
		$stmt->execute();
		$api_cache = array();
		while ($row = $stmt->fetch()) {
			$api_cache['code'] = $row['refresh_code'];
		}
		return $api_cache;
	}
	/******** cache refresh code ****************/
	function save_code_to_local($code) {
		$stmt = $GLOBALS['conn']->prepare("UPDATE `api_cache` SET  refresh_code = :refresh_code");
		$stmt->execute(array(
			"refresh_code" => $code,
		));
	}
	function refresh_token($refresh_code = NULL) {
		$cache_data = $this->get_code_from_local();
		$refresh_code = ($refresh_code) ? $refresh_code : $cache_data['code'];
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
			$refresh_code = $this->save_code_to_local($query_data['refresh_token']);

			//**************  assign the new recived refresh code to member
			$this->accessToken = $query_data["access_token"];
			// $res = $this->save_lead($lead_data);
			return $query_data;
		} else {
			$error = "error occure! " . print_r($query_data);
		}
		return false;
	}
	private function add($params) {
		$link = $this->atteachment_folder . "/" . $params->offerNr . ".pdf";
		$linkName = $params->offerNr;
		$res = $this->refresh_token();
		if (isset($res['access_token'])) {
			$fullResult = $this->call(
				'crm.lead.add',
				array(
					"auth" => $this->accessToken,
					"fields" => array(
						'TITLE' => $params->fullName,
						'NAME' => $params->fullName,
						'SOURCE_ID' => '1',
						'STATUS_ID' => 'NEW',
						'COMMENTS' => '<a href="' . $link . '" target="_blank">' . $linkName . '</a>',
						'CURRENCY_ID' => 'EUR',
						'ASSIGNED_BY_ID' => '1',
						'CREATED_BY_ID' => '1',
						'MODIFY_BY_ID' => '1',
						'DATE_CREATE' => $today,
						'DATE_MODIFY' => $today,
						'UF_CRM_1457464089' => $today,
						'UF_CRM_1461700550' => $params->location,
						'ADDRESS' => $params->street,
						'ADDRESS_CITY' => $params->city,
						'ADDRESS_POSTAL_CODE' => $params->plz,
						'PHONE' => array('0' => array("VALUE" => $params->phone, "VALUE_TYPE" => "WORK")),
						'EMAIL' => array('0' => array("VALUE" => $params->mail, "VALUE_TYPE" => "HOME")),
					),
				)
			);
			return $fullResult;
		}
	}
	public function update($pdata) {
		$fullResult = $this->call(
			'crm.lead.update',
			array(
				"auth" => $this->accessToken,
				'id' => $pdata['ID'],
				"fields" => array(
					'SOURCE_ID' => '4',
					'COMMENTS' => $pdata['COMMENTS'],
				),
			)
		);
		return $fullResult;
	}
	function add_lead($NewData) {

		$user_email = $NewData->mail;
		$leadRecord = $this->get_all_leads($user_email);
		if (!isset($leadRecord['total']) && $leadRecord['total'] == 0) {
			//inset lead here
			$res = $this->add($NewData);
		} else {
			$link = $this->atteachment_folder . "/" . $NewData->offerNr . ".pdf";
			$linkName = $NewData->offerNr;
			$old_link = $leadRecord['result'][0]['COMMENTS'];
			$new_link = '<br><a href="' . $link . '" target="_blank">' . $linkName . '</a>';
			$updataData['COMMENTS'] = $old_link . $new_link;
			$updataData['ID'] = $leadRecord['result'][0]['ID'];
			$res = $this->update($updataData);
		}
		if (isset($res['result'])) {
			return true;
		} else {
			return false;
		}
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
$bitrix = new Bitrix_api;
/* End of file bitrix_api.php */
/* Location: ./bitrix.php */