<?php
  require('../fpdf/fpdf.php');
  // Database Connection 
  require('../html/db_conn.php');
  // Select data from MySQL database
  $getData = "SELECT Username, AvgTime, Localidade
              FROM records
              ORDER BY AvgTime";
  $result = $conn->query($getData);
  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',14);
  $count = 1;

  $pdf->Cell(25,10,'Ranking',1);
  $pdf->Cell(40,10,'Username',1);
  $pdf->Cell(40,10,'Avg Time',1);
  $pdf->Cell(80,10,'Localidade',1);
  $pdf->Ln();
  while($row = $result->fetch_object()){
    $Username = $row->Username;
    $AvgTime = $row->AvgTime;
    $Localidade = $row->Localidade;
    $pdf->Cell(25,10,$count,1);
    $pdf->Cell(40,10,$Username,1);
    $pdf->Cell(40,10,$AvgTime.'ms',1);
    $pdf->Cell(80,10,$Localidade,1);
    $pdf->Ln();
    $count += 1;
  }
  $pdf->Output();
?>