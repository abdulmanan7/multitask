<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	protected $comp_id;
	function __construct() {
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			$this->comp_id = $this->session->userdata('company_id');
			$this->comp_id = $this->session->userdata('user_id');
			$this->load->model('dashboard_model', "dashboard");
		}
	}
	public function index() {
		$data['page_title'] = "Dashboard";
		$data['sub_page'] = "Dashboard";
		$data['page'] = "dashboard/dashboard";
		$data['angebots'] = $this->dashboard->get_total_count('createdfiles');
		$data['fotobegehung'] = $this->dashboard->get_total_count('email_att');
		$this->load->view('template', $data);
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */