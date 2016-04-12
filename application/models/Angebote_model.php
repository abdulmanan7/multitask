<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angebote_model extends CI_Model {
	protected $table = "createdfiles";
	public function save($object) {
		$this->db->insert($this->table, $object);
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
		$this->db->from($this->table);
		if ($term) {
			$this->db->like('client_name', $term);
			$this->db->or_like('mail', $term);
			$this->db->or_like('plz', $term);
		}
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result_array();
	}
	function get($id) {
		$this->db->select();
		$this->db->from($this->table);
		$this->db->where('id', $id);
		return $this->db->get()->row_array();
	}
	function get_detail($id) {
		$this->db->select();
		$this->db->from('att_email_detail');
		$this->db->where('id', $id);
		return $this->db->get()->result_array();
	}
	function clear($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->table);
		$this->remove_detail($id);
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
		$this->db->where('id', $id);
		$this->db->delete('att_email_detail');
		return $this->db->affected_rows();
	}
	function count_all($term = "aends") {
		$this->db->select()->from($this->table);
		if ($term != "aends") {
			$this->db->like('client_name', $term);
			$this->db->or_like('mail', $term);
			$this->db->or_like('plz', $term);
		}
		return $this->db->count_all_results();
	}
}

/* End of file Att_email_model.php */
/* Location: ./application/models/Att_email_model.php */