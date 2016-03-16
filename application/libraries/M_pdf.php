<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once APPPATH.'/third_party/mpdf/mpdf.php';
class M_pdf
{
 
    public $param;
    public $pdf;
	 // '"en-GB-x","A4","","",10,10,10,10,6,3'
    public function __construct($param = "A4")
    {
        $this->param =$param;
        $this->pdf = new mPDF($this->param);
    }
}

/* End of file mpdf.php */
/* Location: ./application/libraries/mpdf.php */
