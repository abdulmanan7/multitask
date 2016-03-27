<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| Validation rules
| -------------------------------------------------------------------
|
 */
// error
$config['error_prefix'] = '<div class="error">';
$config['error_suffix'] = '</div>';
$config = array(
	'examination/take' => array(
		// array(
		// 	'field' => 'theory[]',
		// 	'label' => '',
		// 	'rules' => 'trim|required',
		// ),
		// array(
		// 	'field' => 'obtain_marks[]',
		// 	'label' => 'Obtain Marks',
		// 	'rules' => 'trim|required',
		// ),
		array(
			'field' => 'course_id',
			'label' => 'Course',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'exam_id',
			'label' => 'Examination',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'student_id',
			'label' => 'Student',
			'rules' => 'trim|required',
		),
	),
	'exam' => array(
		array(
			'field' => 'held_date',
			'label' => 'Date',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'type_id',
			'label' => 'Type',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'status',
			'label' => 'Status',
			'rules' => 'trim|required',
		),
	),
	'fee' => array(
		array(
			'field' => 'name',
			'label' => 'Fee Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'fee_type',
			'label' => 'Fee Type',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'amount',
			'label' => 'Amount',
			'rules' => 'trim|required',
		),
	),
	'fee_trans' => array(
		array(
			'field' => 'fee_name[]',
			'label' => 'Fee Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'student_id',
			'label' => 'Student',
			'rules' => 'trim|required',
			'errors' => array(
				'required' => 'Student ID is Missing! try refresh the page.',
			),
		),
		array(
			'field' => 'fee_type[]',
			'label' => 'Fee Type',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'fee_amount[]',
			'label' => 'Amount',
			'rules' => 'trim|required',
		),
	),
	'dept' => array(
		array(
			'field' => 'name',
			'label' => 'Department Name',
			'rules' => 'trim|required',
			// 'errors' => array(
			// 	'xss_clean' => 'You must provide.',
			// ),
		),
		array(
			'field' => 'description',
			'label' => 'Department description',
			'rules' => 'trim|required',
		),
	),
	'semester' => array(
		array(
			'field' => 'name',
			'label' => 'Semester Name',
			'rules' => 'trim|required',
			// 'errors' => array(
			// 	'xss_clean' => 'You must provide.',
			// ),
		),
	),
	'contact_us' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'phone',
			'label' => 'Phone No',
			'rules' => 'trim|required',
		),
	),
	'job' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'salary',
			'label' => 'Salary',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'dept_id',
			'label' => 'Department ID',
			'rules' => 'trim|required',
		),
	),
	'subscribe' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'phone',
			'label' => 'Phone No',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'pakage',
			'label' => 'Pakage',
			'rules' => 'trim|required',
		),
	),
	'course' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'cost',
			'label' => 'Cost or charges',
			'rules' => 'trim|required|is_numeric',
		),
	),
	'shift' => array(
		array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'start_time',
			'label' => 'Start Time',
			'rules' => 'trim|required',
		), array(
			'field' => 'end_time',
			'label' => 'End Time',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'am_pm_end_time',
			'label' => 'Am or Pm',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'am_pm_start_time',
			'label' => 'End Time',
			'rules' => 'trim|required',
		),
	),
	'section' => array(
		array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'head_id',
			'label' => 'Head',
			'rules' => 'trim|required|numeric',
		),
	),
	'subjects' => array(
		array(
			'field' => 'name[]',
			'label' => 'Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'emp_id[]',
			'label' => 'Subjects Teacher',
			'rules' => 'trim|required|numeric',
		),
		array(
			'field' => 'course_id[]',
			'label' => 'Course',
			'rules' => 'trim|required|numeric',
		),
		array(
			'field' => 'credit_hour[]',
			'label' => 'Credit Hour',
			'rules' => 'trim|required|numeric',
		),
		array(
			'field' => 'passing_grade[]',
			'label' => 'Passing Grade',
			'rules' => 'trim|required|numeric',
		),
		array(
			'field' => 'total_grade[]',
			'label' => 'Total Grade',
			'rules' => 'trim|required|numeric',
		),
	),
	'employee' => array(
		array(
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'last_name',
			'label' => 'Last Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'birth_place',
			'label' => 'Birth Place',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'address1',
			'label' => 'Address 1',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'bd_day',
			'label' => 'Birth Day',
			'rules' => 'trim|required',
		), array(
			'field' => 'bd_month',
			'label' => 'Birth Month',
			'rules' => 'trim|required',
		), array(
			'field' => 'bd_year',
			'label' => 'Birth Year',
			'rules' => 'trim|required',
		),
	),
	'student' => array(
		array(
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'last_name',
			'label' => 'Last Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'address1',
			'label' => 'Address 1',
			'rules' => 'trim|required',
		), array(
			'field' => 'birth_place',
			'label' => 'Birth Place',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'city',
			'label' => 'City Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'gender',
			'label' => 'Gender',
			'rules' => 'trim|required',
		), array(
			'field' => 'phone',
			'label' => 'Phone',
			'rules' => 'trim|required',
		), array(
			'field' => 'bd_day',
			'label' => 'Birth Day',
			'rules' => 'trim|required',
		), array(
			'field' => 'bd_month',
			'label' => 'Birth Month',
			'rules' => 'trim|required',
		), array(
			'field' => 'bd_year',
			'label' => 'Birth Year',
			'rules' => 'trim|required',
		),
	),
	'student_persnal_data_update' => array(
		array(
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'last_name',
			'label' => 'Last Name',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'birth_place',
			'label' => 'Birth Place',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'gender',
			'label' => 'Gender',
			'rules' => 'trim|required',
		), array(
			'field' => 'dob',
			'label' => 'Birth Day',
			'rules' => 'trim|required',
		),
	),
	'contact_update' => array(
		array(
			'field' => 'phone',
			'label' => 'Phone Number',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'city',
			'label' => 'City',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'address1',
			'label' => 'Address 1',
			'rules' => 'trim|required',
		),
	),
	'change_course' => array(
		array(
			'field' => 'shift_id',
			'label' => 'Shift',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'student_id',
			'label' => 'Student',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'course_id',
			'label' => 'Course',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'section_id',
			'label' => 'Section',
			'rules' => 'trim|required',
		),
	),
	'change_shift' => array(
		array(
			'field' => 'change_shift_id',
			'label' => 'Shift',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'student_id',
			'label' => 'Student',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'shift_course_id',
			'label' => 'Course',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'shift_section_id',
			'label' => 'Section',
			'rules' => 'trim|required',
		),
	),
	'change_section' => array(
		array(
			'field' => 'change_section_id',
			'label' => 'Section',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'student_id',
			'label' => 'Student',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'sec_course_id',
			'label' => 'Course',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'sec_shift_id',
			'label' => 'Shift',
			'rules' => 'trim|required',
		),
	),
);