<?php
/*
Purpose: Printable and Formatted Report Card
Creator: Ju Hong Kim
*/
require($_SERVER['DOCUMENT_ROOT'] . '/FPDF/fpdf.php'); //connects to the FPDF library

//HEADER AND FOOTER INFORMATION FROM TEXT FILE
$file = fopen("header.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($file)) {
  $header[] = fgets($file);
}
fclose($file);
print_r ($header);
$title = $header[0];
$school = $header[1];
$street = $header[2];
$location = $header[3];
$postal_code = $header[4];
$message = $header[5];
$footer = $header[6];


class PDF extends FPDF {
  function Header() {
      GLOBAL $title;
      GLOBAL $school;
      GLOBAL $street;
      GLOBAL $location;
      GLOBAL $postal_code;
      $this -> SetFont('Helvetica','B',18); //sets font, font-stlye, and font-size
      $this -> SetY(8); 
      $this -> Cell(0,10, $title,0,0,'C');
      $this -> Ln(10); //line break


      $this -> SetFont('Helvetica','B',12);
      $this -> Cell(0, 10, $school, 0, 0, 'C');
      $this -> Ln(5); //line break

      $this -> Cell(0, 10, $street, 0, 0, 'C');
      $this -> Ln(5); //line break

      $this -> Cell(0, 10, $location, 0, 0, 'C');
      $this -> Ln(5); //line break

      $this -> Cell(0, 10, $postal_code, 0, 0, 'C');
      $this -> Ln(15);

      $this->Image($_SERVER['DOCUMENT_ROOT'] . '/images/WcssLogo.png',10,8,33); //links image and resizes the image size relative to the origianl image size
     }

  function Footer() {
      $this->SetXY(100,-15);
      $this->SetFont('Helvetica','I',10);
      GLOBAL $footer;
      $this->Cell(0,10,$footer,0,0,'C');
      //$this->Write (0, '2014 West Carleton Secondary School', 0, 0 , 'C');
    }


function class_table ($class, $course_code, $progress_level, $teacher, $comment, $comments, $interview) {
    $this -> Line(10, 57, 180, 57);
    $this -> SetFont('Helvetica','B',11.5);
    $this -> Cell(15, 10, "Class: ");
    $this -> SetFont('Helvetica','',11.5);
    $class_text = $class . "  " . $course_code;
    $this -> Cell(15, 10, $class_text);
    $this -> Ln(5.5);

    $this -> SetFont('Helvetica','B',11.5);
    $this -> Cell(22.5, 10,"Progress: ");
    $this -> SetFont('Helvetica','',11.5);
    $this -> Cell(15, 10, $progress_level);
    
    if ($interview == 1) {  
      $this -> SetX (100);
    $this -> SetFont('Helvetica','B',11.5);
      $this -> Cell(40, 10, "Teacher has requested an interview");
    }
    
    $this -> Ln(5.5);

    $this -> SetFont('Helvetica','B',11.5);
    $this -> Cell(20, 10, "Teacher: ");
    $this -> SetFont('Helvetica','',11.5);
    $this -> Cell(10, 10, $teacher);
    $this -> Ln(4.5);


  //echo $comment;
    if ($comment == 1) {
      $this -> SetFont('Helvetica','',11.5);
      foreach ($comments as $item) {
        if (strlen($item['comment']) < 90) {  
          if (!empty($item['comment'])) { 
            $this -> Cell(20, 10, "-" . $item['comment']);
            $this -> Ln(5);
          }
        }
        else { 
          $this -> ln(2);
          $this -> MultiCell(160, 4, "-" . $item['comment']);
        }
      }
      $y = $this -> GetY(); //gets the current Y position
       $line = $y + 3.5; //allows the line to be set to 3.5 units away from the current Y position
      }  
    else { 
    $y = $this -> GetY(); //gets the current Y position
      $line = $y + 3; //allows the line to be set to 3 units away from the current Y position
    }
    $this -> Ln(1.5);
    $this -> SetLineWidth(0.5);
    $this -> Line(10, $line, 180, $line);
   }
}

$pdf=new PDF(); //STARTS PDF FILE

$student_pdf_count = 0; //indicates the number of student progress report card created
  $class_id = $_POST['class_id'];
  include ($_SERVER['DOCUMENT_ROOT'] . "/php/class_student_list.php");
  $student_count = $count_affected;
    for ($student_pdf_count = 0; $student_pdf_count < $student_count; $student_pdf_count++) { 

    $stud_id = $students[$student_pdf_count]; //STUDENT ID
    include ($_SERVER['DOCUMENT_ROOT'] . "/php/student_report_cards.php"); //GATHERS ALL THE STUDENT'S CLASS ID
    
        $pdf->AddPage(); //CREATES A NEW PAGE

        /*Student Picture***********************************************************/
        $sql = "SELECT stud_num FROM student_info WHERE student_id = $stud_id";
      	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php");  
      	$picture = $results -> fetch(PDO::FETCH_ASSOC);
      	$picture['stud_num'] .= ".jpg";
      	$picture_location = "/images/studentPics/" . $picture['stud_num'];  
      	if (file_exists($_SERVER['DOCUMENT_ROOT'] . $picture_location) != 0) {
        	$pdf->Image($_SERVER['DOCUMENT_ROOT'] . $picture_location,145,8,33);
      	}
      	else { 
        	$pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/images/studentPics/Blank.jpg',145,8,33);
      	}
      	/***************************************************************************/

        //PDF INFORMATION
        $pdf->SetTitle("Progress Report Card");
        $pdf->SetAuthor('Ju Hong Kim');

        $sql = "SELECT first, last FROM students WHERE student_id = $stud_id";//Student Information
        include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php");   
        $name_info = $results -> fetch(PDO::FETCH_ASSOC);
        $name = $name_info['last'] . ", " . $name_info['first'];

        $pdf -> SetFont('Helvetica','B',12);
        $pdf -> Cell(15, 10, 'NAME:', 0, 0);
        $pdf -> SetFont('Helvetica', '', 12);
        $pdf -> Cell(40, 10, $name, 0, 0);

        $pdf -> Ln(7);
        $line = 75;
        for ($loop = 0; $loop < $class_counter; $loop++) { 
          $class_id = $classes[$loop];
          include ($_SERVER['DOCUMENT_ROOT'] . "/php/pdf/student_report_info.php"); //GATHERS ALL THE STUDENT PROGRESS REPORT CARD INFORMATION

          include $_SERVER['DOCUMENT_ROOT'] . "/php/pdf/test.php";

          $comment = 1; 
    
          if (empty($comments)) {
              $comments = array('comment' => 0);
              $comment = 0; //indicates that there are no comments
          }
          $pdf -> class_table($info['course_name'], $info['course_code'], $info['level'], $teacher, $comment, $comments, $info['interview_request']);  
          $comments = null;
        }

        $pdf -> Ln(3.5);
        $pdf -> SetFont('Helvetica','B',11.5);

        $pdf -> MultiCell(150, 5, $message);
        $pdf -> Ln(3);
        $y = $pdf -> GetY();
        $line = $y;
        $pdf -> Line(10, $line, 180, $line);
        $comments = null;
        $stud_id = null;
}

  $pdf->Output();
  //$pdf->Output('example2.pdf','D');

?>  