<?php
require(__DIR__.'/../../../fpdf/fpdf.php');
require(__DIR__.'/../../../fpdi/fpdi.php');

class PDF_Rotate extends FPDI {

    var $angle = 0;

    function Rotate($angle, $x = -1, $y = -1) {
        if ($x == -1)
            $x = $this->x;
        if ($y == -1)
            $y = $this->y;
        if ($this->angle != 0)
            $this->_out('Q');
        $this->angle = $angle;
        if ($angle != 0) {
            $angle*=M_PI / 180;
            $c = cos($angle);
            $s = sin($angle);
            $cx = $x * $this->k;
            $cy = ($this->h - $y) * $this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm', $c, $s, -$s, $c, $cx, $cy, -$cx, -$cy));
        }
    }

    function _endpage() {
        if ($this->angle != 0) {
            $this->angle = 0;
            $this->_out('Q');
        }
        parent::_endpage();
    }
}

$fileName = basename($_GET['file']);
$file_type = basename($_GET['type']);
$catalog = $file_type == 'wyklady';
$file =  __DIR__ . "../uploadwyklad/".$fileName;
$fullPathToFile = $file;   
  
class PDF extends PDF_Rotate {

    var $_tplIdx;

    function Header() {
        global $fullPathToFile;
        
     
        $this->SetFont('Arial', 'B', 50);
        $this->SetTextColor(254, 96, 255);
        
        if (is_null($this->_tplIdx)) {

            
            $this->numPages = $this->setSourceFile($fullPathToFile);
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx, 0, 0, 200);
		
	
		if(isset($user)){
			$this->RotatedText(50, 150, "CREATED BY SUW", -20);
		}
    }

    function RotatedText($x, $y, $txt, $angle) {
       
        $this->Rotate($angle, $x, $y);
        $this->Text($x, $y, $txt);
        $this->Rotate(0);
    }

}




$pdf = new PDF();

$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

if($pdf->numPages>1) {
    for($i=2;$i<=$pdf->numPages;$i++) {
        //$pdf->endPage();
        $pdf->_tplIdx = $pdf->importPage($i);
        $pdf->AddPage();
    }
}


$pdf->Output("$fileName", 'D'); 
include(__DIR__.'../file-download.php');
?>
