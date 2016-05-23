<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
ini_set('post_max_size', '128M');
ini_set('upload_max_filesize', '128M');
class Fotobegehung extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('att_email_model', "att_email");
	}
	public function index() {
		// $data = $this->get_data();
		$data["logo"] = base_url('assets/img/small_logo.jpg');
		$this->load->view('frontend/order_form', $data);
	}
	public function test() {
		// $data = $this->get_data();
		$this->load->view('fotobegehung');
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
			if (isset($data['image'])) {

				$images = $data['image'];
				foreach ($images as $key => $val) {
					$ori_file_name = $data['orig_name'][$key];
					$extension = substr($ori_file_name, -4);
					if (strlen($ori_file_name) > 20) {
						$ori_file_name = substr($ori_file_name, 0, 20) . $extension;
					}

					$image_data = array(
						'att_id' => $att_id,
						'path' => $val,
						'orig_name' => $ori_file_name,
					);

					$att_detail_id = $this->att_email->save_detail($image_data);
				}
			}
			$this->send($pdata['email'], $att_id, $pdata);

		}
		//this the the PDF filename that user will get to download
		redirect('planung/listing', 'refresh');
	}
	public function get($att_id = '', $save = FALSE) {
		$data = $this->att_email->get($att_id);
		$images = $this->att_email->get_detail($att_id);
		$count = 0;
		$tr = array();
		$index = 0;
		if (!is_array_empty($images)) {
			foreach ($images as $key => $val) {
				if (count($tr[$index]) == 2) {
					$index++;
				}
				$tr[$index][] = $val['pdf_path'];
				$data['orig_names'][] = $val['orig_name'];
				$count++;
			}
			$data['images'] = $tr;
		} else {
			$data['images'] = NULL;
		}
		// pr($data);
		$html = $this->load->view('pdf/pdf_mail', $data, true);

		//this the the PDF filename that user will get to download
		$pdfFilePath = "solarVent.pdf";

		include_once APPPATH . '/third_party/mpdf/mpdf.php';
		// $m_pdf = new mPDF();
		$mpdf = new mPDF('', // mode - default ''
			'A4', // format - A4, for example, default ''
			0, // font size - default 0
			"Areal", // default font family
			'15', // 15 margin_left
			'15', // 15 margin right
			'16', // 16 margin top
			'16', // margin bottom
			'5', // 9 margin header
			'9', // 9 margin footer
			'p'); // L - landscape, P - portrait
		$m_pdf = $mpdf;
		$m_pdf->setAutoTopMargin = "stretch";
		$m_pdf->setAutoBottomMargin = 'stretch';
		$m_pdf->SetHTMLHeader('<div style="padding-left:500px;"><img src=' . base_url('assets/img/logo.jpg') . '></div>');
		$today = date("d.m.Y");
		$m_pdf->SetHTMLFooter('<p style="text-align:center;color:gray">Digitale Fotobegehung vom ' . $today . ' - Seite {PAGENO} von {nb}
  </p>');

		$pdf = $m_pdf;
		$pdf->WriteHTML($html);
		if ($save) {
			$savePath = FCPATH . "/uploads/docs/" . $data['vorname'] . "_" . $data['nachname'] . "_" . $att_id . ".pdf";
			$pdf->Output($savePath, "F");
			return $savePath;
		} else {
			$pdf->Output($pdfFilePath, "I");
		}
	}
	function send($email, $att_id, $pdata) {
		$this->load->model('settings_model');
		$comp = $this->settings_model->get();
		$message = str_replace("{name}", $pdata['nachname'], $comp['body']);
		$att_path = $this->get($att_id, true);
		$this->load->library('email', array('mailtype' => "html"));

		$this->email->from($comp['company_email'], $comp['company_title']);
		$this->email->to($email);
		$this->email->cc($comp['company_email']);

		$this->email->subject($comp['subject']);
		$this->email->attach($att_path);
		$this->email->set_mailtype("html");
		$this->email->message($message);
		//save lead before email is send
		$this->save_lead($pdata, $att_id);
		if ($this->email->send()) {
			redirect('fotobegehung/success/0', 'refresh');
		} else {
			redirect('fotobegehung/success/1', 'refresh');
			// show_error($this->email->print_debugger());
		}

	}
	function save_lead($params, $att_id) {
		$att_name = base_url('uploads/docs/' . $params['vorname'] . "_" . $params['nachname'] . "_" . $att_id . ".pdf");
		$params['att_link'] = $att_name;
		$this->load->library('bitrix_api');
		$res = $this->bitrix_api->add_lead($params);
		return true;
	}

	private function check_dups($email) {
		$status = $this->att_email->check_dups($email);
		if ($status > 0) {
			return TRUE;
		} else {
			//api called
			return FALSE;
		}

	}
	function success($message) {

		$data["logo"] = base_url('assets/img/small_logo.jpg');
		if ($message == 1) {
			$data["message"] = set_message("Fehler beim senden der eMail. Bitte prüfen Sie Ihre eMail-Adresse.", 'error');
		} else {
			$data["message"] = set_message('Vielen Dank für Ihre Übermittlung Ihrer digitalen Fotobegehung. Wir melden uns in Kürze bei Ihnen.');
		}
		$this->load->view('frontend/success', $data);
	}
	function delete($att_id = '', $pdf_name = NULL) {
		is_valid_id($att_id);
		if ($this->att_email->clear($att_id, $pdf_name) > 0) {
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