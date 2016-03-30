<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semesters extends MX_Controller {

	public function index() {
		$this->load->model('semesters_model', 'semesterdb');
		$data['semesters'] = $this->semesterdb->get_all();
		$data['page_title'] = "Settings";
		$data['sub_page'] = "Semesters";
		$data['page'] = "settings/Semesters";
		//it will enble jquery data table plugin for proper pagination and listing....
		$data['dtable_required'] = true;
		$this->load->view('template', $data);
	}
	public function remove_semester() {

	}

}

/* End of file Semesters.php */
/* Location: ./application/modules/settings/controllers/Semesters.php */