<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses_model extends MY_Model {
	protected $_table = 'courses';
	protected $primary_key = 'course_id';
	protected $return_type = 'array';
	public function get_courses($comp_id = TRUE) {
		if ($comp_id) {
			$comp_id = ($comp_id > 1) ? $comp_id : $this->ion_auth->get_comp('user_id');
			$this->db->where('courses.company_id', $comp_id);
			$this->db->or_where('courses.company_id', SYSTEM);
		}
		$this->db->select('courses.*,d.name as department');
		$this->db->from($this->_table);
		$this->db->join('departments d', 'd.dept_id = courses.dept_id', 'left');
		$this->db->order_by('course_id', 'desc');
		$this->db->distinct();
		$result = $this->db->get()->result_array();
		return $result;
	}
}

/* End of file Courses_model.php */
/* Location: ./application/modules/settings/models/Courses_model.php */