<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once APPPATH . '/third_party/mpdf/mpdf.php';
class M_pdf {

	public $param;
	public $pdf;
	// '"en-GB-x","A4","","",10,10,10,10,6,3'
	public function __construct($param = "A4") {
		$this->param = $param;
		$this->pdf = new mPDF($this->param);
	}
	function mergePDFFiles(Array $filenames, $outFile) {
		if ($filenames) {

			$filesTotal = sizeof($filenames);
			$fileNumber = 1;

			$this->SetImportUse();

			if (!file_exists($outFile)) {
				$handle = fopen($outFile, 'w');
				fclose($handle);
			}

			foreach ($filenames as $fileName) {
				if (file_exists($fileName)) {
					$pagesInFile = $this->SetSourceFile($fileName);
					for ($i = 1; $i <= $pagesInFile; $i++) {
						$tplId = $this->ImportPage($i);
						$this->UseTemplate($tplId);
						if (($fileNumber < $filesTotal) || ($i != $pagesInFile)) {
							$this->WriteHTML('<pagebreak />');
						}
					}
				}
				$fileNumber++;
			}

			$this->Output($outFile);

		}

	}
}

/* End of file mpdf.php */
/* Location: ./application/libraries/mpdf.php */
