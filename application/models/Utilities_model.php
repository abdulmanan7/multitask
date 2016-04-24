<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilities_model extends CI_Model {
	function get_refresh_code() {
		$res = $this->db->get('api_cache')->row_array();
		return $res;
	}
	function save_refresh_code($ref_cod) {
		$this->db->set('refresh_code', $ref_cod);
		$this->db->update('api_cache');
		return $this->db->affected_rows();
	}
}

/* End of file Utilities_model.php */
/* Location: ./application/models/Utilities_model.php */