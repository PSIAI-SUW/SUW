<?php
require_once './vendor/autoload.php';

class File
{

    private $_db;
    public $name;
    public $url;

    function __construct($db)
    {
        $this->_db = $db;
        $url = 'uploads/';
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
        if(file_exists($url.$_GET[$name]))
        {
          $id = $_GET[$name];
          header("Content-length: ".filesize($id));
          header("Content-type: ".mime_content_type($id));
          header("Content-Disposition: attachment; filename=$id");
          readfile($id);
          exit();
        }
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
