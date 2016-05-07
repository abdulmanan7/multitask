<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

if (!function_exists('is_array_empty')) {
	function is_array_empty($arr) {
		// $array_data = array_filter($arr);
		// if (count($array_data)) {
		// 	return false;
		// }
		if (is_array($arr)) {
			foreach ($arr as $key => $value) {
				if (!empty($value) || $value != NULL || $value != "") {
					return false;
					break; //stop the process we have seen that at least 1 of the array has value so its not empty
				}
			}
			//empty
			return true;
		}
		return true;
	}
}
if (!function_exists('random_code')) {
	function random_code($val) {
		return $val . '-' . time();
	}
}
if (!function_exists('dateformat')) {
	function dateformat($var = '', $time = FALSE) {
		if ($time) {
			$newDate = date("M d, Y, g:i a", strtotime($var));
		} else {
			$newDate = date("M d, Y", strtotime($var));
		}
		return $newDate;
	}
}

if (!function_exists('status_style')) {
	function status_style($var = '') {
		switch ($var) {
		case '1':
			return "label label-warning";
			break;
		case '2':
			return "label label-success";
			break;
		case '3':
			return "label label-danger";
			break;
		case '4':
			return "label label-info";
			break;
		case '5':
			return "label label-default";
			break;

		default:
			return "label label-primary";
			break;
		}
	}
}
if (!function_exists('payment_status')) {
	function payment_status($var = '') {
		switch ($var) {
		case '1':
			return "<span class='label label-success'>Fully Paid</span>";
			break;
		case '2':
			return "<span class='label label-warning'>Partially Paid</span>";
			break;
		case '3':
			return "<span class='label label-danger'>Not Paid</span>";
			break;

		}
	}
}
if (!function_exists('client_relation')) {
	function client_relation($client_id) {
		$CI = &get_instance();
		$CI->load->model('relation_model');
		$res = $CI->relation_model->get_status($client_id);
		if ($res) {
			$parms = array('link' => 'relation/remove/' . $client_id, 'type' => 'default btn-xs', 'name' => 'client_rem_btn', 'tooltip' => 'remove client from list');
			return button($parms);
		} else {
			$parms = array('link' => 'relation/add_client/' . $client_id, 'type' => 'success btn-xs', 'name' => 'client_add_btn', 'tooltip' => 'add client to list');
			return button($parms);
		}

	}
}
if (!function_exists('set_flash')) {
	function set_flash($message, $type = 'success') {
		$CI = &get_instance();
		$CI->session->set_flashdata('message', set_message($message, $type));
	}
}

if (!function_exists('set_message')) {
	function set_message($msg, $type = 'success') {
		switch ($type) {
		case "error":
			return '<div class="alert alert-danger"><i class="fa fa-times-circle fa-lg"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>' . $msg . '</div>';
			break;
		case "success":
			return '<div class="alert alert-success"><i class="fa fa-check-circle fa-lg"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>' . $msg . '</div>';
			break;
		case "warning":
			return '<div class="alert alert-warning"><i class="fa fa-warning fa-lg"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>' . $msg . '</div>';
			break;
		case "info":
			return '<div class="alert alert-info"><i class="fa fa fa-exclamation-circle fa-lg"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>' . $msg . '</div>';
			break;
		default:
			return '<div class="alert-notify"><i class="icon-foursquare"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>' . $msg . '</div>';

		}
	}
}
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
if (!function_exists('get_domain')) {
	function get_domain() {
		$CI = &get_instance();
		return preg_replace("/^[\w]{2,6}:\/\/([\w\d\.\-]+).*$/", "$1", $CI->config->slash_item('base_url'));
	}
}
if (!function_exists('add_url')) {
	function add_url($url) {
		return anchor(base_url($url), 'add product', "class='btn btn-success btn-xs'");
	}
}

if (!function_exists('floatFormat')) {
	function floatFormat($val, $dec = NULL) {
		$dec = (!$dec) ? get_cur_dec() : $dec;
		return number_format((float) $val, $dec, '.', ',');
	}
}

if (!function_exists('clean_dir')) {
	function clean_dir($path) {
		$files = glob($path); // get all file names
		foreach ($files as $file) {
			// iterate files
			if (is_file($file)) {
				unlink($file);
			}
			// delete file
		}
	}
}

if (!function_exists('esc')) {
	function esc($val, $arr = FALSE) {
		if (is_array($val)) {
			return $val;
		}
		if ($arr) {
			$data = array();
			foreach ($val as $key => $element) {
				$data[$key] = htmlentities($element, ENT_QUOTES, "UTF-8");
			}
			return $data;
		} else {
			if (is_array($val)) {
				$data = array();
				foreach ($val as $key => $element) {
					$data[$key] = htmlentities($element, ENT_QUOTES, "UTF-8");
				}
				return $data;
			}
			$val = htmlentities($val, ENT_QUOTES, "UTF-8");
			return $val;
		}
	}
}
if (!function_exists('find_url')) {
	function find_url($val = 'assets', $file_name = '') {
		switch ($val) {
		case 'base':
			return base_url();
			break;
		case 'assets':
			return base_url('assets/' . $file_name);
			break;
		case 'css':
			return base_url('assets/css/' . $file_name);
			break;
		case 'js':
			return base_url('assets/js/' . $file_name);
			break;
		case 'images':
			return base_url('assets/img/' . $file_name);
			break;
		case 'fonts':
			return base_url('assets/fonts/' . $file_name);
			break;
		case 'res':
			return base_url('res/' . $file_name);
			break;
		default:
			return site_url();
			break;
		}
	}
}
if (!function_exists('is_valid_id')) {
	function is_valid_id($val, $table = FALSE) {
		if (empty($val)) {
			log_message('info', 'Provided ID is empty.');
			show_error('provided id is empty!');
			die;
		}
		if (!is_numeric($val)) {
			log_message('error', 'Provided ID is not numeric.');
			show_error('provided id is not a numeric value!');
			die;
		}
		if (is_null($val)) {
			log_message('info', 'Provided ID is NULL.');
			show_error('provided id is null!');
			die;
		}
		if ($table) {
			$ci = &get_instance();
			$model = $table . "_model";
			$ci->load->model($model);
			return $ci->$model->record_exists($table, 'id', $val);
		}
		return (bool) TRUE;
	}
}