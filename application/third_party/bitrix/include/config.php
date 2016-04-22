<?php
/**
 * client_id Apps
 */
define('CLIENT_ID', 'local.571a7f6ff11954.35288017');
// define('CLIENT_ID', 'local.5714c7a65679d7.55404378');
/**
 * client_secret Apps
 */
// define('CLIENT_SECRET', 'a04cc260b5c612c48c19bf1b1ed5cc4e');
define('CLIENT_SECRET', 'b84c0178f2ea88b2d7d18fcbebf18b4c');
/**
 * relative path Apps on server
 */
define('PATH', 'https://www.solarvent.de/application/uploader/bitrix');
/**
 * full address to Apps
 */
define('REDIRECT_URI', 'http://codeme.bitrix24.com' . PATH);
/**
 * scope Apps
 */
define('SCOPE', 'crm');

/**
 * protocol by which we work. should be https
 */
define('PROTOCOL', "https");

// custom
define('DOMAIN', "solarvent.bitrix24.de");
define('CODE', "ho7av0pww7i60a7uwpiifckrf6lq2swb");
// define('MEMEBER_ID', "c0728b02e02abde3190db0e96a5096ae");
define('MEMEBER_ID', "fa755ef17cf2097971587481b32702b7");

/**
 * Produced redirect the user to the specified address
 *
 * @param string $url address
 */
function redirect_bitrix($url) {
	Header("HTTP 302 Found");
	Header("Location: " . $url);
	die();
}

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
function call($domain, $method, $params) {
	return query("POST", PROTOCOL . "://" . $domain . "/rest/" . $method, $params);
}