<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!function_exists('pr')) {
	function pr($arr = array(), $ret = FALSE) {
		echo "<pre>";
		print_r($arr);
		if (!$ret) {
			die;
		}

		echo "</pre>";
	}
}

/* End of file custom_helper.php */
/* Location: ./application/helpers/custom_helper.php */?>