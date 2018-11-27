<?php
require_once './vendor/autoload.php';

class File
{

    private $_db;
    public $path = 'uploads/';

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

    public function downloadFile($name, $user)
    {
        if(substr($name, 0, 1) == '.')
        {
          $name = substr($name, 1);
        }

        $file = $this->path.$name.".pdf";

        if(!is_file($file)) { die("<b>404 File not found!</b>"); }

        try
        {
            $this->addWatermark($file, $user);
        }
        catch(Exception $e)
        {
            echo $e;
            /*$pdfWithWatermark = $file;
            header("Content-Type: application/pdf");
            @readfile($pdfWithWatermark); //funkcja ktora czyta plik i go wypisuje
            exit;
            */
        }
    }

    public function addWatermark($file, $user)
    {
        class_exists('TCPDF', true);
        class_exists('TCPDI', true);

        $date = date('Y-m-d H:i:s');

        echo $file." ".$user." ".$date."\n";

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Hello World!');
        $pdf->Output();

    }
}
?>
