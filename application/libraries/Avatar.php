<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avatar
{
	protected $ci;
	protected $entity;
	protected $comp_id;
	protected $upload_path;
	protected $sub_dir;
	protected $file_path;
	protected $file_name='None';
	protected $max_size= '2000';
	protected $overwrite= TRUE;
	protected $allowed_types= 'jpg|png|gif';
	public function Avatar($props = array())
	{
        $this->ci =& get_instance();
        $this->comp_id = $this->ci->session->userdata('user_id');
        if (count($props) > 0)
		{
			$this->initialize($props);
		}
	}
	function initialize($config = array()){
		foreach ($config as $key => $val) {
			$this->$key=$val;
		}
		if (isset($config['entity'])) {
			$sub_dir = (isset($config['sub_dir'])) ? $config['sub_dir'] : '' ;
			$this->upload_path=$this->get_dir($sub_dir);
		}
		if (isset($config['file_name'])) {
			$this->set_file_name($config['file_name']);
		}
		if (!isset($config['file_path'])) {
			$sub_dir = (isset($config['sub_dir'])) ? $config['sub_dir'] : '' ;
			$this->set_path($sub_dir);
		}
	}
	function set_path($dir='')
	{
		$this->file_path=realpath('uploads/'.$this->comp_id.'/'.$this->entity.'/'.$dir);
		return $this->file_path;
	}
	function get_path($file,$path=NULL)
	{
		$file_path = (isset($path)) ? realpath($path) : $this->file_path.'/'.$file;
		if (file_exists($file_path)) {
		   return realpath($file_path);
		} 
		pr('error !file path don\'t exits.go back and try again');
	}
	function get_dir($dir='')
	{
		$path=APPPATH.'../uploads/'.$this->comp_id.'/'.$this->entity.'/'.$dir;
		$make_dir='./uploads/' . $this->comp_id . '/'.$this->entity.'/';
		
		if (!is_dir($path)) {
			mkdir($make_dir.$dir,0777, true);
		}
		return $path;
	}
	function set_file_name($name,$ext=NULL)
	{
		if ($ext) {
		$this->file_name = 'eckool_' . $this->comp_id .'_'.$name.'.'.$ext;
		}else{
		$this->file_name = 'eckool_' . $name .'_'. $this->comp_id;
		}
	}
	public function get_file_name($ext=NULL,$name=NULL)
	{	if ($name && $ext) {
			return $this->file_name.'_'.$name.$ext;
		}
		if ($name) {
			return $this->file_name.'_'.$name;
		}
		if ($ext) {
			return $this->file_name.'.'.$ext;
		}
		return $this->file_name;
	}
	public function save_avatar()
	{
		$config = array(
					'allowed_types' =>$this->allowed_types,
					'upload_path' => realpath($this->upload_path),
					'max_size' => $this->max_size,
					'overwrite' => $this->overwrite,
					'file_name' => $this->file_name,

				);
				$this->ci->load->library('upload', $config);
				if (!$this->ci->upload->do_upload('avatar')) {
					$message = $this->ci->upload->display_errors();
					pr(show_message($message, 'error'));
				} else {
					$imageData = $this->ci->upload->data();
				}
			$new_image_path=$this->get_file_name($imageData['file_ext'],'avatar');
			$config = array(
			'source_image' => realpath($imageData['full_path']),
			'new_image' => $new_image_path,
			'maintain_ration' => true,
			'width' => 197,
			'height' => 242
			);
		$this->ci->load->library('image_lib', $config);
		if ( ! $this->ci->image_lib->resize())
		{
		    pr($this->ci->image_lib->display_errors());
		}else{
		$filepath='uploads/'.$this->comp_id.'/'.$this->entity.'/'.$this->sub_dir.'/'.$new_image_path;
		$this->clean_dir($imageData['full_path']);
		return $filepath;
		}
	}
	function clean_dir($path) {
		$files = glob($path); // get all file names
		foreach ($files as $file) {
			// iterate files
			if (is_file($file)) {
				unlink($file);
			}
			// delete file
		}
	}
}

/* End of file Avatar.php */
/* Location: ./application/libraries/Avatar.php */
