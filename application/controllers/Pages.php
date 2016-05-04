<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index() {

	}
	function datenschut() {
		$data["logo"] = base_url('assets/img/small_logo.jpg');
		$this->load->view('frontend/pages/datenschut', $data);
	}
}

/* End of file Pages.php */
/* Location: ./application/controllers/Pages.php */