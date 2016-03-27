<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

if (!function_exists('get_theme_header')) {
	function get_theme_header($data = array()) {
		$CI = &get_instance();
		return $CI->load->view('template/admin/header', $data);
	}
}
if (!function_exists('get_theme_footer')) {
	function get_theme_footer($data = array()) {
		$CI = &get_instance();
		return $CI->load->view('template/admin/footer', $data);
	}
}
if (!function_exists('load_css')) {
	function load_css($file_name) {
		return base_url('assets/css/' . $file_name);
	}
}
if (!function_exists('module_assets')) {
	function module_assets($file_name) {
		return base_url('assets/modules/' . $file_name);
	}
}
if (!function_exists('load_js')) {
	function load_js($file_name) {
		return base_url('assets/js/' . $file_name);
	}
}
if (!function_exists('load_plugin')) {
	function load_plugin($file_name) {
		return base_url('assets/plugins/' . $file_name);
	}
}
if (!function_exists('load_img')) {
	function load_img($file_name) {
		return base_url('assets/img/' . $file_name);
	}
}
if (!function_exists('load_fonts')) {
	function load_fonts($file_name) {
		return base_url('assets/fonts/' . $file_name);
	}
}
if (!function_exists('get_top_nav')) {
	function get_top_nav($data = array()) {
		$CI = &get_instance();
		return $CI->load->view('template/top_nav', $data);
	}
}
if (!function_exists('get_sub_nav')) {
	function get_sub_nav() {
		$CI = &get_instance();
		return $CI->load->view('template/sub_nav');
	}
}
if (!function_exists('get_left_sidebar')) {
	function get_left_sidebar() {
		$CI = &get_instance();
		return $CI->load->view('template/left_sidebar');
	}
}
if (!function_exists('get_right_sidebar')) {
	function get_right_sidebar() {
		$CI = &get_instance();
		return $CI->load->view('template/right_sidebar');
	}
}
if (!function_exists('colorize')) {
	function colorize($val, $id = NULL) {
		if ($id) {
			switch ($id) {
			case '1':
				return '<span class="label label-success">' . $val . '</span>';
				break;
			case '2':
				return '<span class="label label-warning">' . $val . '</span>';
				break;
			case '3':
				return '<span class="label label-info">' . $val . '</span>';
				break;
			case '4':
				return '<span class="label label-danger">' . $val . '</span>';
				break;
			default:
				return '<span class="label label-danger">' . $val . '</span>';
				break;
			}
		}
		switch ($val) {
		case '1':
			return '<span class="label label-success">Monthly</span>';
			break;
		case '12':
			return '<span class="label label-info">Yearly</span>';
			break;
		case '6':
			return '<span class="label label-warning">Semester</span>';
			break;
		case '3':
			return '<span class="label label-primary">Quarterly</span>';
			break;
		case '9':
			return '<span class="label label-danger">Nine Months</span>';
			break;
		case '0':
			return '<span class="label label-danger">Per Need</span>';
			break;

		default:
			return '<span class="label label-primary">' . $val . '</span>';
			break;
		}
	}
}
if (!function_exists('load_sub_nav')) {
	function load_sub_nav($page = '', $sub_page = '') {
		$sub_nav_html = '';
		switch ($page) {
		case 'Dashboard':
			$sub_nav_html = '<div class="sub-nav hidden-sm hidden-xs"><ul>';
			$sub_nav_html .= '<li><a href="#" class="heading">Dashboard</a></li></ul>';
			$sub_nav_html .= '<div class="custom-search hidden-sm hidden-xs">
					            <input type="text" class="search-query" placeholder="Search here ...">
					            <i class="fa fa-search"></i></div></div>';
			break;
		case 'welcome':
			$sub_nav_html = '<div class="sub-nav hidden-sm hidden-xs"><ul>';
			$sub_nav_html .= '<li><h4 class="selected">Alle Angebote</h4></li></ul>';
			$sub_nav_html .= '<div class="custom-search hidden-sm hidden-xs">
					            <input type="text" class="search-query" placeholder="Search here ...">
					            <i class="fa fa-search"></i></div></div>';
			break;

		default:
			$sub_nav_html = '<div class="sub-nav hidden-sm hidden-xs"><ul>';
			$sub_nav_html .= '<li><a href="#" class="heading">Willkommen</a></li></ul>';
			$sub_nav_html .= '<div class="custom-search hidden-sm hidden-xs">
					            <input type="text" id="gSearch" class="search-query" placeholder="Search here ...">
					            <i class="fa fa-search"></i></div></div>';
			break;
		}
		echo $sub_nav_html;
	}
}
if (!function_exists('show_message')) {
	function show_message($msg, $type = 'success') {
		switch ($type) {
		case "error":
			return '<div class="notice red">
                      <p>' . $msg . '</p>
                    </div>';
			break;
		case "success":
			return '<div class="notice green">
                      <p>' . $msg . '</p>
                    </div>';
			break;
		case "warning":
			return '<div class="notice yellow">
                      <p>' . $msg . '</p>
                    </div>';
			break;
		case "info":
			return '<div class="notice blue">
                      <p>' . $msg . '</p>
                    </div>';
			break;
		default:
			return '<div class="notice red">
                      <p>' . $msg . '</p>
                    </div>';

		}
	}
}