<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$con= mysqli_connect("localhost", "root", "", "emicalc")or die(mysqli_errno($con));
if(isset($_POST["dt"])){
    $id=$_POST["dt"];
}
else
{
    $id=$_GET["id"];
}
$data=$_GET["data"];


 $query = "SELECT * FROM emi_tab where id='$id'";
 $res= mysqli_query($con, $query)or die(mysqli_errno($con));

require('fpdf/fpdf.php');
class PDF extends FPDF{

    function Footer(){
       
    $this->SetY(-15);
    $this->setFont('Arial','',8);
    $this->cell(0,10,'page'.$this->pageNo(),0,0,'C');

    }
}
$date='';
$pdf=new PDF('p','mm','A3');//(297 x 420 mm)
//$fpdf = new FPDF();
$pdf->Addpage();
$pdf->setFont('Arial','B',20);
$pdf->Image('back13.jpg', 0, 0);
$pdf->SetTextColor(255, 255, 255);

$pdf->cell(275,10,'EMI PLANS',0,1,'C');

    $pdf->setFont('Arial','',14);
 $count= mysqli_num_rows($res);
 $i=0;
while($i!=$count)

{
    if($i==0){
    $date ='Date:'.date("d-m-y"); 
    $pdf->Line(10, 125, 290, 125);
    $pdf->Line(10, 220, 290, 220);
    $pdf->Line(10, 325, 290, 325);
    }
    else if($i%3==0)
    {$pdf->Addpage();
    $pdf->Image('back13.jpg', 0, 0);
    $pdf->Line(10, 115, 290, 115);
    $pdf->Line(10, 210, 290, 210);
    $pdf->Line(10, 315, 290, 315);
    }
    
    else{$date="";
    
    }
$row= mysqli_fetch_array($res)or die(mysqli_errno($con));
$pdf->cell(225,15,'',0,1,'C');
$pdf->cell(10.8,10,'',0,0,'C');
$pdf->setFont('Arial','B',18);
$pdf->cell(30,10,"EMI PLAN:-".($i+1),0,0,'C');
$pdf->setFont('Arial','',14);
$pdf->cell(205,10,'',0,0,'C');
$pdf->cell(30,10,$date,0,1,'C');
$pdf->cell(7,10,'',0,0,'C');

$pdf->setFont('Arial','B',20);
$pdf->SetFillColor($r=50, $g=115, $b=220);
$pdf->cell(45,20,$row["brand"],0,0,'C',true);

$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=32, $g=156, $b=238);
$pdf->cell(45,20,$row["model"],0,0,'C',true);


$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=0, $g=209, $b=178);
$pdf->cell(45,20,$row["variant"],0,0,'C',true);


$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=32, $g=156, $b=238);
$pdf->cell(45,20,$row["city"],0,0,'C',true);


$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=50, $g=115, $b=220);
$pdf->cell(45,20,'NG',0,1,'C',true);
$pdf->cell(7,10,'',0,0,'C');
$pdf->setFont('Arial','',14);
$pdf->SetFillColor($r=50, $g=115, $b=220);
$pdf->cell(45,10,'Brand',0,0,'C',true);
$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=32, $g=156, $b=238);
$pdf->cell(45,10,'Model',0,0,'C',true);
$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=0, $g=209, $b=178);
$pdf->cell(45,10,'Variant',0,0,'C',true);
$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=32, $g=156, $b=238);
$pdf->cell(45,10,'City',0,0,'C',true);
$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=50, $g=115, $b=220);
$pdf->cell(45,10,'NG',0,0,'C',true);
$pdf->cell(10,10,'',0,1,'C');
$pdf->cell(7,10,'',0,0,'C');
$pdf->cell(45,-30,'',1,0,'L');
$pdf->cell(10,10,'',0,0,'C');
$pdf->cell(45,-30,'',1,0,'L');
$pdf->cell(10,10,'',0,0,'C');
$pdf->cell(45,-30,'',1,0,'L');
$pdf->cell(10,10,'',0,0,'C');
$pdf->cell(45,-30,'',1,0,'L');
$pdf->cell(10,10,'',0,0,'C');
$pdf->cell(45,-30,'',1,1,'L');
$pdf->cell(7,10,'',0,0,'C');
$pdf->cell(45,30,'',0,0,'L');
$pdf->cell(10,10,'',0,0,'C');
$pdf->cell(45,30,'',0,0,'L');
$pdf->cell(10,10,'',0,0,'C');
$pdf->cell(45,30,'',0,0,'L');
$pdf->cell(10,10,'',0,0,'C');
$pdf->cell(45,30,'',0,0,'L');
$pdf->cell(10,10,'',0,0,'C');
$pdf->cell(45,30,'',0,1,'L');




$pdf->cell(225,10,'',0,1,'C');
$pdf->cell(7,10,'',0,0,'C');

$pdf->setFont('Arial','B',20);
$pdf->SetFillColor($r=50, $g=115, $b=220);
$pdf->cell(45,20,$row["bname"],0,0,'C',true);

