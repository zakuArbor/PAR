<?php
/*
Purpose: Printable and Formatted Report Card
Creator: Ju Hong Kim
*/
require($_SERVER['DOCUMENT_ROOT'] . '/PAL/FPDF/fpdf.php'); //connects to the FPDF library

class PDF extends FPDF {
  function Header() {
      
      $this -> SetFont('Helvetica','B',18); //sets font, font-stlye, and font-size
      $this -> SetY(8); 
      $this -> Cell(0,10,'Progress Report Card',0,0,'C');
      $this -> Ln(10); //line break


      $this -> SetFont('Helvetica','B',12);
      $this -> Cell(0, 10, 'West Carleton Secondary School', 0, 0, 'C');
      $this -> Ln(5); //line break

      $this -> Cell(0, 10, '3088 Dunrobin Road', 0, 0, 'C');
      $this -> Ln(5); //line break

      $this -> Cell(0, 10, 'Dunrobin, Ontario, Canada', 0, 0, 'C');
      $this -> Ln(5); //line break

      $this -> Cell(0, 10, 'K0A 1T0', 0, 0, 'C');
      $this -> Ln(15);

      $this->Image($_SERVER['DOCUMENT_ROOT'] . '/PAL/images/WcssLogo.png',10,8,33); //links image and resizes the image size relative to the origianl image size
     }

  function Footer() {
      $this->SetXY(100,-15);
      $this->SetFont('Helvetica','I',10);
      $this->Cell(0,10,'2014 West Carleton Secondary School',0,0,'C');
      //$this->Write (0, '2014 West Carleton Secondary School', 0, 0 , 'C');
    }


function class_table ($class, $course_code, $progress_level, $teacher, $line) {
    $this -> Line(10, 60, 170, 60);
    $this -> SetFont('Helvetica','B',12);
    $this -> Cell(15, 10, "Class: ");
    $this -> SetFont('Helvetica','',12);
    $this -> Cell(15, 10, $class);
    $this -> Cell(5, 10, $course_code);
    $this -> Ln(7.5);

    $this -> SetFont('Helvetica','B',12);
    $this -> Cell(22.5, 10,"Progress: ");
    $this -> SetFont('Helvetica','',12);
    $this -> Cell(15, 10, $progress_level);
    $this -> Ln(7.5);

    $this -> SetFont('Helvetica','B',12);
    $this -> Cell(20, 10, "Teacher: ");
    $this -> SetFont('Helvetica','',12);
    $this -> Cell(10, 10, $teacher);
    $this -> Ln(7.5);
    $this -> SetLineWidth(0.5);
    $this -> Line(10, $line, 170, $line);
  } 
}

$pdf=new PDF();

$counter = 0;
$student_num = 1;

while ($counter != $student_num) { 
  $sql = "SELECT first, last ";

  $pdf->AddPage();
  $pdf->SetTitle("Progress Report Card");
  $pdf->SetAuthor('Ju Hong Kim');
  $pdf -> SetFont('Helvetica','B',12);
  $pdf -> Cell(40, 10, "Justin Train", 0, 1);
  $line = 82;
  echo "<br>";
  print_r($item);
  for ($i = 0; $i < 4; $i++) {

    $pdf -> class_table("", "Course_Code", "Progress", "Teacher", $line);
    $line += 22;
  }
}

$pdf->Output();
//$pdf->Output('example2.pdf','D');
?>  