<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	protected $comp_id;
	public function __construct() {
		parent::__construct();
		$this->comp_id = $this->session->userdata('user_id');
		$this->load->model('settings/shift_model', 'shiftdb');
	}
	public function index() {

	}
	public function get_fee_for_update($fee_id = '') {
		if ($this->input->is_ajax_request()) {
			$this->load->model('fee/fee_model', 'feedb');
			$data['fee'] = $this->feedb->get_fee($fee_id);
			echo json_encode($data['fee']);
			die();
		}
	}
	public function add_shift() {
		if ($this->input->post()) {
			//check if record already exits
			if ($this->form_validation->run('shift') == FALSE) {
				echo show_message(validation_errors(), 'error');
				die();
			} else {
				//successs
				$post_data = array(
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'start_time' => $this->input->post('start_time') . " " . $this->input->post('am_pm_start_time'),
					'end_time' => $this->input->post('end_time') . " " . $this->input->post('am_pm_end_time'),
					'company_id' => $this->comp_id,
				);

				$id = $this->shiftdb->insert($post_data);
				if ($id > 0) {
					echo show_message("Record has been added successfully !");
					die();
				} else {
					echo show_message("Fail !while insert record for shift !", 'error');
					die();
				}
			}
		} else {
			echo show_message("Fail !while insert record for shift !", 'error');
			die();
		}

	}
	public function add_dept() {
		if ($this->input->post()) {
			//check if record already exits
			if ($this->form_validation->run('dept') == FALSE) {
				echo show_message(validation_errors(), 'error');
			} else {
				//successs
				$post_data = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'company_id' => $this->comp_id,
				);

				$this->load->model('settings/departments_model', 'deptdb');
				$id = $this->deptdb->insert($post_data);
				if ($id > 0) {
					echo show_message("Record has been added successfully !");
				} else {
					echo show_message("Fail !while insert record for department !", 'error');
				}
			}
		} else {
			show_message("Fail !while insert record for department !", 'error');
		}

	}
	public function add_semester() {
		if ($this->input->post()) {
			//check if record already exits
			(int) $id = $this->uri->segment(3);
			if ($this->form_validation->run('semester') == FALSE) {
				echo show_message(validation_errors(), 'error');
			} else {
				//successs
				$post_data = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'duration' => $this->input->post('duration'),
					'company_id' => $this->comp_id,
				);
				$this->load->model('settings/semesters_model', 'semesterdb');
				$id = $this->semesterdb->insert($post_data);
				if ($id > 0) {
					echo show_message("Record has been added successfully !");
				} else {
					echo show_message("Fail !while insert record for semester !", 'error');
				}
			}
		} else {
			echo show_message("Fail !while insert record for semester !", 'error');
		}

	}
	public function add_course() {
		if ($this->input->post()) {
			//check if record already exits
			(int) $id = $this->uri->segment(3);
			if ($this->form_validation->run('course') == FALSE) {
				echo show_message(validation_errors(), 'error');
				die();
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
				$this->load->model('settings/courses_model', 'coursedb');
				$id = $this->coursedb->insert($post_data);
				if ($id > 0) {
					echo show_message("Record has been added successfully !");
					die();
				} else {
					echo show_message("Fail !while insert record for Course !", 'error');
					die();
				}
			}
		} else {
			echo show_message("Fail !while insert record for Course !", 'error');
			die();
		}

	}
	public function get_sections() {
		if ($this->input->post()) {
			//check if record already exits
			$this->form_validation->set_rules('shift_id', 'Shift ID', 'trim|numeric');
			$this->form_validation->set_rules('course_id', 'Course ID', 'trim|numeric');
			if ($this->form_validation->run()) {
				//successs
				$shift_id = $this->input->post('shift_id');
				$course_id = $this->input->post('course_id');
				$this->load->model('settings/sections_model', 'sectiondb');
				if ($this->input->get('just_section') == 'yes') {
					$sections = $this->sectiondb->get_sections($shift_id, $course_id, array('only_sections' => 'yes'));
				} else {
					$sections = $this->sectiondb->get_sections($shift_id, $course_id);
				}

				if (is_array_empty($sections)) {
					$sections = array('0' => array(
						'section_id' => '', 'title' => "no section added please add.",
					));
				}
				echo json_encode($sections);
				die();
			} else {
				echo show_message(validation_errors(), 'error');
				die();
			}
		} else {
			echo show_message("Sections data error!", 'error');
			die();
		}

	}
	public function get_shifts() {
		if ($this->input->post()) {
			//check if record already exits
			$this->form_validation->set_rules('course_id', 'Course ID', 'trim|numeric');
			if ($this->form_validation->run()) {
				//successs
				$course_id = $this->input->post('course_id');
				$this->load->model('settings/shift_model', 'shiftdb');
				if ($this->input->get('all') == 'yes') {
					$shifts = $this->shiftdb->get_all();
				} else {
					$shifts = $this->shiftdb->get_shifts($course_id);
				}

				if (is_array_empty($shifts)) {
					$shifts = array('0' => array(
						'shift_id' => '', 'title' => "no shift added please add.",
					));
				}
				// pr($this->db->last_query());
				echo json_encode($shifts);
				die();
			} else {
				echo show_message(validation_errors(), 'error');
				die();
			}
		} else {
			echo show_message("shifts data error!", 'error');
			die();
		}

	}
	public function add_job() {
		if ($this->input->post()) {
			//check if record already exits
			if ($this->form_validation->run('job') == FALSE) {
				echo show_message(validation_errors(), 'error');
				die();
			} else {
				//successs
				$post_data = array(
					'name' => $this->input->post('name'),
					'salary' => $this->input->post('salary'),
					'dept_id' => $this->input->post('dept_id'),
					'description' => $this->input->post('description'),
					'company_id' => $this->comp_id,
				);
				$this->load->model('settings/jobs_model', 'jobsdb');
				$id = $this->jobsdb->insert($post_data);
				if ($id > 0) {
					echo show_message("Record has been added successfully !");
					die();
				} else {
					echo show_message("Fail !while insert record for Job !", 'error');
					die();
				}
			}
		} else {
			echo show_message("Fail !while insert record for Job !", 'error');
			die();
		}

	}
	public function add_section() {
		if ($this->input->post()) {
			//check if record already exits
			if ($this->form_validation->run('section') == FALSE) {
				echo show_message(validation_errors(), 'error');
				die();
			} else {
				//successs
				$shift_id = $this->input->post('shift_id');
				$course_id = $this->input->post('course_id');
				$post_data = array(
					'company_id' => $this->comp_id,
					'shift_id' => $shift_id,
					'course_id' => $course_id,
					'head_id' => $this->input->post('head_id'),
					'title' => $this->input->post('title'),
					'days' => $this->input->post('days'),
					'start_time' => $this->input->post('start_time'),
					'capacity' => $this->input->post('capacity'),
					'description' => $this->input->post('description'),
				);
				$this->load->model('settings/sections_model', 'sectiondb');
				$id = $this->sectiondb->insert($post_data);
				if ($id > 0) {
					$cs_data = array('company_id' => $this->comp_id, 'shift_id' => $shift_id, 'course_id' => $course_id);
					$this->load->model('shift_model', 'shiftdb');
					$this->shiftdb->add_shift($cs_data);
					echo show_message("Record has been added successfully !");
					die();
				} else {
					echo show_message("Fail !while insert record for section !", 'error');
					die();
				}
			}
		} else {
			echo show_message("Please fill the form.", 'error');
			die();
		}

	}
	public function add_fee() {
		// pr($this->input->post());
		$this->load->model('fee/fee_model', 'feedb');
		if ($this->input->post()) {
			//check if record already exits
			if ($this->form_validation->run('fee') == FALSE) {
				echo show_message(validation_errors(), 'error');
				die();
			} else {
				//successs
				$post_data = array(
					'name' => $this->input->post('name'),
					'amount' => $this->input->post('amount'),
					'description' => $this->input->post('description'),
					'company_id' => $this->comp_id,
					'fee_type' => $this->input->post('fee_type'),
				);
				$id = $this->feedb->save($post_data);
				if ($id > 0) {
					$message = "Record has been added successfully !";
					$response = array('status' => 1, 'message' => $message);
					echo json_encode($response);
					die();
				} else {
					$message = "Error while adding new record !";
					$response = array('status' => 0, 'message' => $message);
					echo json_encode($response);
					die();
				}
			}
		} else {
			echo show_message("Fail !while insert record for Fee !", 'error');
			die();
		}

	}
	public function search() {
		$madule = $this->input->post('controller');
		$method = $this->input->post('method');
		$term = $this->input->post('term');
		echo $this->return_search_result($term, $madule, $method);
		// pr($this->db->last_query());
		// die();
	}
	public function return_search_result($term, $madule, $method = NULL) {
		$model = $madule . "_model";

		$this->load->model($madule . "/" . $model);
		$data['page_title'] = $madule;
		$data[$madule] = $this->$model->search($term);
		$data['sub_page'] = "List";
		$page = $madule . "/search_result";
		$data['dtable_required'] = true;
		return $this->load->view($page, $data, FALSE);
	}
	public function get_fee($id = '') {
		$this->load->model('fee/fee_model', 'feedb');
		$data['fees'] = $this->feedb->get_fee();
		$page = "students/ajax_script/fee_types";
		$data['dtable_required'] = true;
		// pr($data);
		echo $this->load->view($page, $data, true);
	}
}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */