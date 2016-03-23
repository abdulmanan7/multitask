<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Att_email_model extends CI_Model {
	public function save($object) {
		$this->db->insert('email_att', $object);
		return $this->db->insert_id();
	}
	public function save_detail($object) {
		$this->db->insert('att_email_detail', $object);
		return $this->db->insert_id();
	}
	function get_all($seach_option) {
		$term = ($seach_option['term'] == "aends") ? NULL : $seach_option['term'];
		$this->db->select();
		$this->db->from('email_att');
		if ($term) {
			$this->db->like('vorname', $term);
			$this->db->or_like('nachname', $term);
			$this->db->or_like('email', $term);
		}
		return $this->db->get()->result_array();
	}
	function count_all() {
		$this->db->select()->from('email_att');
		return $this->db->count_all_results();
	}
}

/* End of file Att_email_model.php */
/* Location: ./application/models/Att_email_model.php */