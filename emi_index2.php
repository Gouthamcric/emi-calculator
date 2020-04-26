<?php $arr=$_REQUEST['arr'];

$con= mysqli_connect("localhost", "root", "", "emicalc")or die(mysqli_errno($con));
$querry="insert into emi_tab(
    id,
plans,
iAmount,
bname,
iRate,
pFees,
dFees,
duration,
brand,
model,
variant,
city,
eamount,
email
) values($arr[13],$arr[0],$arr[1],'$arr[2]',$arr[3],$arr[4],$arr[5],$arr[6],'$arr[7]','$arr[8]','$arr[9]','$arr[10]',$arr[11],'$arr[12]')";
$res= mysqli_query($con, $querry)or die(mysqli_error($con));
echo mysqli_error($con);
?>