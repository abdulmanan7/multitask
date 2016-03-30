<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {
	protected $comp_id;
	public function __construct() {
		parent::__construct();
		$this->comp_id = $this->session->userdata('user_id');
		$this->load->model('settings/subjects_model', 'subjectsdb');
	}
	public function index() {
		$this->load->model('courses_model', 'coursedb');
		$data['courses'] = $this->coursedb->get_all();
		if (is_array_empty($data['courses'])) {
			set_flash('Add some Courses ,provided by your institute , before adding subjects!', 'info');
			redirect('settings/courses');
		}
		$this->load->model('employees/employees_model', 'employeedb');
		$data['heads'] = $this->employeedb->get_specified('Faculty');
		if (is_array_empty($data['heads'])) {
			set_flash('You have to add some Faculty Members e.g teacher etc, before adding subjects!', 'info');
			redirect('employees');
		}
		$data['page_title'] = "Settings";
		$data['sub_page'] = "view";
		//it will enble jquery data table plugin for proper pagination and listing....
		$data['dtable_required'] = true;
		$data['page'] = "settings/subjects/add";
		$this->load->view('template', $data);
	}
	public function add() {
		if ($this->input->post()) {
			//check if record already exits
			if ($this->form_validation->run('subjects') == FALSE) {
				echo show_message(validation_errors(), 'error');
				die();
			} else {
				//successs
				$emp_id = $this->input->post('emp_id');
				$course_id = $this->input->post('course_id');
				$name = $this->input->post('name');
				$total_grade = $this->input->post('total_grade');
				$passing_grade = $this->input->post('passing_grade');
				$code = $this->input->post('code');
				$credit_hour = $this->input->post('credit_hour');
				$error = 1;
				foreach ($emp_id as $key => $emp) {
					$post_data = array(
						'company_id' => $this->comp_id,
						'emp_id' => $emp,
						'course_id' => $course_id,
						'name' => $name[$key],
						'total_grade' => $total_grade[$key],
						'passing_grade' => $passing_grade[$key],
						'code' => $code[$key],
						'credit_hour' => $credit_hour[$key],
					);
					$id = $this->subjectsdb->insert($post_data);
					$error = ($id > 0) ? 1 : 0;
				}
				if ($error > 0) {
					echo show_message("Record has been added successfully !");
					die();
				} else {
					echo show_message("Fail !while insert record for subjects !", 'error');
					die();
				}
			}
		} else {
			echo show_message("Please fill the form.", 'error');
			die();
		}
	}
	public function get_existing($course_id = '') {
		is_valid_id($course_id);
		$data = $this->subjectsdb->get_existing($course_id);
		echo json_encode($data);
		die();
	}
	public function save($course_id = NULL) {
		$post = $this->input->get();
		$record = json_decode($post['models']);
		$course_id = ($course_id) ? $course_id : $record[0]->course_id;
		$post_data = array(
			'company_id' => $this->comp_id,
			'emp_id' => $record[0]->emp_id,
			'course_id' => $course_id,
			'name' => $record[0]->name,
			'total_grade' => $record[0]->total_grade,
			'passing_grade' => $record[0]->passing_grade,
			'code' => $record[0]->code,
			'credit_hour' => $record[0]->credit_hour,
		);
		if ($record[0]->subject_id != NULL) {
			$id = $this->subjectsdb->update($record[0]->subject_id, $post_data);
		} else {
			$id = $this->subjectsdb->insert($post_data);
		}

		echo json_encode($id);
		die();
	}
	public function delete($sub_id = '') {
		// is_valid_id($course_id);
		$post = $this->input->get();
		$record = json_decode($post['models']);
		// pr($record);
		$affected_rows = $this->subjectsdb->delete($record[0]->subject_id);
		echo json_encode($affected_rows);
		die();
		// if ($affected_rows > 0) {
		// 	set_flash('Record deleted successfully !', 'success');
		// 	redirect('settings/courses', 'refresh');
		// } else {
		// 	set_flash('Record cannot be deleted!', 'error');
		// 	redirect('settings/courses', 'refresh');
		// }
	}
}

/* End of file Subjects.php */
/* Location: ./application/modules/settings/controllers/Subjects.php */