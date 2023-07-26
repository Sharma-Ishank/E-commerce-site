<?php

include_once "authguard.php";
include_once "../shared/connection.php";

$name=$_POST['name'];
$pid=$_SESSION['pid'];

$price=$_POST['price'];
$details=$_POST['details'];

$location=$_FILES['pdtimg']['tmp_name'];

if($location == NULL) $status_location = 1;

if($name == NULL)  $status_name = 1;

if($price == NULL)  $status_price = 1;

if($details == NULL)  $status_details = 1;

if($status_location != 1){
    $dest_file_path="../shared/images/".$_FILES['pdtimg']['name'];
    move_uploaded_file($_FILES['pdtimg']['tmp_name'],$dest_file_path);
}

if($status_location != 1){
    $status1=mysqli_query($conn,"update product set impath='$dest_file_path' where pid=$pid");
    if(!$status1) echo mysqli_error($conn);
}


if($status_name != 1){
    $status2=mysqli_query($conn,"update product set name='$name where pid=$pid'");
    if(!$status2) echo mysqli_error($conn);
}


if($status_price != 1){
    $status3=mysqli_query($conn,"update product set price=$price where pid=$pid");
    if(!$status3) echo mysqli_error($conn);
}


if($status_details != 1){
    $status4=mysqli_query($conn,"update product set details='$details' where pid=$pid");
    if(!$status4) echo mysqli_error($conn);
}

header("location:view.php");
?>