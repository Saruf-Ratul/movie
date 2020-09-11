<?php
include_once("../fpdf/fpdf.php");
class PDF extends FPDF
{
function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
{
    $k=$this->k;
    if($this->y+$h>$this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak())
    {
        $x=$this->x;
        $ws=$this->ws;
        if($ws>0)
        {
            $this->ws=0;
            $this->_out('0 Tw');
        }
        $this->AddPage($this->CurOrientation);
        $this->x=$x;
        if($ws>0)
        {
            $this->ws=$ws;
            $this->_out(sprintf('%.3F Tw',$ws*$k));
        }
    }
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $s='';
    if($fill || $border==1)
    {
        if($fill)
            $op=($border==1) ? 'B' : 'f';
        else
            $op='S';
        $s=sprintf('%.2F %.2F %.2F %.2F re %s ',$this->x*$k,($this->h-$this->y)*$k,$w*$k,-$h*$k,$op);
    }
    if(is_string($border))
    {
        $x=$this->x;
        $y=$this->y;
        if(is_int(strpos($border,'L')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,$x*$k,($this->h-($y+$h))*$k);
        if(is_int(strpos($border,'T')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-$y)*$k);
        if(is_int(strpos($border,'R')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',($x+$w)*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
        if(is_int(strpos($border,'B')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-($y+$h))*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
    }
    if($txt!='')
    {
        if($align=='R')
            $dx=$w-$this->cMargin-$this->GetStringWidth($txt);
        elseif($align=='C')
            $dx=($w-$this->GetStringWidth($txt))/2;
        elseif($align=='FJ')
        {
            //Set word spacing
            $wmax=($w-2*$this->cMargin);
            $this->ws=($wmax-$this->GetStringWidth($txt))/substr_count($txt,' ');
            $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
            $dx=$this->cMargin;
        }
        else
            $dx=$this->cMargin;
        $txt=str_replace(')','\\)',str_replace('(','\\(',str_replace('\\','\\\\',$txt)));
        if($this->ColorFlag)
            $s.='q '.$this->TextColor.' ';
        $s.=sprintf('BT %.2F %.2F Td (%s) Tj ET',($this->x+$dx)*$k,($this->h-($this->y+.5*$h+.3*$this->FontSize))*$k,$txt);
        if($this->underline)
            $s.=' '.$this->_dounderline($this->x+$dx,$this->y+.5*$h+.3*$this->FontSize,$txt);
        if($this->ColorFlag)
            $s.=' Q';
        if($link)
        {
            if($align=='FJ')
                $wlink=$wmax;
            else
                $wlink=$this->GetStringWidth($txt);
            $this->Link($this->x+$dx,$this->y+.5*$h-.5*$this->FontSize,$wlink,$this->FontSize,$link);
        }
    }
    if($s)
        $this->_out($s);
    if($align=='FJ')
    {
        //Remove word spacing
        $this->_out('0 Tw');
        $this->ws=0;
    }
    $this->lasth=$h;
    if($ln>0)
    {
        $this->y+=$h;
        if($ln==1)
            $this->x=$this->lMargin;
    }
    else
        $this->x+=$w;
}
}
 $conn =mysqli_connect("localhost", "dearlife_user", "123456@#", "dearlife_inventory");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }

$img = "../fpdf/logo.PNG";


if ($_GET["order_date"]){
//	case "add":
function GenerateWord()
{
    //Get a random word
    $nb=rand(3,10);
    $w='';
    for($i=1;$i<=$nb;$i++)
        $w.=chr(rand(ord('a'),ord('z')));
    return $w;
}

function GenerateSentence()
{
    //Get a random sentence
    $nb=rand(1,10);
    $s='';
    for($i=1;$i<=$nb;$i++)
        $s.=GenerateWord().' ';
    return substr($s,0,-1);
}

$pdf=new FPDF( 'p', 'mm', 'A4');
$pdf->AddPage(A);
$pdf->SetFont('Arial','',14);
//Table with 20 rows and 4 columns
//$pdf->SetWidths(array(30,50,30,40));
srand(microtime()*1000000);
for($i=0;$i<20;$i++)
    $pdf->array;
	//	$pdf = new FPDF();
//	$pdf->AddPage();
//	$pdf =& new FPDI();
    //  $pdf->addPage('L');
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
   
   $pdf->Cell(-30,10,"".$_GET["coustomer name"][$i],"FJ",1,"L");
    // $pdf->Cell(-40,10, $_GET["coustomer_name"][$i],1,0,"C");
    
    
    }
   // $pdf->Cell(40,10,"Issue Date              :",0,0,"C");
   // $pdf->Cell(-40,10,"  ".$_GET["order_date"],0,1,"L");
    $query="SELECT * FROM `invoice` WHERE 1";


 $res=mysqli_query($conn, $query);
 // $data= mysqli_fetch_field($res);
  //$data=mysqli_fetch_array($res);
while($row = $res->fetch_assoc()){
  //print_r($row);

$invoice_noo =$row ["invoice_no"];
     //echo "<td>$sumvendor_pa[$row]</td>";
    
// echo $invoice_no;
    // $sumvendor_p =$row ["year(invoice.order_date)"];
     // echo $sumvendor_pa ; 
    //     $sumvendor_paid =$row ["product_name"];
    //     echo "\n", $sumvendor_paid . "\n"  . "<br/>" . "<br/>"; 
    //     $sumvendor_pai =$row ["sum(invoice_details.price) - sum(invoice_details.vendor_paid)"];
    //     echo $sumvendor_pai . "\n"  . "<br/>" . "<br/>";
 }
    // $pdf->Cell(40,10,"Invoice No              :",0,0,"C");
    // $pdf->Cell(-40,10," $invoice_noo ",0,1,"L");
    
    
    
   

    $pdf->Cell(59,10,"Invoice No              :   Dearlife ",0,0,"C");
    $pdf->Cell(-39,10," $invoice_noo  " ,0,1,"L");
    $pdf->SetFont("Arial","B",12);
     
   // $pdf->Cell(40,10,"Customer Cell        :",0,0,"C");
    //$pdf->Cell(-40,10,"  ".$_GET["coun_name"],0,1,"L");
    
     //$pdf->Cell(40,10,"Customer Email     :",0,0,"C");
   // $pdf->Cell(-40,10,"  ".$row["invoice_no"],0,1,"L"); 
   
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
   
   //$pdf->Cell(35,10,"Description",1,0,"C");
   //$pdf->Cell(55,10,"Customer Name",1,0,"C");
    $pdf->Cell(55,10,'Passenger Name',1,0,'C');
   
    $pdf->Cell(55,10,"Destination Point",1,0,"C");
   
 // $pdf->Cell(33,10,"Ticket No",1,0,"C");
     $pdf->Cell(28,10,"Travel Date",1,0,"C");
     $pdf->Cell(40,10,"Issue Date",1,0,"C");
     // $pdf->Cell(15,10,"Unit",1,0,"C");
     $pdf->Cell(40,10,"Air Fare BDT",1,0,"C");
     $pdf->Cell(35,10,"Air Lines",1,1,"C");

//for ($i=0; $i < count($_GET["invoice_no"]); $i++){}

   for ($i=0; $i < count($_GET["pid"]); $i++){
     $pdf->Cell(12,19, ($i+1),1,0,"C");
     $pdf->SetFont("Arial","B",8);
    // $pdf->Cell(35,19, $_GET["pro_name"][$i],1,0,"C");
    
     $pdf->Cell(55,19, $_GET["coustomer_name"][$i],1,0,"C");
     
     $pdf->Cell(55,19, $_GET["country"][$i],1,0,"C");
     
    
    
 //  $pdf->Cell(33,10, $_GET["t_no"][$i],1,0,"C");
    
     $pdf->Cell(28,19, $_GET["fly_d"][$i],1,0,"C");
      
    $pdf->Cell(40,19, $_GET["order_date"],1,0,"C");
    
     //$pdf->Cell(15,19, $_GET["qty"][$i],1,0,"C");
   
     $pdf->Cell(40,19, ($_GET["qty"][$i] * $_GET["price"][$i]),1,0,"C");
      $pdf->Cell(35,19, $_GET["air"][$i],1,1,"C");
     
   }
$fpdf->LN;
   $pdf->Cell(230,13,"",1,0);
   $pdf->Cell(35,13,"",1,1,"C");

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
    // $pdf->Cell(240,10,"Paid    ",0,0,"R");
    //  $pdf->Cell(50,10,":        ".$_GET["paid"],0,1);
     
     
     
    // $pdf->Cell(240,10,"Due    ",0,0,"R");
    //  $pdf->Cell(50,10,":        ".$_GET["due"],0,1);
        
   // $pdf->Cell(150,10,"invo    ",0,0,"R");
   
       $pdf->Cell(40,10,"",0,1);
      
       
       $pdf->Cell(200,8,"Bank                  United Commercial Bank Ltd",0,1,"R");
       $pdf->Cell(200,8,"A/CName      Dear Life BD Tours & Travel Ltd",0,1,"R");
       $pdf->Cell(200,8,"A/C No                             0952 101 0000 12460",0,1,"R");
	$pdf->Output();
}
    
 ?>
