<?php
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$firstname=$_REQUEST['firstname'];
	$lastname=$_REQUEST['lastname'];
	$sex=$_REQUEST['sex'];
	$address=$_REQUEST['address'];
	$dob=$_REQUEST['dob'];
	$phone=$_REQUEST['phone'];
	$mobile=$_REQUEST['mobile'];
	$blood_group=$_REQUEST['blood_group'];			
	include("connection.php");
	$str2="insert into users (email,password,role)"."values ('$email','$password','Patient')";
	$res=mysqli_query($con,$str2);
	$str="insert into patient (email,password,firstname,lastname,sex,address,dob,phone,mobile,blood_group)"."values ('$email','$password','$firstname','$lastname','$sex','$address','$dob','$phone','$mobile','$blood_group')";
	$result=mysqli_query($con,$str);
	if($result){
		echo "succesfully registered";
	}
	else{
		echo "error".mysqli_error($con);
	}
?>
