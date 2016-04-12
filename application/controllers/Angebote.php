<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angebote extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			$this->load->model('angebote_model', "angebote");
		}

	}
	/**
	 * Angebote Controller
	 *
	 * develope by @abdulmanan
	 * developer at Precisetech
	 * Project through PPH
	 */
	public function index() {
		$data['page'] = "angebote/listing";
		$this->load->view('template', $data);
	}
	public function listing($search_option = 'aends') {
		if ($this->input->is_ajax_request()) {

			$page = $this->input->get('page');
			$pageSize = $this->input->get('pageSize');
			$skip = $this->input->get('skip');
			$take = $this->input->get('take');
			$options = array('limit' => $take, 'offset' => $skip, 'term' => $search_option);
			$data = $this->angebote->get_all($options);
			if ($data):
				header("Content-type: application/json");
				$total = sizeof($data);
				if ($total != 0) {
					$total = $this->angebote->count_all($search_option);
				}
				$response = array(
					"pageSize" => $pageSize,
					"page" => $page,
					"total" => $total,
					"data" => $data,
				);
				echo json_encode($response);
				die;
			else:
				// send server error
				header("HTTP/1.1 500 Internal Server Error");
				echo "Failed to read data!";
			endif;
		} else {
			$data['page'] = "angebote/listing";
			$this->load->view('template', $data);
		}
	}
	public function get($id = '', $save = FALSE) {
		// $data = $this->angebote->get($id);
		// $this->load->view($pdf_file);
	}
	public function get_detail($id) {
		if ($this->input->is_ajax_request()) {

			// $options = array('limit' => $take, 'offset' => $skip, 'term' => $search_option);
			$data = $this->angebote->get_detail($id);
			if ($data):
				header("Content-type: application/json");
				$total = sizeof($data);
				// if ($total != 0) {
				// 	$total = $this->angebote->count_all();
				// }
				$response = array(
					// "pageSize" => $pageSize,
					// "page" => $page,
					"total" => $total,
					"data" => $data,
				);
				echo json_encode($response);
				die;
			else:
				// send server error
				header("HTTP/1.1 500 Internal Server Error");
				echo "Failed to read data!";
			endif;
		} else {
			$this->load->view('pdf/pdf_listing');
		}
	}
	function delete($id) {
		is_valid_id($id);
		if ($this->angebote->clear($id) > 0) {
			$message = 'Record has been removed';
			if ($this->input->is_ajax_request()) {
				$data['message'] = $message;
				$data['status'] = 1;
				echo json_encode($data);die();
			}
			set_flash($message, 'success');
			redirect('fotobegehung', 'refresh');
		}
		$message = 'record canot be remove !';
		if ($this->input->is_ajax_request()) {
			$data['message'] = $message;
			$data['status'] = 0;
			echo json_encode($data);die();
		}
		set_flash($message, 'error');
		redirect('fotobegehung', 'refresh');
	}
}