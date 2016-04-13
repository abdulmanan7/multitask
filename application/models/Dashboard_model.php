<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	function get_total_count($table = '', $term = "aends") {
		$this->db->select()->from($table);
		if ($term != "aends") {
			$this->db->like($term);
		}
		return $this->db->count_all_results();
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */