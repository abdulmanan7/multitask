<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_model extends MY_Model {
	protected $_table = 'jobs';
	protected $return_type = 'array';
	public function get_jobs($value = '') {
		$this->db->select('jobs.*,d.name as department');
		$this->db->from($this->_table);
		$this->db->join('departments d', 'd.dept_id = jobs.dept_id', 'left');

		$comp_id = $this->ion_auth->get_comp('user_id');
		$this->db->where('jobs.company_id', $comp_id);
		$this->db->or_where('jobs.company_id', SYSTEM);
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result_array();
	}
}

/* End of file Semesters_model.php */
/* Location: ./application/modules/settings/models/Semesters_model.php */