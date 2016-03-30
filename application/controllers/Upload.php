<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Upload extends CI_Controller {
	private $uploadDir;
	private $new_path;
	public function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			$this->comp_id = $this->session->userdata('company_id');
			$this->comp_id = $this->session->userdata('user_id');
			$this->load->helper(array('form', 'url', 'file'));
			$this->uploadDir = FCPATH . 'uploads/';
			$this->new_path = FCPATH . 'uploads/full_size/';

		}
	}

	public function index() {
		$this->load->view('upload', array('error' => ''));
	}
	public function do_upload() {
		$files = "";
		$upload_path_url = base_url() . 'uploads/';

		$config['upload_path'] = FCPATH . 'uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['file_name'] = time();
		// $config['max_size'] = '30000';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {
			//$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload', $error);

			//Load the list of existing files in the upload directory
			$existingFiles = get_dir_file_info($config['upload_path']);
			$foundFiles = array();
			$f = 0;
			foreach ($existingFiles as $fileName => $info) {
				if ($fileName != 'thumbs') {
					//Skip over thumbs directory
					//set the data for the json array
					$foundFiles[$f]['name'] = $fileName;
					$foundFiles[$f]['size'] = $info['size'];
					$foundFiles[$f]['url'] = $upload_path_url . $fileName;
					$foundFiles[$f]['thumbnailUrl'] = $upload_path_url . 'thumbs/' . $fileName;
					$foundFiles[$f]['deleteUrl'] = base_url() . 'upload/deleteImage/' . $fileName;
					$foundFiles[$f]['deleteType'] = 'DELETE';
					$foundFiles[$f]['error'] = null;

					$f++;
				}
			}
			$files = $this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('files' => $foundFiles)));
		} else {
			$data = $this->upload->data();
			$config = array();
			$config['image_library'] = 'gd2';
			$config['source_image'] = $data['full_path'];
			$config['create_thumb'] = TRUE;
			$config['new_image'] = $data['file_path'] . 'thumbs/';
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = '';
			$config['width'] = 75;
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
			$info->url = $upload_path_url . $data['file_name'];
			// I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
			$info->thumbnailUrl = $upload_path_url . 'thumbs/' . $data['file_name'];
			$info->pdfUrl = $upload_path_url . 'pdf/' . $data['file_name'];
			$info->deleteUrl = base_url() . 'upload/deleteImage/' . $data['file_name'];
			$info->deleteType = 'DELETE';
			$info->error = null;
			if ($_FILES['userfile']['size'] > 500000) {
				ImageJPEG(ImageCreateFromString(file_get_contents($data['full_path'])), $this->new_path . $data['file_name'], 70);
				unlink($data['full_path']);
			} else {
				ImageJPEG(ImageCreateFromString(file_get_contents($data['full_path'])), $this->new_path . $data['file_name'], 98);
			}
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
	// function doUpload($control="userfile", $path=NULL, $imageName, $sizes)
	// {
	// 	$path = $path?$path:FCPATH.'uploads/full_size/';
	// 	if( ! isset($_FILES[$control]) || ! is_uploaded_file($_FILES[$control]['tmp_name']))
	// 	{
	// 		print('No file was chosen');
	// 		return FALSE;
	// 	}
	// 	if($_FILES[$control]['error'] !== UPLOAD_ERR_OK)
	// 	{
	// 		print('Upload failed. Error code: '.$_FILES[$control]['error']);
	// 		Return FALSE;
	// 	}
	// 	switch(strtolower($_FILES[$control]['type']))
	// 	{
	// 		case 'image/jpeg':
	// 		$image = imagecreatefromjpeg($_FILES[$control]['tmp_name']);
	// 		move_uploaded_file($_FILES[$control]["tmp_name"],$path.$imageName);
	// 		break;
	// 		case 'image/png':
	// 		$image = imagecreatefrompng($_FILES[$control]['tmp_name']);
	// 		move_uploaded_file($_FILES[$control]["tmp_name"],$path.$imageName);
	// 		break;
	// 		case 'image/gif':
	// 		$image = imagecreatefromgif($_FILES[$control]['tmp_name']);
	// 		move_uploaded_file($_FILES[$control]["tmp_name"],$path.$imageName);
	// 		break;
	// 		default:
	// 		print('This file type is not allowed');
	// 		return false;
	// 	}
	// 	@unlink($_FILES[$control]['tmp_name']);
	// 	$old_width      = imagesx($image);
	// 	$old_height     = imagesy($image);

	//    //Create tn version
	// 	if($sizes=='tn' || $sizes=='all')
	// 	{
	// 		$max_width = 100;
	// 		$max_height = 100;
	// 		$scale          = min($max_width/$old_width, $max_height/$old_height);
	// 		if ($old_width > 100 || $old_height > 100)
	// 		{
	// 			$new_width      = ceil($scale*$old_width);
	// 			$new_height     = ceil($scale*$old_height);
	// 		} else {
	// 			$new_width = $old_width;
	// 			$new_height = $old_height;
	// 		}
	// 		$new = imagecreatetruecolor($new_width, $new_height);
	// 		imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
	// 		switch(strtolower($_FILES[$control]['type']))
	// 		{
	// 			case 'image/jpeg':
	// 			imagejpeg($new, $path.'tn_'.$imageName, 90);
	// 			break;
	// 			case 'image/png':
	// 			imagealphablending($new, false);
	// 			imagecopyresampled($new, $image,0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);
	// 			imagesavealpha($new, true);
	// 			imagepng($new, $path.'tn_'.$imageName, 0);
	// 			break;
	// 			case 'image/gif':
	// 			imagegif($new, $path.'tn_'.$imageName);
	// 			break;
	// 			default:
	// 		}
	// 	}

	// 	imagedestroy($image);
	// 	imagedestroy($new);
	// 	print '<div style="font-family:arial;"><b>'.$imageName.'</b> Uploaded successfully. Size: '.round($_FILES[$control]['size']/1000).'kb</div>';
	// }
	public function deleteImage($file) {
//gets the job done but you might want to add error checking and security
		$success = unlink(FCPATH . 'uploads/' . $file);
		$success = unlink(FCPATH . 'uploads/thumbs/' . $file);
		//info to see if it is doing what it is supposed to
		$info = new StdClass;
		$info->sucess = $success;
		$info->path = base_url() . 'uploads/' . $file;
		$info->file = is_file(FCPATH . 'uploads/' . $file);

		if (IS_AJAX) {
			echo json_encode(array($info));
		} else {
			//here you will need to decide what you want to show for a successful delete
			$file_data['delete_data'] = $file;
			$this->load->view('admin/delete_success', $file_data);
		}
	}

}