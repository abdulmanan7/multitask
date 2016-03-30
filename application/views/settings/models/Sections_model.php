<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sections_model extends MY_Model {
	protected $_table = 'sections';
	protected $primary_key = 'section_id';
	protected $return_type = 'array';
	public function get_sections($shift_id = NULL, $course_id = NULL, $extra = array()) {
		$this->db->select("sections.*,s.id as shift_id ,s.title as shift,e.first_name,e.last_name,c.name as course");
		$this->db->from($this->_table);
		$this->db->join('shift s', 's.id = sections.shift_id');
		$this->db->join('courses c', 'c.course_id = sections.course_id');
		$this->db->join('employees e', 'e.employee_id = sections.head_id');
		$this->db->distinct();
		$this->db->order_by('sections.start_time', 'desc');
		// $this->db->group_by('c.course_id');
		$comp_id = $this->ion_auth->get_comp('user_id');
		$this->db->where('sections.company_id', $comp_id);
		// $this->db->or_where('sections.company_id', SYSTEM);
		if ($shift_id) {
			$this->db->where('s.id', $shift_id);
		}
		if ($course_id) {
			$this->db->where('sections.course_id', $course_id);
		}
		$result = $this->db->get()->result_array();
		if (isset($extra['only_sections'])) {
			return $result;
		}
		// pr($this->db->last_query());
		$shifts = array();
		foreach ($result as $key => $value) {
			// pr($value['shift']);
			if ($value['shift'] === "Morning") {
				$shifts['Morning'][$value['title']] = $value;
			}
			if ($value['shift'] === "Evening") {
				$shifts['Evening'][$value['title']] = $value;
			}
			if ($value['shift'] === "Noon") {
				$shifts['Noon'][$value['title']] = $value;
			}
		}
		return $shifts;
	}
	public function get_sections2($shift_id = NULL, $course_id = NULL) {
		$this->db->select("sections.*,c.name as course,s.id as shift_id ,s.title as shift");
		$this->db->from('courses c');
		$this->db->join('shift_course sc', 'c.course_id = sc.course_id', 'left');
		$this->db->join('shift s', 's.id = sc.shift_id', 'left');
		$this->db->join('sections', 's.id = sections.section_id', 'left');
		$this->db->join('employees e', 'e.employee_id = sections.head_id', 'left');
		$this->db->distinct();
		$this->db->order_by('section_id', 'desc');

		$comp_id = $this->ion_auth->get_comp('user_id');
		$this->db->where('sections.company_id', $comp_id);
		$this->db->or_where('sections.company_id', SYSTEM);
		// $this->db->group_by('c.course_id');
		if ($shift_id) {
			$this->db->where('s.id', $shift_id);
		}
		if ($course_id) {
			$this->db->where('c.course_id', $course_id);
		}
		$this->db->get()->result_array();
		return pr($this->db->last_query());
	}
}

/* End of file Sections_model.php */
/* Location: ./application/modules/settings/models/Sections_model.php */