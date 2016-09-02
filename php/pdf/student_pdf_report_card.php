<?php
/*
Purpose: Printable and Formatted Report Card
Creator: Ju Hong Kim
*/
require($_SERVER['DOCUMENT_ROOT'] . '/FPDF/fpdf.php'); //connects to the FPDF library
#include ($_SERVER['DOCUMENT_ROOT'] . "/php/progress_functions.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/php/prepare_sql.php");

//HEADER INFORMATION FROM DATABASE
$sql = "SELECT content FROM header";
$header = array_prepare_select ($sql, $pdo, []);
$title = $header[0]['content'];
$school = $header[1]['content'];
$street = $header[2]['content'];
$location = $header[3]['content'];
$postal_code = $header[4]['content'];

//FOOTER INFORMATION FROM DATABASE
$sql = "SELECT * FROM footer";
$footer = array_prepare_select ($sql, $pdo, []);
$message = $footer[0]['content'];
$footer = $footer[1]['content'];
$student_id = $_GET['stud_id']; //STUDENT ID

class PDF extends FPDF {
  function Header() {
      GLOBAL $title;
      GLOBAL $school;
      GLOBAL $street;
      GLOBAL $location;
      GLOBAL $postal_code;
      GLOBAL $student_id;
      GLOBAL $pdo;
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

      $sql = "SELECT OEN FROM student_info WHERE student_id = :stud_id";
      $picture = single_return_prepare_select ($sql, $pdo, [':stud_id' => $student_id]);
      $picture['OEN'] .= ".jpg";
      $picture_location = "/images/studentPics/" . $picture['OEN'];  
      if (file_exists($_SERVER['DOCUMENT_ROOT'] . $picture_location) != 0) {
        $this->Image($_SERVER['DOCUMENT_ROOT'] . $picture_location,145,8,33);
      }
      else { 
        $this->Image($_SERVER['DOCUMENT_ROOT'] . '/images/studentPics/Blank.jpg',145,8,33);
      }
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

$pdf_class_counter = 0; //indicates the number of class set of pdf pages created


  include ($_SERVER['DOCUMENT_ROOT'] . "/php/student_report_cards.php"); //GATHERS ALL THE STUDENT'S CLASS ID
      
      $pdf->AddPage(); //CREATES A NEW PAGE

      //PDF INFORMATION
      $pdf->SetTitle("Progress Report Card");
      $pdf->SetAuthor('Ju Hong Kim');

      #retrieve student name##########################################################
      $sql = "SELECT first_name, last_name FROM students
              WHERE student_id = :student_id";
      $student = null;
      $student = single_return_prepare_select ($sql, $pdo, ['student_id' => $student_id]);
      ################################################################################
      $name = $student['last_name'] . ", " . $student['first_name'];

        $pdf -> SetFont('Helvetica','B',12);
        $pdf -> Cell(15, 10, 'NAME:', 0, 0);
        $pdf -> SetFont('Helvetica', '', 12);
        $pdf -> Cell(40, 10, $name, 0, 0);

        $pdf -> Ln(7);
        $line = 75;
        for ($loop = 0; $loop < $class_counter; $loop++) { 
          $class_id = $classes[$loop]['class_id'];
          #include ($_SERVER['DOCUMENT_ROOT'] . "/php/pdf/student_report_info.php"); //GATHERS ALL THE STUDENT PROGRESS REPORT CARD INFORMATION

          $sql = "SELECT courses.course_code, courses.course_title, progress_level.level, progress_report.interview_request, progress_report.progress_id 
                  FROM student_progress
                  INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id
                  INNER JOIN class ON class.class_id = student_progress.class_id 
                  INNER JOIN courses ON courses.course_id = class.course_id
                  INNER JOIN progress_level ON progress_level.level_id = progress_report.level_id
                  WHERE class.class_id = :class_id
                  AND student_progress.student_id = :student_id";
          $info = single_return_prepare_select ($sql, $pdo, ['class_id' => $class_id, 'student_id' => $student_id]);
          #print_r($info);

          $sql = "SELECT staff_first, staff_last FROM staff 
                  INNER JOIN class ON class.staff_id = staff.staff_id
                  WHERE class.class_id = :class_id";
         $teach_info = single_return_prepare_select ($sql, $pdo, ['class_id' => $class_id]);

          $sql = "SELECT comment FROM comment_list
                  INNER JOIN progress_comment ON progress_comment.comment_id = comment_list.comment_id
                  WHERE progress_comment.progress_id = :progress_id";
          $comments = array_prepare_select ($sql, $pdo, ['progress_id' => $info['progress_id']]);

          $teacher = $teach_info['staff_last'] . ", " . $teach_info['staff_first']; //teacher name

          $comment = 1; 
    
          if (empty($comments)) {
              $comments = array('comment' => 0);
              $comment = 0; //indicates that there are no comments
          }
          $pdf -> class_table($info['course_title'], $info['course_code'], $info['level'], $teacher, $comment, $comments, $info['interview_request']);  
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


  $pdf->Output();
  //$pdf->Output('example2.pdf','D');

?>  