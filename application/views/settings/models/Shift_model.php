<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift_model extends MY_Model {
	protected $_table = 'shift';
	protected $return_type = 'array';
	public function add_shift($data) {
		$this->db->insert('shift_course', $data);
	}
	public function get_shifts($course_id = NULL, $comp_id = TRUE) {
		if ($comp_id) {
			$comp_id = ($comp_id > 1) ? $comp_id : $this->ion_auth->get_comp('user_id');
			$this->db->where('shift.company_id', $comp_id);
			$this->db->or_where('shift.company_id', SYSTEM);
		}
		$this->db->select("shift.*,c.name as course");
		$this->db->from($this->_table);
		$this->db->join('shift_course sc', 'sc.shift_id = shift.id', 'left');
		$this->db->join('courses c', 'c.course_id = sc.course_id', 'left');
		$this->db->distinct();
		$this->db->order_by('shift.id', 'desc');
		if ($course_id) {
			$this->db->where('c.course_id', $course_id);
		}
		return $this->db->get()->result_array();
	}
}

/* End of file Shift_model.php */
/* Location: ./application/modules/settings/models/Shift_model.php */