<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('jobs_model', 'jobdb');

	}
	public function index() {
		$this->load->model('departments_model', 'deptdb');
		$data['depts'] = $this->deptdb->get_all();
		$data['jobs'] = $this->jobdb->get_jobs();
		$data['page_title'] = "Settings";
		//it will enble jquery data table plugin for proper pagination and listing....
		$data['dtable_required'] = true;
		$data['sub_page'] = "Jobs";
		$data['page'] = "settings/jobs/jobs";
		$this->load->view('template', $data);
	}
	public function remove($id) {
		is_valid_id($id);
		if ($this->jobdb->delete($id) > 0) {
			set_flash('Record deleted successfully !', 'success');
			redirect('settings/jobs', 'refresh');
		} else {
			set_flash('Record cannot be deleted!', 'error');
			redirect('settings/jobs', 'refresh');
		}
	}

}

/* End of file Jobs.php */
/* Location: ./application/modules/settings/controllers/Jobs.php */