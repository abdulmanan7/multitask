<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode extends CI_Controller {

	public function index($temp = '1-1445667029') {
		//I'm just using rand() function for data example
		// $temp = rand(10000, 99999);

		$this->set_barcode($temp);
	}

	public function set_barcode($code) {
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		$image = Zend_Barcode::draw('code128', 'image',
			array('text' => $code,
				'factor' => 2.0,
				'barHeight' => '10',
				// 'maxWidth' => '100',
				'drawText' => false,
			), array());
		$file = imagejpeg($image, 'code39_barcode.jpg', 100);
		// var_dump($image);die();
		$this->load->helper('file');
		write_file(base_url('uploads/barcode'), $file);
	}
}

/* End of file barcode.php */
/* Location: ./application/controllers/barcode.php */