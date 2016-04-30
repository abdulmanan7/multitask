<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Upload extends CI_Controller {
	private $uploadDir;
	private $new_path;
	public function __construct() {
		parent::__construct();

		$this->comp_id = $this->session->userdata('company_id');
		$this->comp_id = $this->session->userdata('user_id');
		$this->load->helper(array('form', 'url', 'file'));
		$this->uploadDir = FCPATH . 'uploads/';
		$this->new_path = FCPATH . 'uploads/full_size/';

	}

	public function index() {
		$this->load->view('upload', array('error' => ''));
	}
	public function do_upload() {
		$files = "";
		$upload_path_url = base_url() . 'uploads/';
		if ($_FILES['userfile']['type'] == "application/pdf") {
			$config['upload_path'] = FCPATH . 'uploads/full_size';
		} else {
			$config['upload_path'] = FCPATH . 'uploads/';
		}

		$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|mov|avi|mp4|wmv|tif|bmp';
		$config['file_name'] = time();

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
			die;
		} else {
			$data = $this->upload->data();
			//if pdf file
			if (!$data['is_image']) {
				$info = new StdClass;
				$info->name = $data['file_name'];
				$info->size = $data['file_size'] * 1024;
				$info->type = $data['file_type'];
				$info->url = $upload_path_url . 'full_size/' . $data['file_name'];
				// I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
				if ($_FILES['userfile']['type'] == "application/pdf") {
					$info->thumbnailUrl = load_img('PDF-icon.png');
					$info->pdfUrl = load_img('pdf_thumb.png');
				} else {
					$info->url = $upload_path_url . '/' . $data['file_name'];
					$info->thumbnailUrl = load_img('media-icon.jpg');
					$info->pdfUrl = load_img('media_thumb.png');
				}
				$info->pdfUrl = load_img('pdf_thumb.png');
				$info->deleteUrl = base_url() . 'upload/deleteImage/' . $data['file_name'];
				$info->deleteType = 'DELETE';
				$info->error = null;
				$files[] = $info;
				echo json_encode(array("files" => $files));
				die;
			}
			$config = array();
			$config['image_library'] = 'gd2';
			$config['source_image'] = $data['full_path'];
			$config['create_thumb'] = TRUE;
			$config['new_image'] = $data['file_path'] . 'thumbs/';
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = '';
			$config['width'] = 80;
			$config['height'] = 50;
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$configer = array(
				'image_library' => 'gd2',
				'source_image' => $data['full_path'],
				'maintain_ratio' => TRUE,
				'width' => 350,
				'height' => 200,
				'new_image' => $data['file_path'] . "pdf/",
			);
			$this->image_lib->clear();
			$this->image_lib->initialize($configer);
			$this->image_lib->resize();

			//set the data for the json array
			$info = new StdClass;
			$info->name = $data['file_name'];
			$info->size = $data['file_size'] * 1024;
			$info->type = $data['file_type'];
			$info->url = $upload_path_url . 'full_size/' . $data['file_name'];
			// I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
			$info->thumbnailUrl = $upload_path_url . 'thumbs/' . $data['file_name'];
			$info->pdfUrl = $upload_path_url . 'pdf/' . $data['file_name'];
			$info->deleteUrl = base_url() . 'upload/deleteImage/' . $data['file_name'];
			$info->deleteType = 'DELETE';
			$info->error = null;
			if ($data['image_width'] > 1000) {
				// ImageJPEG(ImageCreateFromString(file_get_contents($data['full_path'])), $this->new_path . $data['file_name'], 70);
				$configer = array(
					'image_library' => 'gd2',
					'source_image' => $data['full_path'],
					'maintain_ratio' => TRUE,
					'width' => 1000,
					'new_image' => $this->new_path,
				);
				$this->image_lib->clear();
				$this->image_lib->initialize($configer);
				$this->image_lib->resize();
			} else {
				ImageJPEG(ImageCreateFromString(file_get_contents($data['full_path'])), $this->new_path . $data['file_name'], 98);
			}
			unlink($data['full_path']);
			$files[] = $info;
			//this is why we put this in the constants to pass only json data
			if ($this->input->is_ajax_request()) {
				echo json_encode(array("files" => $files));
				//this has to be the only data returned or you will get an error.
				//if you don't give this a json array it will give you a Empty file upload result error
				//it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
				// so that this will still work if javascript is not enabled
			} else {
				$file_data['upload_data'] = $this->upload->data();
				$this->load->view('upload/upload_success', $file_data);
			}
		}
	}
	public function deleteImage($file, $pdf = FALSE) {
//gets the job done but you might want to add error checking and security
		if ($pdf) {

		}
		$full_size_path = FCPATH . 'uploads/full_size/' . $file;
		$thumbs_path = FCPATH . 'uploads/thumbs/' . $file;
		$pdf_path = FCPATH . 'uploads/pdf/' . $file;
		$videoPath = FCPATH . 'uploads/' . $file;
		if (file_exists($full_size_path)) {
			$success = unlink($full_size_path);
		}
		if (file_exists($thumbs_path)) {
			$success = unlink($thumbs_path);
		}
		if (file_exists($pdf_path)) {
			$success = unlink($pdf_path);
		}
		if (file_exists($videoPath)) {
			$success = unlink($videoPath);
		}
		//info to see if it is doing what it is supposed to
		$info = new StdClass;
		$info->sucess = $success;
		$info->path = base_url() . 'uploads/full_size/' . $file;
		$info->file = is_file(FCPATH . 'uploads/full_size/' . $file);

		if ($this->input->is_ajax_request()) {
			echo json_encode(array($info));
		} else {
			//here you will need to decide what you want to show for a successful delete
			$file_data['delete_data'] = $file;
			$this->load->view('admin/delete_success', $file_data);
		}
	}

}