$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=32, $g=156, $b=238);
$pdf->cell(45,20,'Rs.'.$row["iAmount"],0,0,'C',true);


$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=0, $g=209, $b=178);
$pdf->cell(45,20,'Rs.'.$row["eamount"],0,0,'C',true);


$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=32, $g=156, $b=238);
$pdf->cell(45,20,$row["duration"],0,0,'C',true);


$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=50, $g=115, $b=220);
$tIntrest=$row["iRate"]*1000;
$pdf->cell(45,20,($tIntrest).'%',0,1,'C',true);
$pdf->cell(7,10,'',0,0,'C');
$pdf->setFont('Arial','',14);
$pdf->SetFillColor($r=50, $g=115, $b=220);
$pdf->cell(45,10,'Bank Name',0,0,'C',true);
$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=32, $g=156, $b=238);
$pdf->cell(45,10,'Loan Amount',0,0,'C',true);
$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=0, $g=209, $b=178);
$pdf->cell(45,10,'EMI Amount',0,0,'C',true);
$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=32, $g=156, $b=238);
$pdf->cell(45,10,'Duration',0,0,'C',true);
$pdf->cell(10,10,'',0,0,'C');
$pdf->SetFillColor($r=50, $g=115, $b=220);
$pdf->cell(45,10,'Intrest Rate',0,0,'C',true);
$pdf->cell(10,10,'',0,1,'C');
$pdf->cell(7,10,'',0,0,'C');

$pdf->cell(45,-30,'',1,0,'L');
$pdf->cell(10,10,'',0,0,'C');

$pdf->cell(45,-30,'',1,0,'L');
$pdf->cell(10,10,'',0,0,'C');

$pdf->cell(45,-30,'',1,0,'L');
$pdf->cell(10,10,'',0,0,'C');

$pdf->cell(45,-30,'',1,0,'L');
$pdf->cell(10,10,'',0,0,'C');

$pdf->cell(45,-30,'',1,1,'L');
$pdf->cell(7,10,'',0,0,'C');
$pdf->cell(45,30,'',0,0,'L');
$pdf->cell(10,10,'',0,0,'C');
$pdf->cell(45,30,'',0,0,'L');
$pdf->cell(10,10,'',0,0,'C');
$pdf->cell(45,30,'',0,0,'L');
$pdf->cell(10,10,'',0,0,'C');
$pdf->cell(45,30,'',0,0,'L');
$pdf->cell(10,10,'',0,0,'C');
$pdf->cell(45,30,'',0,1,'L');
//$pdf->Line(10, 125, 290, 125);
$i++;
        }
        
 
 if($data==="mail"){
     $file_name='EMI'.'.pdf';
$file=$pdf->Output($file_name, 'S');

file_put_contents($file_name, $file);
 


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 $mail = new PHPMailer;
 $mail->IsSMTP();       
 $mail->Host = 'tls://smtp.gmail.com:587';   
 $mail->Port = 587;       
 $mail->SMTPAuth = true;      
 $mail->Username = 'gouthamnatarajancric@gmail.com';    
 $mail->Password = 'gnq316gnq316';     
 $mail->SMTPSecure = 'tls';      
 $mail->From = 'gouthamnatarajancric@gmail.com';   
 $mail->FromName = 'Goutham Natarajan';   
 $mail->AddAddress('gouthamnatarajancric@gmail.com', 'Goutham');  
 $mail->WordWrap = 50;      
 $mail->IsHTML(true);      
 $mail->AddAttachment($file_name);         
 $mail->Subject = 'EMI Details|NayaGaadi';   
 $mail->Body = '
Kindly find attached EMI details'."</br>".'

Thanks,'."<br>".'

Balaji K,'."<br>".'

Founder & Game Changer,'."<br>".'

NayaGaadi.com'."<br>".'

Search | Try | Buy |'."<br>".'

Govt of Karnataka Elevate100 Winner, STPI - Orchid Techscape Incubation Centre'."<br>".'

Office: NayaGaadi, STPI- Orchid Techscape Incubation Centre,'."<br>".'

Cyber Park, No. 76 & 77, 6th Floor, Electronics City Phase-1, Bangalore - 560 100'."<br>".'

E-Mail: KBalaji@NayaGaadi.com | Mob /Whatsapp: +91-9900-151719 |'."<br>".'

Facebook : https://www.facebook.com/NayaGaadi;Twitter : https://twitter.com/NayaGaadi'."<br>".'

NayaGaadi is Rural India s first Multi Utility marketplace for all New Vehicles. NayaGaadi offers Test drives, '."<br>".'Best deals, & financial services for all automobile brands at your doorstep.That s our promise! https://goo.gl/8fZrDq'."<br>".'

Think New Vehicle | Think NayaGaadi';    

 if($mail->Send())        
 {
  $message = 'EMI Details has been send successfully...'.$data;
 
 }
 else
 {$message='Unexpected Error! Try again..'.$data;
 
 }
 unlink($file_name);

echo $message; 
 }
 else
 {$file_name='EMI'.'.pdf';
     $pdf->Output($file_name,'D');
     echo "done";
 }
?>
