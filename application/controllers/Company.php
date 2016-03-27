<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Company extends CI_Controller {
	private $fileerr = FALSE;
	public $comp_id;
	function __construct() {
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			$this->comp_id = $this->session->userdata('company_id');
			$this->load->model('company_model');
			// $this->lang->load('company');
			$data['pageName'] = 'companyPage';

		}
	}
	public function index() {
		$data['record'] = $this->company_model->getCompany();
		$data['page'] = 'company/companyinfo';
		$this->load->view('template', $data);
	}

	public function update() {
		if ($_POST) {
			$this->form_validation->set_rules('name', $this->lang->line('validation_name_label'), 'required|xss_clean');
			$this->form_validation->set_rules('attn_name', $this->lang->line('validation_attn_label'), 'required|xss_clean');
			$this->form_validation->set_rules('address1', $this->lang->line('validation_address1_label'), 'required|xss_clean');
			$this->form_validation->set_rules('postcode', $this->lang->line('validation_postcode_label'), 'required|xss_clean');
			$this->form_validation->set_rules('email', $this->lang->line('validation_email_label'), 'required|valid_email|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$data['record'] = $this->company_model->getCompany($this->comp_id);
				$data['page'] = 'company/update';
				$this->load->view('template', $data);
			} else {

				$data = array(
					'name' => esc($this->input->post('name')),
					'attn_name' => esc($this->input->post('attn_name')),
					'address1' => esc($this->input->post('address1')),
					'address2' => esc($this->input->post('address2', TRUE)),
					'postcode' => esc($this->input->post('postcode')),
					'country' => esc($this->input->post('country', TRUE)),
					'city' => esc($this->input->post('city', TRUE)),
					'state' => esc($this->input->post('state', TRUE)),
					'phone' => esc($this->input->post('phone', TRUE)),
					'fax' => esc($this->input->post('fax', TRUE)),
					'email' => esc($this->input->post('email')),
					'registration_no' => esc($this->input->post('registration_no', TRUE)),
					'VAT_no' => esc($this->input->post('VAT_no', TRUE)),
					'invoice_footer_text' => $this->input->post('invoice_footer_text', TRUE),
					'purchase_footer_text' => $this->input->post('purchase_footer_text', TRUE),

				);
				$message = $this->company_model->update($data);
				$this->session->set_flashdata('message', $message);
				// pr($data['message']);
				redirect('setting/company');

			}
		} else {
			$data['record'] = $this->company_model->getCompany();
			$data['page'] = 'company/update';
			$this->load->view('template', $data);
		}
	}
	public function changelogo() {
		$data['record'] = $this->company_model->getCompany();
		$data['page'] = 'setting/changelogo';
		$this->load->view('template', $data);
	}
	public function do_upload() {
		$path = '_assets/images/';
		$fileName = 'logo' . $this->comp_id . '.png';
		$config = array(
			'allowed_types' => 'jpg|png|gif',
			'upload_path' => $path,
			'max_size' => '200',
			'overwrite' => true,
			'file_name' => $fileName,
			'max_height' => "300",
			'max_width' => "300",

		);

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('logo')) {
			$message = $this->common_lib->set_message($this->upload->display_errors(), 'error');
			$this->session->set_flashdata('message', $message);
			redirect('setting/changelogo');
		} else {
			$imageData = $this->upload->data();
		}

		$data['logo'] = $path . $imageData['file_name'];
		$message = $this->company_model->updateLogo($data);
		$this->session->set_flashdata('message', $message);
		redirect('setting/changelogo', 'refresh');
	}
}