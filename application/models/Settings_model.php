<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

	function get() {
		$this->db->select();
		$this->db->where('id', 1);
		$res = $this->db->get('settings', 1, 0);
		return $res->row_array();
	}
	function update($data) {
		$this->db->where('id', 1);
		$this->db->update('settings', $data);
		return $this->db->affected_rows();
	}

}

/* End of file settings_model.php */
/* Location: ./application/models/settings_model.php */