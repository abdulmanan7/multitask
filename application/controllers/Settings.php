<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('settings_model', 'settings');
	}
	public function index() {
		$data['email_tpl'] = $this->settings->get();
		$data['page'] = "settings/settings";
		$this->load->view('template', $data);
	}
	function update($id = '') {
		$rdata = $this->input->post();
		$pdata = array(
			'company_title' => $rdata['comp_title'],
			'company_email' => $rdata['comp_mail'],
			'description' => $rdata['comp_desc'],
			'subject' => $rdata['sname'],
			'body' => $rdata['ebody'],
		);
		$status = $this->settings->update($pdata);
		if ($status > 0) {
			set_flash('settings successfully updated');

		} else {
			set_flash('Save fail please try again later', 'error');
		}
		redirect('settings', 'refresh');
	}
}

/* End of file Settings.php */
/* Location: ./application/controllers/Settings.php */