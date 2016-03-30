<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sections extends CI_Controller {
	public function index() {
		$this->load->model('sections_model', 'sectiondb');
		$this->load->model('employees/employees_model', 'employeedb');
		$data['sections'] = $this->sectiondb->get_sections();
		$this->load->model('courses_model', 'coursedb');
		$data['courses'] = $this->coursedb->get_all();
		if (is_array_empty($data['courses'])) {
			set_flash('Add some Courses ,provided by your institute , before adding section!', 'info');
			redirect('settings/courses');
		}
		$data['heads'] = $this->employeedb->get_specified('Faculty');
		if (is_array_empty($data['heads'])) {
			set_flash('You have to add some Faculty Members e.g teacher etc, before adding section!', 'info');
			redirect('employees');
		}
		$data['page_title'] = "Settings";
		$data['sub_page'] = "Sections";
		//it will enble jquery data table plugin for proper pagination and listing....
		$data['dtable_required'] = true;
		$data['page'] = "settings/sections/sections";
		$this->load->view('template', $data);
	}
	public function remove_section() {

	}

}

/* End of file Sections.php */
/* Location: ./application/modules/settings/controllers/Sections.php */