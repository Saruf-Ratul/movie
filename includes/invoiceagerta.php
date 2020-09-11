<?php

include_once("../fpdf/fpdf.php");
//$conn =mysqli_connect("localhost", "root", "", "dearlife_inventory");
 $conn =mysqli_connect("localhost", "root", "", "dearlife_inventory");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }

$img = "../fpdf/logo.PNG";


if ($_GET["order_date"]){

	$pdf = new FPDF();
//	$pdf->AddPage();
//	$pdf =& new FPDI();
      $pdf->addPage('L');
    	$pdf->SetFont("Arial","B",19);
     $pdf->Cell(25,20, $pdf->Image($img, $pdf->GetX(10), $pdf->GetY(15), 40.8), 0, 0, 'R', false );
      $pdf->Cell(60,10,"",0,1);
     	$pdf->Cell(260,10,"INVOICE",0,1,"C"); 
 // $pdf->Cell(190,10,"INVOICE",0,1,"C"); 
     $pdf->Cell(40,2,"",0,1);
     $pdf->Cell(260,10,"  Dear Life BD Tours & Travel Ltd. ",0,1,"C"); 
 
       $pdf->Cell(20,12,"",0,1);
   $pdf->SetFont("Arial","B",12);
   
   $pdf->Cell(10,10,"To,",0,0,"L");
   
    for ($i=0; $i < count($_GET["pid"]); $i++){
   
   $pdf->Cell(-30,10,"\n".$_GET["coustomer_name"][$i],0,1,"L");
    // $pdf->Cell(-40,10, $_GET["coustomer_name"][$i],1,0,"C");
    $pdf->Cell(40,10,"Address :",0,0,"L");
    $pdf->Cell(10,10," ".$_GET["c_name"],0,1,"C");
    
    }
    $pdf->Cell(40,10,"Issue Date              :",0,0,"C");
    $pdf->Cell(-40,10,"  ".$_GET["order_date"],0,1,"L");
    $query="SELECT * FROM `invoice` WHERE 1";


 $res=mysqli_query($conn, $query);
 // $data= mysqli_fetch_field($res);
  //$data=mysqli_fetch_array($res);
while($row = $res->fetch_assoc()){
  //print_r($row);

$invoice_noo =$row ["invoice_no"];
     
 }
   

    $pdf->Cell(59,10,"Invoice No              :   Dearlife ",0,0,"C");
    $pdf->Cell(-39,10," $invoice_noo  " ,0,1,"L");
    $pdf->SetFont("Arial","B",12);
     
   
  
   
    $pdf->Cell(35,7,"",0,1);
 // $pdf->Cell(190,10, "href="./images/ddd.PNG"",0,1,"C");
 




    $pdf->SetFont("Arial","B",12);
   
  //  $pdf->Cell(200,15,"Issue date ",0,1,"C");
   // $pdf->Cell(200,15,": ".$_GET["order_date"],0,1,"C");
   // $pdf->Cell(40,10,"Customer Email",0,0);
    // $pdf->Cell(40,10," : ".$_GET["coun_name"],0,1);
   // $pdf->Cell(40,10,": ".$_GET["invoice_no"],0,1);
   
 //  $pdf->Cell(40,10," : ".$_GET["country"],0,1);
  // $pdf->Cell(40,10,"vendor",0,0);
//  $pdf->Cell(40,10," : ".$_GET["fly_date"],0,0);

    $pdf->Cell(12,10,"SL",1,0,"C"); 
   
   $pdf->Cell(35,10,"Description",1,0,"C");
   //$pdf->Cell(55,10,"Customer Name",1,0,"C");
    $pdf->Cell(55,10,'Customer Name',1,0,'C',0);
   
    $pdf->Cell(55,10,"Destination Point",1,0,"C");
    $pdf->Cell(35,10,"Air Lines",1,0,"C");
 // $pdf->Cell(33,10,"Ticket No",1,0,"C");
     $pdf->Cell(28,10,"Travel Date",1,0,"C");
      $pdf->Cell(15,10,"Unit",1,0,"C");
   $pdf->Cell(40,10,"Air Fare BDT",1,1,"C");


//for ($i=0; $i < count($_GET["invoice_no"]); $i++){}

   for ($i=0; $i < count($_GET["pid"]); $i++){
     $pdf->Cell(12,10, ($i+1),1,0,"C");
     $pdf->SetFont("Arial","B",8);
     $pdf->Cell(35,10, $_GET["pro_name"][$i],1,0,"C");
     $pdf->Cell(55,10, $_GET["coustomer_name"][$i],1,0,"C");
     $pdf->Cell(55,10, $_GET["country"][$i],1,0,"C");
    // $pdf->Ln( );
     $pdf->Cell(35,10, $_GET["air"][$i],1,0,"C");
 //  $pdf->Cell(33,10, $_GET["t_no"][$i],1,0,"C");
     $pdf->Cell(28,10, $_GET["fly_d"][$i],1,0,"C");
     $pdf->Cell(15,10, $_GET["qty"][$i],1,0,"C");
      $pdf->Cell(40,10, $_GET["net_total"],1,1,"C");
     //$pdf->Cell(40,10, ($_GET["qty"][$i] * .$_GET["net_total"][$i]),1,1,"C");
     
   }
//$fpdf->LN;
$pdf->Cell(235,8,"Total Amount",1,0,"R");
   $pdf->Cell(40,8,"".$_GET["net_total"],1,1,"C");

    $pdf->Cell(50,10,"",0,1);
 $pdf->SetFont("Arial","B",12);
   // $pdf->Cell(150,10,"Sub Total    ",0,0,"R");
   // $pdf->Cell(140,10,":        ".$_GET["sub_total"],0,1);
    //  $pdf->Cell(150,10,"Gst Tax    ",0,0,"R");
 //  $pdf->Cell(50,10,":        ".$_GET["gst"],0,1);
 // $pdf->Cell(150,10,"Discount    ",0,0,"R");
   // $pdf->Cell(50,10,":        ".$_GET["discount"],0,1);
   $pdf->Cell(240,10,"Total Amount    ",0,0,"R");
    $pdf->Cell(50,10,":        ".$_GET["net_total"],0,1);
         $pdf->Cell(40,10,"",0,1);
      
       
       $pdf->Cell(200,8,"Bank                  United Commercial Bank Ltd",0,1,"R");
       $pdf->Cell(200,8,"A/CName      Dear Life BD Tours & Travel Ltd",0,1,"R");
       $pdf->Cell(200,8,"A/C No                             0952 101 0000 12460",0,1,"R");
  $pdf->Output();
}
    
 ?>
