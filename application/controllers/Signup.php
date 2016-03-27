<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Signup extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('company_model');
		$this->lang->load('signup');
	}
	public function index() {
		$data['pageName'] = 'signupPage';
		$this->load->view('signup/signup', $data);
	}
	public function add() {

		if ($_POST) {
			$tables = $this->config->item('tables', 'ion_auth');
			$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
			$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
			$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required');
			$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
			$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

			if ($this->form_validation->run() == FALSE) {
				$data['pageName'] = 'signupPage';
				$this->load->view('signup/signup', $data);
			} else {
				//default setting must be update by user.
				// $comp_id = $this->default_setting($_POST['company'], $_POST['email']);

				$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
				$email = strtolower($this->input->post('email'));
				$password = $this->input->post('password');

				$additional_data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'phone' => $this->input->post('phone'),
					'company' => $this->input->post('company'),
				);
				$group = array('1');
				$user_id = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
				if ($user_id > 0) {
					$comp_data = array(
						'id' => $user_id,
						'name' => $this->input->post('company'),
						'phone' => $this->input->post('username'),
						'email' => $email,
					);
					$this->db->insert('company', $comp_data);
					set_flash('Thank you ! you have just registered at eckool .');
					$this->ion_auth->auto_login($email, $password);
				} else {
					pr('error while registring new username');
				}
			}

		} //end if data submited...
		else {

			$data['pageName'] = 'signupPage';
			$this->load->view('signup/signup', $data);

		}

	}
	public function settings($comp_id = '') {
		$data['pageName'] = 'signupPage';
		$this->load->view('signup/settings', $data);
	}
	/*private function default_setting($comp_name, $email) {
$this->load->model('company_model');
$data = array(
'name' => $comp_name,
'email' => $email,
'attn_name' => 'company Demo',
'address1' => 'change the address by going to setting and company tab',
'postcode' => '00000',
);
$comp_id = $this->company_model->add($data);
//invoice Statuses

return $comp_id;
}*/

}