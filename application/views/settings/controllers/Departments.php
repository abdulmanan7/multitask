<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends MX_Controller {

	public function index() {
		$this->load->model('departments_model', 'deptdb');
		$data['departments'] = $this->deptdb->get_all();
		$data['page_title'] = "Settings";
		$data['sub_page'] = "Departments";
		//it will enble jquery data table plugin for proper pagination and listing....
		$data['dtable_required'] = true;
		$data['page'] = "settings/departments/departments";
		$this->load->view('template', $data);
	}
}

/* End of file Departments.php */
/* Location: ./application/modules/settings/controllers/Departments.php */