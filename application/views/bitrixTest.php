<?php
// require "include/config.php";
require APPPATH . '/third_party/bitrix/include/config.php';

$error = "";

// clear auth session
if (isset($_REQUEST["clear"]) || $_SERVER["REQUEST_METHOD"] == "POST") {
	unset($_SESSION["query_data"]);
}

/******************* get code *************************************/
if (!isset($query_data["access_token"])) {
	$params = array(
		"response_type" => "code",
		"client_id" => CLIENT_ID,
		"redirect_uri" => REDIRECT_URI,
	);
	$path = "/oauth/authorize/";

	redirect_bitrix(PROTOCOL . "://" . DOMAIN . $path . "?" . http_build_query($params));
}
/******************** /get code ***********************************/

if (isset($_REQUEST["code"])) {
/****************** get access_token ******************************/
	$code = $_REQUEST["code"];
	$domain = $_REQUEST["domain"];
	$member_id = $_REQUEST["member_id"];

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

		pr($query_data);
		redirect("bitrix");
		die();
	} else {
		$error = "error occure! " . print_r($query_data, 1);
	}
/********************** /get access_token *************************/
} elseif (isset($_REQUEST["refresh"])) {
/******************** refresh auth ********************************/
	$params = array(
		"grant_type" => "refresh_token",
		"client_id" => CLIENT_ID,
		"client_secret" => CLIENT_SECRET,
		"redirect_uri" => REDIRECT_URI,
		"scope" => SCOPE,
		"refresh_token" => $_SESSION["query_data"]["refresh_token"],
	);

	$path = "/oauth/token/";

	$query_data = query("GET", PROTOCOL . "://" . $_SESSION["query_data"]["domain"] . $path, $params);

	if (isset($query_data["access_token"])) {
		$_SESSION["query_data"] = $query_data;
		$_SESSION["query_data"]["ts"] = time();

		redirect("bitrix");
		die();
	} else {
		$error = "error occure! " . print_r($query_data);
	}
/********************* /refresh auth ******************************/
}

// require_once dirname(__FILE__) . "/include/header.php";

if (!isset($_SESSION["query_data"])) {
/******************************************************************/
	if ($error) {
		echo '<b>' . $error . '</b>';
	}
	?>
	<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
<form action="" method="post">
	<input type="text" name="portal" placeholder="text">
	<input type="submit" value="">
</form>
<?php

/******************************************************************/

} else {
/******************************************************************/

	if (time() > $_SESSION["query_data"]["ts"] + $_SESSION["query_data"]["expires_in"]) {
		echo "<b>expire</b>";
	} else {
		echo "expire date : " . ($_SESSION["query_data"]["ts"] + $_SESSION["query_data"]["expires_in"] - time()) . "";
	}
	?>

<ul>
	<!-- // <li><a href="<?=PATH?>?test=user.current">Current user</a> -->
	<li><a href="<?=PATH?>?test=crm.lead.list">Get Leads</a>
	<!-- // <li><a href="<?=PATH?>?test=log.blogpost.add">log blogpost</a> -->
	<!-- // <li><a href="<?=PATH?>?test=event.bind">event bind</a> -->
</ul>

<!-- // <a href="<?=PATH?>?refresh=1">Refresh</a><br /> -->
<!-- // <a href="<?=PATH?>?clear=1">Clear</a><br /> -->

<?php
$test = isset($_REQUEST["test"]) ? $_REQUEST["test"] : "";
	switch ($test) {
	case 'user.current': // test: user info

		$data = call($_SESSION["query_data"]["domain"], "user.current", array(
			"auth" => $_SESSION["query_data"]["access_token"])
		);

		break;

	case 'crm.lead.list': // test batch&files

		$data = call($_SESSION["query_data"]["domain"], "crm.lead.list", array(
			"auth" => $_SESSION["query_data"]["access_token"],
		));

		break;

	case 'event.bind': // bind event handler

		$data = call($_SESSION["query_data"]["domain"], "event.bind", array(
			"auth" => $_SESSION["query_data"]["access_token"],
			"EVENT" => "ONCRMLEADADD",
			"HANDLER" => REDIRECT_URI . "event.php",
		));

		break;

	case 'log.blogpost.add': // add livefeed entry

		$fileContent = file_get_contents(dirname(__FILE__) . "/images/MM35_PG189a.jpg");

		$data = call($_SESSION["query_data"]["domain"], "log.blogpost.add", array(
			"auth" => $_SESSION["query_data"]["access_token"],
			"POST_TITLE" => "Hello world!",
			"POST_MESSAGE" => "Goodbye, cruel world :-(",
			"FILES" => array(
				array(
					'minotaur.jpg',
					base64_encode($fileContent),
				),
			),

		));

		break;

	default:

		$data = $_SESSION["query_data"];

		break;
	}

	echo '<pre>';
	var_export($data);
	echo '</pre>';

	/******************************************************************/
}
?>
	</body>
</html>