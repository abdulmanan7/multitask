<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Att_email_model extends CI_Model {
	public function save($object) {
		$this->db->insert('email_att', $object);
		return $this->db->insert_id();
	}
	public function save_detail($object) {
		$object['pdf_path'] = $object['path'];
		$split = explode("/", $object['path']);
		$fileName = $split[count($split) - 1];
		$object['thumb_path'] = str_replace("/pdf/", "/thumbs/", $object['path']);
		$object['path'] = str_replace("/pdf/", "/", $object['path']);
		$object['file_name'] = $fileName;
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
			$this->db->or_like('PLZ', $term);
			$this->db->or_like('ort', $term);
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
	function clear($att_id, $pdf_name) {
		$this->db->where('att_id', $att_id);
		$this->db->delete('email_att');
		if (file_exists(FCPATH . "uploads/docs/" . $pdf_name)) {
			unlink(FCPATH . "uploads/docs/" . $pdf_name);
		}
		$this->db->affected_rows();
		return $this->remove_detail($att_id);
	}
	private function remove_detail($id) {
		$images = $this->get_detail($id);
		if (!is_array_empty($images)) {

			$upload_folder = FCPATH . "uploads/";
			foreach ($images as $key => $val) {
				$file_name = $val['file_name'];
				$full_size_path = $upload_folder . "full_size/" . $file_name;
				$pdf_path = $upload_folder . "pdf/" . $file_name;
				$thumb_path = $upload_folder . "thumbs/" . $file_name;
				if (file_exists($full_size_path)) {
					$success = unlink($full_size_path);
				}if (file_exists($pdf_path)) {
					$success = unlink($pdf_path);
				}
				if (file_exists($thumb_path)) {
					$success = unlink($thumb_path);
				}
				if (file_exists($upload_folder . $file_name)) {
					$success = unlink($upload_folder . $file_name);
				}
			}
			$this->db->where('att_id', $id);
			$this->db->delete('att_email_detail');
			return $this->db->affected_rows();
		} else {
			return TRUE;
		}
	}
	function count_all($term = "aends") {
		$this->db->select()->from('email_att');
		if ($term != "aends") {
			$this->db->like('vorname', $term);
			$this->db->or_like('nachname', $term);
			$this->db->or_like('email', $term);
			$this->db->or_like('PLZ', $term);
			$this->db->or_like('ort', $term);
		}
		return $this->db->count_all_results();
	}
	function check_dups($term = "aends") {
		$this->db->select()->from('email_att');
		$this->db->where('email', $term);
		return $this->db->count_all_results();
	}
}

/* End of file Att_email_model.php */
/* Location: ./application/models/Att_email_model.php */