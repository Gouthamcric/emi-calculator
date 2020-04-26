<?php
$bname=$_POST["bname"];
$con= mysqli_connect("localhost", "root", "", "emi")or die(mysqli_errno($con));
$querry="select * from bank where bankName='$bname'";
$res= mysqli_query($con, $querry) or die(mysqli_error($con));
$out=mysqli_fetch_array($res);


$data=$out["intrestRate"]."/".$out["proc_fees"]."/".$out["doc_fees"];
echo $data;
?>
