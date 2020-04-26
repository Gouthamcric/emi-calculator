<?php

//index.php
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$message = '';

$con= mysqli_connect("localhost", "root", "", "emicalc")or die(mysqli_errno($con));
//$email=$_REQUEST['dt'];

 $query = "SELECT * FROM emi_tab where email='$email'";
 $res= mysqli_query($con, $query)or die(mysqli_errno($con));








     $output='
 <div class="table-responsive">
  <table class="table table-striped table-bordered">
   <tr>
    <th>id</th>
    <th>plans</th>
    <th>Loan Amount</th>
    <th>Brand name</th>
    <th>Interest Rate</th>
    <th>Processing Fees</th>
    <th>Documentation Fees</th>
    <th>Duration</th>
    <th>Brand</th>
    <th>Model</th>
    <th>Variant</th>
    <th>city</th>
    <th>EMI amount</th>
    <th>email</th>
    
   </tr>
 ';

  $count= mysqli_num_rows($res);
 $i=0;
     while($i!=$count)
        {
         $row= mysqli_fetch_array($res)or die(mysqli_errno($con));
  $output .= 
    '<tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["plans"].'</td>
    <td>'.$row["iAmount"].'</td>
    <td>'.$row["bname"].'</td>
    <td>'.$row["iRate"].'</td>
    <td>'.$row["pFees"].'</td>
    <td>'.$row["dFees"].'</td>
    <td>'.$row["duration"].'</td>
    <td>'.$row["brand"].'</td>
    <td>'.$row["model"].'</td>
    <td>'.$row["variant"].'</td>
    <td>'.$row["city"].'</td>
    <td>'.$row["eamount"].'</td>
    <td>'.$row["email"].'</td>
    </tr>';
    $i++;
 }
 
 include('pdf.php');
 //$file_name = md5(rand()) . '.pdf';
 $file_name = 'EMI' . '.pdf';
  $html_code  = '<link rel="stylesheet" href="bootstrap.min.css">';
  $html_code .='<link rel="stylesheet" href="bootstrap.min.css">';
  $html_code .='<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">';
  $html_code .='<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>';
  $html_code .='<script src="bootstrap/js/jquery.js" type="text/javascript"></script>';
  $html_code .='<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>';
 $html_code .= $output;
 $pdf = new Pdf();
 $pdf->setPaper('A3', 'landscape');
 $pdf->load_html($html_code);
 $pdf->render();
 $file = $pdf->output();
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
  $message = 'EMI Details has been send successfully...';
 }
 else
 {$message='Unexpected error! Try again..';}
 unlink($file_name);

echo $message; 
?>

