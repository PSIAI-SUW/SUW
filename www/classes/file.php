<?php
require_once './vendor/autoload.php';

class File
{

    private $_db;
    public $name;
    public $url = 'uploads/';

    function __construct($db)
    {
        $this->_db = $db;
    }

    public function getFileName($name)
    {
        $stmt = $this->_db->prepare($name);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function insertDeleteFile($name)
    {
        $stmt = $this->_db->prepare($name);
        $result = $stmt->execute();
        return $result;
    }

    public function downloadFile($name)
    {
      $file = $this->url;
      $file .= $name;
      echo $file;
      if(!is_file($file)) { die("<b>404 File not found!</b>"); }

        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");

        header("Content-Type: application/pdf");
        @readfile($file);//funkcja ktora czyta plik i  go wypisuje
        exit;
    }

    public function addWatermark($name)
    {
      class_exists('TCPDF', true);

      $pdf = new FPDF();
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',16);
      $pdf->Cell(40,10,'Hello World!');
      $pdf->Output();
    }

}

?>
