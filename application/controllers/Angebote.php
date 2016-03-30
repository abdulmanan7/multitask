<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angebote extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			pr("don't know which table is used for this module...feature will be come soon");
			$this->load->model('angebote_model', "angebote");
		}

	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$data['page'] = "angebote/angebote_listing";
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
					$total = $this->angebote->count_all();
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
			$data['page'] = "pdf/pdf_listing";
			$this->load->view('template', $data);
		}
	}
	public function get_detail($id) {
		if ($this->input->is_ajax_request()) {

			// $options = array('limit' => $take, 'offset' => $skip, 'term' => $search_option);
			$data = $this->angebote->get_detail($id);
			if ($data):
				header("Content-type: application/json");
				$total = sizeof($data);
				// if ($total != 0) {
				// 	$total = $this->att_email->count_all();
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
}