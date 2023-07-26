<?php

include_once "authguard.php";

include_once "menu.html";
include_once "../shared/connection.php";

$pid=$_GET['pid'];

$_SESSION['pid']=$pid;

$sql_cursor=mysqli_query($conn,"select * from product where pid=$pid");

$row=mysqli_fetch_assoc($sql_cursor);

$name= $row['name'];
$impath= $row['impath'];
$details= $row['details'];
$price= $row['price'];

echo " <div class='d-flex justify-content-center align-items-center vh-100'>
        <form action='applyEdit.php' class='bg-info p-5' method='POST' enctype='multipart/form-data'>
            <div class='text-center text-white'>
                Edit Details...
            </div>
            <input type='text' placeholder='Name : ${name}' class='form-control mt-4' name='name'>
            <input type='number' placeholder='Price : ${price}' class='form-control mt-4' name='price'>
            <textarea name='details' cols='30' rows='5' class='form-control mt-3' placeholder='Details : ${details}'></textarea>
            <input type='file' name='pdtimg' class='form-control mt-3'>
            <div class='text-center'>
                <button class='bg-danger mt-4 btn'>Update Details</button>
            </div>
        </form>
    </div>"

?>