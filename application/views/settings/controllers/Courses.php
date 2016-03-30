<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {
	protected $comp_id;
	public function __construct() {
		parent::__construct();
		$this->load->model('courses_model', 'coursedb');
		$this->comp_id = $this->session->userdata('user_id');
	}
	public function index() {
		$this->load->model('departments_model', 'deptdb');
		$data['courses'] = $this->coursedb->get_courses();
		$data['depts'] = $this->deptdb->get_all();
		$data['page_title'] = "Settings";
		$data['sub_page'] = "Courses";
		//it will enble jquery data table plugin for proper pagination and listing....
		$data['dtable_required'] = true;
		$data['page'] = "settings/courses/courses";
		$this->load->view('template', $data);
	}
	public function delete($course_id = '') {
		is_valid_id($course_id);
		$affected_rows = $this->coursedb->delete($course_id);
		if ($affected_rows > 0) {
			set_flash('Record deleted successfully !', 'success');
			redirect('settings/courses', 'refresh');
		} else {
			set_flash('Record cannot be deleted!', 'error');
			redirect('settings/courses', 'refresh');
		}
	}
	function add() {
		// pr($this->input->post());
		if ($this->input->post()) {
			if ($this->form_validation->run('course') == FALSE) {
				show_error(validation_errors(), 'error');
				$data['page_title'] = "Settings";
				$data['sub_page'] = "Add Course";
				$this->load->model('settings/shift_model', 'shiftdb');
				$data['shifts'] = $this->shiftdb->get_all();
				if (!is_array_empty($data['shifts'])) {
					set_flash('Add some Shifts ,provided by your institute , before adding section!', 'info');
					redirect('settings/courses');
				}
				$this->load->model('employees/employees_model', 'employeedb');
				$data['heads'] = $this->employeedb->get_specified('Faculty');
				if (!is_array_empty($data['heads'])) {
					set_flash('You have to add some head masters or teachers ,head of deparments etc, before adding section!', 'info');
					redirect('employees');
				}
				$this->load->model('departments_model', 'deptdb');
				$data['depts'] = $this->deptdb->get_all();
				$data['page'] = "settings/courses/add";
				$this->load->view('template', $data);

			} else {
				//successs
				$post_data = array(
					'name' => $this->input->post('name'),
					'cost' => $this->input->post('cost'),
					'description' => $this->input->post('description'),
					'dept_id' => $this->input->post('dept_id'),
					'duration' => $this->input->post('duration'),
					'company_id' => $this->comp_id,
				);
				$course_id = $this->coursedb->insert($post_data);

				if ($course_id > 0) {
					$title = $this->input->post('title');
					$shift = $this->input->post('shift');
					$start_time = $this->input->post('start_time');
					$days = $this->input->post('days');
					$head_id = $this->input->post('head_id');
					$capacity = $this->input->post('capacity');
					$section_notes = $this->input->post('section_notes');
					$this->load->model('settings/sections_model', 'sectiondb');
					foreach ($title as $key => $val) {
						$sec_data = array(
							'company_id' => $this->comp_id,
							'shift_id' => $shift[$key],
							'course_id' => $course_id,
							'head_id' => $head_id[$key],
							'title' => $title[$key],
							'days' => $days[$key],
							'start_time' => $start_time[$key],
							'capacity' => $capacity[$key],
							'description' => $section_notes[$key],
						);
						$section_id = $this->sectiondb->insert($sec_data);
						$cs_data = array('company_id' => $this->comp_id, 'shift_id' => $shift[$key], 'course_id' => $course_id);
						$this->load->model('shift_model', 'shiftdb');
						$this->shiftdb->add_shift($cs_data);
					}
					if ($section_id > 0) {
						set_flash("Record has been added successfully !", 'success');
						redirect('settings/courses', 'refresh');
					} else {
						set_flash("Course added but,an error happend while inserting section ,add them later !", 'warning');
						redirect('settings/courses', 'refresh');
					}
				} else {
					set_flash("Fail !while insert record for course ,try again !", 'error');
					redirect('settings/courses/add', 'refresh');
				}
			}
		} else {
			$data['page_title'] = "Settings";
			$data['sub_page'] = "Courses";
			$this->load->model('settings/shift_model', 'shiftdb');
			$data['shifts'] = $this->shiftdb->get_all();
			// pr($this->db->last_query());
			if (is_array_empty($data['shifts'])) {
				set_flash('Add some Shifts ,provided by your institute , before adding section!', 'info');
				redirect('settings/courses');
			}
			$this->load->model('employees/employees_model', 'employeedb');
			$data['heads'] = $this->employeedb->get_specified('Faculty');
			if (is_array_empty($data['heads'])) {
				set_flash('You have to add some head masters or teachers ,head of deparments etc, before adding section!', 'info');
				redirect('employees');
			}
			$this->load->model('departments_model', 'deptdb');
			$data['depts'] = $this->deptdb->get_all();
			$data['page'] = "settings/courses/add";
			$this->load->view('template', $data);
		}
	}
}

/* End of file Courses.php */
/* Location: ./application/modules/settings/controllers/Courses.php */