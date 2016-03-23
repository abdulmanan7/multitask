<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Reports extends CI_Controller {

	public function index() {
		$data = $this->get_data();
		$this->load->view('welcome_message', $data);
	}
	public function get($state = "I") {
		// load the view and saved it into $html variable
		// $data = $this->get_data();
		$pdata = array(
			"vorname" => $this->input->post('vorname'),
			"nachname" => $this->input->post('nachname'),
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
			"einheit" => $this->input->post('question_part2'),
			"leistung_heizung_alt" => $this->input->post('question5'),
			"wohnflache" => $this->input->post('question6'),
			"personen" => $this->input->post('question7'),
			"warmedammung" => $this->input->post('question8'),
			"warmebedarf_neu" => $this->input->post('question9'),
			"beschreibung" => $this->input->post('description'));
		$this->load->model('att_email_model', "att_email");
		$att_id = $this->att_email->save($pdata);
		// echo "<pre>";
		// print_r($pdata);die;
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
		// print_r($tr);die;
		$data['images'] = $tr;
		$html = $this->load->view('pdf/pdf_mail', $data, true);

		//this the the PDF filename that user will get to download
		$pdfFilePath = "output_pdf_name.pdf";

		include_once APPPATH . '/third_party/mpdf/mpdf.php';
		$m_pdf = new mPDF();
		$m_pdf->setAutoTopMargin = "stretch";
		$m_pdf->SetHTMLHeader('<div style="padding-left:500px;text-align: right; width:200px"><img src=' . base_url('assets/img/logo.jpg') . '></div>');
		$m_pdf->SetHTMLFooter('<p style="text-align:center;color:gray">Digitale Ortsbegehnung vom <Datum> - Seite 1 von x
</p>');

		$pdf = $m_pdf;
		$pdf->WriteHTML($html);
		$pdf->Output($pdfFilePath, $state);
	}
	public function get_data($value = '') {
		return $data = array(
			"logo" => base_url('assets/img/logo.jpg'),
			"Pagina" => 12,
			"Sitio" => "www.mundo.com",
			"Facebook" => "facebook.com/mundo.com",
			"Twitter" => "twitter.com/mundo.com",
		);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */