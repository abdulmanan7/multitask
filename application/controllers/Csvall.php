<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

@ini_set('max_execution_time', 0);
define('MAX_LINE_SIZE', 4096);
@ini_set('auto_detect_line_endings', '1');

class Csvall extends MY_Controller {

	private $module;
	public static $column_mask;
	private $action_arr = array();
	public $entities = array();
	public static $required_payment_fields = array();

	function __construct() {
		parent::__construct();
		$this->load->library('csvimport');
		$this->load->model("MCustomer");
		$this->load->model("MPayment");
		$this->available_payment_fields = array(
			"account_no" => 'Account No',
			"BillReferenceNumber" => 'Bill Reference Number',
			"TransactionID" => 'Transaction ID',
			"SourceBank" => 'Source Bank',
			"TransactionDate" => 'Transaction Date',
			"amount_paid" => 'Amount (N)',
			"AmountDue" => 'Amount Due',
			"BuildingType" => 'Building Type',
			"CustomerName" => 'Customer Name',
			"District" => 'District',
			"Email" => 'Email',
			"OutstandingBalance" => 'Outstanding Balance',
			"Phone" => 'Phone',
			"ServiceAddress" => 'Service Address',
			"UsageType" => 'Usage Type',
			"payment_status" => 'Status');

		self::$required_payment_fields = array('BillReferenceNumber', 'TransactionID');
		if (!ini_get('date.timezone')) {
			date_default_timezone_set('Africa/Lagos');
		}

	}

	function index() {
		$data = array();
		$data = $this->global_array();
		$data['page_title'] = 'CSVAll Upload';

		$data['addressbook'] = '';
		if ($this->session->userdata('sessadmin_details')) {
			$page = "csvall";
			$data['main_content'] = $this->module . '/' . $page;
			$this->load->view('admin/page', $data);
		} else {
			redirect('admin/', 'refresh');
		}
	}

	function global_array() {
		$data = array(
			'module_name' => 'Admin',
			'module_url' => 'admin',
			'IsProcess' => 'N',
			'sidebar' => 'Payment',
		);
		return $data;
	}

	function csvupload() {
		$data['error'] = ''; //initialize image upload error array to empty
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'text/plain|text/anytext|csv|text/x-comma-separated-values|text/comma-separated-values|application/octet-stream|application/vnd.ms-excel|application/x-csv|text/x-csv|text/csv|application/csv|application/excel|application/vnd.msexcel';
		//$config['max_size'] = '1000';

		$this->load->library('upload', $config);

		$dynamic_array = array();

		// If upload failed, display error
		if (!$this->upload->do_upload()) {
			//echo 'What is happening here??';

			$data['error'] = $this->upload->display_errors();
			$this->load->view('admin/csvindex', $data);
		} else {
			$file_data = $this->upload->data();
			$file_path = './uploads/' . $file_data['file_name'];

			if ($this->csvimport->get_array($file_path)) {
				$csv_array = $this->csvimport->get_array($file_path);

				$newfile = $file_path;
				@chmod("$newfile", 0777);
				$array_info = array();
				$handle = $this->openCsvFile($newfile);

				for ($current_line = 0; ($line = fgetcsv($handle, MAX_LINE_SIZE, ',')) !== FALSE; $current_line++) {
					$paymentinfo = array();
					$billinfo = array();
					if ($current_line == 0) {
						foreach ($line As $key => $value) {
							if (in_array(trim($value), $this->available_payment_fields)) {
								$dynamic_array[$key] = array_search(trim($value), $this->available_payment_fields);
							}
						}

						$this->receiveTab($dynamic_array);
					} else {
						$info = self::getMaskedRow($line);
						if (array_filter($info)) {
							foreach ($info As $key => $val) {
								if (in_array($key, array_keys($this->available_payment_fields))) {
									if ($key == 'date_added') {
										$date_value = date("Y-m-d h:i", strtotime($val));
										$paymentinfo[$key] = $date_value;
									} else {
										if ('Phone' == $key) {
											$phone = $val;
										} elseif ('TransactionDate' == $key) {
											$TransactionDate = date("d M,Y h:i", strtotime($val));
										} elseif ('amount_paid' == $key) {
											$amount_paid = $val;
										}
										$paymentinfo[$key] = $val;
									}
								}
							}
							/*
							if(!empty($phone))
							{
							$smsurl="http://www.smslive247.com/http/index.aspx?cmd=sendquickmsg&owneremail=ayoroy@klugandheimer.com&subacct=SUB1&subacctpwd=royz1234&message=".rawurlencode(sprintf(SMS_PAYMENT_NOTIFICATION,$amount_paid.' '.CURRENCY_FORMAT,$TransactionDate.' '))."&sender=".SENDER."&sendto=".$phone."&msgtype=0";
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
							curl_setopt($ch, CURLOPT_HEADER, false);
							curl_setopt($ch, CURLOPT_URL, $smsurl);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							$result = curl_exec($ch);
							curl_close($ch);
							}*/
							$payment_id = $this->savepaymentinfo($paymentinfo);
						}
					}
				}

				$this->closeCsvFile($handle);
				@unlink($newfile);

				$this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
				redirect(base_url() . 'admin/csvall');
				//echo 'am getting somewhere!';
				//echo "<pre>"; print_r($insert_data);
			} else {
				$data['error'] = "Error occured";
			}

			$this->load->view('admin/csvindex', $data);
			//echo 'which kind wahala be this na!';
		}
	}

	private function savepaymentinfo(&$info) {
		if ($this->MPayment->existsInDatabase($info['TransactionID'])) {
			return $this->MPayment->update($info, "TransactionID='" . $info['TransactionID'] . "'");
		} else {
			return $this->MPayment->addNew($info);

		}
		//return	$this->MPayment->getIdByAccountNo($info['account_no']);
	}

	private function receiveTab(&$header) {
		foreach ($header AS $nb => $type) {
			if ($type != 'no') {
				self::$column_mask[$type] = $nb;
			}
		}

	}

	public static function getMaskedRow($row) {
		$res = array();
		foreach (self::$column_mask AS $type => $nb) {
			$res[$type] = isset($row[$nb]) ? trim($row[$nb]) : null;
		}

		return $res;
	}

	public static function fgetcsv($handle, $lenght, $delimiter) {
		if (feof($handle)) {
			return false;
		}

		$line = fgets($handle, $lenght);
		if ($line === false) {
			return false;
		}

		$tmpTab = explode($delimiter, $line);

		foreach ($tmpTab AS &$row) {
			if (preg_match('/^".*"$/Uims', $row)) {
				$row = trim($row, '"');
			}
		}

		return $tmpTab;
	}

	private static function setDefaultValues(&$info) {
		foreach (self::$default_values AS $k => $v) {
			if (!isset($info[$k]) OR $info[$k] == '') {
				$info[$k] = $v;
			}
		}

	}

	private function openCsvFile($newfile) {
		$handle = fopen($newfile, 'r');

		/* No BOM allowed */
		$bom = fread($handle, 3);
		if ($bom != '\xEF\xBB\xBF') {
			rewind($handle);
		}

		if (!$handle) {
			die('Cannot read the csv file');
		}

		for ($i = 0; $i < intval($this->input->post('skip')); ++$i) {
			$line = self::fgetcsv($handle, MAX_LINE_SIZE, $this->input->post('separator', ';'));
		}

		return $handle;
	}

	private function closeCsvFile($handle) {
		fclose($handle);
	}

	function csv_to_array($filename = '', $delimiter = ',') {
		if (!file_exists($filename) || !is_readable($filename)) {
			return FALSE;
		}

		$header = NULL;
		$data = array();
		if (($handle = fopen($filename, 'r')) !== FALSE) {
			while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
				if (!$header) {
					$header = $row;
				} else {
					$data[] = array_combine($header, $row);
				}

			}
			fclose($handle);
		}
		return $data;
	}

}
/*END OF FILE*/
