<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shifts extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('shift_model', 'shiftdb');
	}
	public function index() {
		$data['shifts'] = $this->shiftdb->get_all();
		$data['page_title'] = "Settings";
		$data['sub_page'] = "Shifts";
		$data['page'] = "settings/shifts/shifts";
		//it will enble jquery data table plugin for proper pagination and listing....
		$data['dtable_required'] = true;
		$this->load->view('template', $data);
	}
	public function delete($shift_id = '') {
		is_valid_id($shift_id);
		$affected_rows = $this->shiftdb->delete($shift_id);
		if ($affected_rows > 0) {
			set_flash('Record deleted successfully !', 'success');
			redirect('settings/shifts', 'refresh');
		} else {
			set_flash('Record cannot be deleted!', 'error');
			redirect('settings/shifts', 'refresh');
		}
	}

}

/* End of file Shifts.php */
/* Location: ./application/modules/settings/controllers/Shifts.php */