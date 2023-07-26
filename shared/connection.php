<?php
$conn=new mysqli("localhost","root","","ishank_data");
if($conn->connect_error){
    echo "Error in SQL Connection";
    die;
}