<?php
// require "include/config.php";
require APPPATH . '/third_party/bitrix/include/config.php';

$error = "";

// clear auth session

/******************* get code *************************************/
$params = array(
	"response_type" => "code",
	"client_id" => CLIENT_ID,
	"redirect_uri" => REDIRECT_URI,
);
$path = "/oauth/authorize/";

redirect_bitrix(PROTOCOL . "://" . DOMAIN . $path . "?" . http_build_query($params));
/******************** /get code ***********************************/

if (isset($_REQUEST["code"])) {
/****************** get access_token ******************************/
	$code = $_REQUEST["code"];
	$domain = DOMAIN;
	$member_id = MEMBER_ID;

	$params = array(
		"grant_type" => "authorization_code",
		"client_id" => CLIENT_ID,
		"client_secret" => CLIENT_SECRET,
		"redirect_uri" => REDIRECT_URI,
		"scope" => SCOPE,
		"code" => $code,
	);
	$path = "/oauth/token/";

	$query_data = query("GET", PROTOCOL . "://" . $domain . $path, $params);
	if (isset($query_data["access_token"])) {
		$_SESSION["query_data"] = $query_data;
		$_SESSION["query_data"]["ts"] = time();
		$refresh_code = $this->bitrix24->save_refresh_code($query_data['refresh_token']);
		pr($query_data);
		redirect_bitrix('bitrix');
	} else {
		$error = "error occure! " . print_r($query_data, 1);
	}
/********************** /get access_token *************************/
// } elseif (isset($_REQUEST["refresh"])) {
} elseif (time() > $_SESSION["query_data"]["ts"] + $_SESSION["query_data"]["expires_in"]) {
/******************** refresh auth ********************************/
	$this->load->library('bitrix24');
	$refresh_code = $this->bitrix24->get_refresh_code();
	$params = array(
		"grant_type" => "refresh_token",
		"client_id" => CLIENT_ID,
		"client_secret" => CLIENT_SECRET,
		"redirect_uri" => REDIRECT_URI,
		"scope" => SCOPE,
		"refresh_token" => $refresh_code,
	);

	$path = "/oauth/token/";

	$query_data = query("GET", PROTOCOL . "://" . DOMAIN . $path, $params);

	if (isset($query_data["access_token"])) {
		$_SESSION["query_data"] = $query_data;
		$_SESSION["query_data"]["ts"] = time();
		$refresh_code = $this->bitrix24->save_refresh_code($query_data['refresh_token']);
		// redirect("bitrix");
		$options['accessToken'] = $query_data["access_token"];
		$this->load->library('bitrix', $options);
		$res = $this->bitrix24->save_lead($lead_data);
		pr($res);
	} else {
		$error = "error occure! " . print_r($query_data);
	}
/********************* /refresh auth ******************************/
} else {
	$options['accessToken'] = $query_data["access_token"];
	$this->load->library('bitrix', $options);
	$res = $this->bitrix24->save_lead($lead_data);
	pr($res);
}
// require_once dirname(__FILE__) . "/include/header.php";
?>