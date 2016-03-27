<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Att_email_model extends CI_Model {
	public function save($object) {
		$this->db->insert('email_att', $object);
		return $this->db->insert_id();
	}
	public function save_detail($object) {
		$object['pdf_path'] = $object['path'];
		$object['thumb_path'] = str_replace("/pdf/", "/thumbs/", $object['path']);
		$object['path'] = str_replace("/pdf/", "/", $object['path']);
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
		$this->db->order_by('att_id', 'desc');
		return $this->db->get()->result_array();
	}
	function get($id) {
		$this->db->select();
		$this->db->from('email_att');
		$this->db->where('att_id', $id);
		return $this->db->get()->row_array();
	}
	function get_detail($id) {
		$this->db->select();
		$this->db->from('att_email_detail');
		$this->db->where('att_id', $id);
		return $this->db->get()->result_array();
	}
	function clear($att_id) {
		$this->db->where('att_id', $att_id);
		$this->db->delete('email_att');
		$this->remove_detail($att_id);
		return $this->db->affected_rows();
	}
	private function remove_detail($id) {
		$images = $this->get_detail($id);
		$base = base_url();
		foreach ($images as $key => $val) {
			$success = unlink(str_replace($base, "", $val['path']));
			$success = unlink(str_replace($base, "", $val['pdf_path']));
			$success = unlink(str_replace($base, "", $val['thumb_path']));
		}
		$this->db->where('att_id', $id);
		$this->db->delete('att_email_detail');
		return $this->db->affected_rows();
	}
	function count_all() {
		$this->db->select()->from('email_att');
		return $this->db->count_all_results();
	}
}

/* End of file Att_email_model.php */
/* Location: ./application/models/Att_email_model.php */