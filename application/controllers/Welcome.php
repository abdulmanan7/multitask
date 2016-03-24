<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		// $this->load->view('welcome_message',$data['logo'="assets/img/logo.jpg"]);
	}
	public function listing($search_option = 'aends') {
		if ($this->input->is_ajax_request()) {

			$page = $this->input->get('page');
			$pageSize = $this->input->get('pageSize');
			$skip = $this->input->get('skip');
			$take = $this->input->get('take');
			$options = array('limit' => $take, 'offset' => $skip, 'term' => $search_option);
			$this->load->model('att_email_model', "att_email");
			$data = $this->att_email->get_all($options);
			if ($data):
				header("Content-type: application/json");
				$total = sizeof($data);
				if ($total != 0) {
					$total = $this->att_email->count_all();
				}
				$response = array(
					"pageSize" => $pageSize,
					"page" => $page,
					"total" => $total,
					"data" => $data,
				);
				echo json_encode($response);
				die;
			else:
				// send server error
				header("HTTP/1.1 500 Internal Server Error");
				echo "Failed to read data!";
			endif;
		} else {
			$this->load->view('pdf/pdf_listing');
		}
	}
	public function get_detail($id) {
		if ($this->input->is_ajax_request()) {

			// $options = array('limit' => $take, 'offset' => $skip, 'term' => $search_option);
			$this->load->model('att_email_model', "att_email");
			$data = $this->att_email->get_detail($id);
			if ($data):
				header("Content-type: application/json");
				$total = sizeof($data);
				// if ($total != 0) {
				// 	$total = $this->att_email->count_all();
				// }
				$response = array(
					// "pageSize" => $pageSize,
					// "page" => $page,
					"total" => $total,
					"data" => $data,
				);
				echo json_encode($response);
				die;
			else:
				// send server error
				header("HTTP/1.1 500 Internal Server Error");
				echo "Failed to read data!";
			endif;
		} else {
			$this->load->view('pdf/pdf_listing');
		}
	}
	public function reports() {
		$data = array('title' => 'reports');
		//load the view and saved it into $html variable
		$html = $this->load->view('reports', $data, true);

		//this the the PDF filename that user will get to download
		$pdfFilePath = "output_pdf_name.pdf";

		//load mPDF library
		$this->load->library('m_pdf');

		//generate the PDF from the given html
		$this->m_pdf->pdf->WriteHTML($html);

		//download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");
	}
}