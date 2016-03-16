<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Reports extends CI_Controller {

	public function index() {
		$data = $this->get_data();
		$this->load->view('welcome_message', $data);
	}
	public function get($state = "D") {
		//load the view and saved it into $html variable
		$data = $this->get_data();
		$html = $this->load->view('pdf/pdf_mail', $data, true);

		//this the the PDF filename that user will get to download
		$pdfFilePath = "output_pdf_name.pdf";

		include_once APPPATH . '/third_party/mpdf/mpdf.php';
		$m_pdf = new mPDF();
		$m_pdf->SetHTMLHeader('<div style="text-align: right;"><img style="margin-bottom:100px" src=' . $data['logo'] . '></div>');
		$m_pdf->SetHTMLFooter('<p style="text-align:center;color:gray">Digitale Ortsbegehnung vom <Datum> - Seite 1 von x
</p>');

		$pdf = $m_pdf;
		$pdf->WriteHTML($html);
		$pdf->Output($pdfFilePath, $state);
	}
	public function get_data($value = '') {
		return $data = array(
			'heading' => array(
				'Condiciones' => array(
					'direction' => "right",
					'Canon_de_Arriendo' => "xnsa",
					'Mes_de_Garantía' => "right",
					'Moneda' => "right",
					'Fecha_inicio' => "right",
					'Fecha_fin' => "right",
				),
				'Reajuste' => array(
					'Linea_I' => "right",
					'Linea_II' => "xnsa",
				),
				'Comisión' => array(
					'Linea_I' => "right",
					'Linea_II' => "xnsa",
				),
				'Multas' => array(
					'Linea_I' => "right",
					'Linea_II' => "xnsa",
				),
				'Arrendatario' => array(
					'Nombre' => "right",
					'Evaluación_de_Riesgos' => "xnsa",
					'Coordinación_visita' => "xnsa",
				),
				'Propietario' => array(
					'Nombre' => "right",
					'Evaluación_de_Riesgos' => "xnsa",
					'Coordinación_visita' => "xnsa",
				),

			),
			"logo" => base_url('assets/img/logo.png'),
			"Pagina" => 12,
			"Sitio" => "www.mundo.com",
			"Facebook" => "facebook.com/mundo.com",
			"Twitter" => "twitter.com/mundo.com",
		);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */