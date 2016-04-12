<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Fotobegehung extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// if (!$this->ion_auth->logged_in()) {
		// redirect('auth/login');
		// } else {
		$this->load->model('att_email_model', "att_email");

		// }
	}
	public function index() {
		// $data = $this->get_data();
		$data["logo"] = base_url('assets/img/small_logo.jpg');
		$this->load->view('frontend/order_form', $data);
	}
	public function save() {
		// load the view and saved it into $html variable
		$vorname = $this->input->post('vorname');
		$nachname = $this->input->post('nachname');
		$pdata = array(
			"vorname" => $vorname,
			"nachname" => $nachname,
			"strabe_nr" => $this->input->post('strabe'),
			"PLZ" => $this->input->post('plz'),
			"ort" => $this->input->post('ort'),
			"land" => $this->input->post('country'),
			"bauobjektadress" => $this->input->post('adresse'),
			"telefon" => $this->input->post('phone'),
			"email" => $this->input->post('email'),
			"baujahr_hous" => $this->input->post('baujahr_hous'),
			"baujahr_alte_heizung" => $this->input->post('baujahr_alte'),
			"brennstoff" => $this->input->post('question3'),
			"verbrauch" => $this->input->post('question4'),
			"einheit" => $this->input->post('unit'),
			"leistung_heizung_alt" => $this->input->post('question5'),
			"wohnflache" => $this->input->post('question6'),
			"personen" => $this->input->post('question7'),
			"warmedammung" => $this->input->post('question8'),
			"warmebedarf_neu" => $this->input->post('question9'),
			"beschreibung" => $this->input->post('description'));
		$att_id = $this->att_email->save($pdata);
		if ($att_id > 0) {
			$data = $this->input->post();
			$images = $data['image'];
			$count = 0;
			$tr = '';
			$index = 0;
			foreach ($images as $key => $val) {
				if (count($tr[$index]) == 2) {
					$index++;
				}
				$tr[$index][] = $val;
				$count++;
				$att_detail_id = $this->att_email->save_detail(array('att_id' => $att_id, 'path' => $val));
			}
			$this->send($pdata['email'], $att_id, $nachname);
		}
		//this the the PDF filename that user will get to download
		redirect('planung/listing', 'refresh');
	}
	public function get($att_id = '', $save = FALSE) {
		$data = $this->att_email->get($att_id);
		$images = $this->att_email->get_detail($att_id);
		$count = 0;
		$tr = '';
		$index = 0;
		foreach ($images as $key => $val) {
			if (count($tr[$index]) == 2) {
				$index++;
			}
			$tr[$index][] = $val['pdf_path'];
			$count++;
		}
		$data['images'] = $tr;
		// pr($data);
		$html = $this->load->view('pdf/pdf_mail', $data, true);

		//this the the PDF filename that user will get to download
		$pdfFilePath = "output_pdf_name.pdf";

		include_once APPPATH . '/third_party/mpdf/mpdf.php';
		$m_pdf = new mPDF();
		$m_pdf->setAutoTopMargin = "stretch";
		$m_pdf->SetHTMLHeader('<div style="padding-left:500px;text-align: right; width:200px"><img src=' . base_url('assets/img/logo.jpg') . '></div>');
		$m_pdf->SetHTMLFooter('<p style="text-align:center;color:gray">Digitale Ortsbegehnung vom - Seite 1 von x
	</p>');

		$pdf = $m_pdf;
		$pdf->WriteHTML($html);
		if ($save) {
			$savePath = FCPATH . "/uploads/docs/" . $data['vorname'] . $att_id . ".pdf";
			$pdf->Output($savePath, "F");
			return $savePath;
		} else {
			$pdf->Output($pdfFilePath, "I");
		}
	}
	function send($email, $att_id, $nachname) {
		$this->load->model('settings_model');
		$comp = $this->settings_model->get();
		$message = str_replace("{name}", $nachname, $comp['body']);
		$att_path = $this->get($att_id, true);
		$this->load->library('email', array('mailtype' => "html"));

		$this->email->from($comp['company_email'], $comp['company_title']);
		$this->email->to($email);
		$this->email->cc($comp['company_email']);

		$this->email->subject($comp['company_subject']);
		$this->email->attach($att_path);
		$this->email->message($message);

		if ($this->email->send()) {
			redirect('fotobegehung/success/0', 'refresh');
		} else {
			redirect('fotobegehung/success/1', 'refresh');
			// show_error($this->email->print_debugger());
		}

	}
	function success($message) {

		$data["logo"] = base_url('assets/img/small_logo.jpg');
		if ($message == 1) {
			$data["message"] = set_message("Fehler beim E-Mail zu senden", 'error');
		} else {
			$data["message"] = set_message('Vielen Dank für Ihre Übermittlung Ihrer digitalen Fotobegehung. Wir melden uns in Kürze bei Ihnen.');
		}
		$this->load->view('frontend/success', $data);
	}
	function delete($att_id = '') {
		is_valid_id($att_id);
		if ($this->att_email->clear($att_id) > 0) {
			$message = 'Record has been removed';
			if ($this->input->is_ajax_request()) {
				$data['message'] = $message;
				$data['status'] = 1;
				echo json_encode($data);die();
			}
			set_flash($message, 'success');
			redirect('fotobegehung', 'refresh');
		}
		$message = 'record canot be remove !';
		if ($this->input->is_ajax_request()) {
			$data['message'] = $message;
			$data['status'] = 0;
			echo json_encode($data);die();
		}
		set_flash($message, 'error');
		redirect('fotobegehung', 'refresh');
	}
}

/* End of file fotobegehung.php */
/* Location: ./application/controllers/fotobegehung.php */