<?php
require($_SERVER['DOCUMENT_ROOT'] . '/PAL/FPDF/fpdf.php');

class PDF extends FPDF
{
  function Header()
    {
      
      $this -> SetFont('Helvetica','B',20);
      $this -> SetY(10);
      $this -> Cell(0,10,'Progress Report Card',0,1,'C');
      $this -> SetFont('Helvetica','B',12);
      $this -> Cell(0, 10, 'Name', 0, 0, 'C');
      $this->Image($_SERVER['DOCUMENT_ROOT'] . '/PAL/WcssLogo.png',10,8,33);
     }

  function Footer()
    {
      $this->SetXY(100,-15);
      $this->SetFont('Helvetica','I',10);
      $this->Cell(0,10,'2014 West Carleton Secondary School',0,0,'C');
      //$this->Write (0, '2014 West Carleton Secondary School', 0, 0 , 'C');
    }
}

$pdf=new PDF();
$pdf->AddPage();

$pdf->Output();
//$pdf->Output('example2.pdf','D');
?>