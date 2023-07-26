<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .card{
            width:300px;            
            display:inline-block !important;
            margin:10px;
        }
        .pdtimg-container{
            width:100%;            
        }
        .pdtimg{
            width:100%;
        }
        .price{
            font-size:24px;
            color:violet;
        }
        .price::before{
            content:"Rs ";
        }
    </style>
</head>
<body background="img2.jpg">
</body>
</html>

<?php

include "authguard.php";
include "menu.html";

$userid=$_SESSION['userid'];

include_once "../shared/connection.php";

$sql_cursor=mysqli_query($conn,"select * from placedorder join product on placedorder.pid=product.pid where userid=$userid");


while($row=mysqli_fetch_assoc($sql_cursor)){

    $pid=$row['pid'];
    $name=$row['name'];
    $details=$row['details'];
    $price=$row['price'];
    $impath=$row['impath'];


    echo "<div class='card'>
        <div class='card-body'>
            <h5 class='card-title'>$name</h5>
            <div class='price'>$price</div>
            <div class='pdtimg-container'>
                <img class='pdtimg' src='$impath'>
            </div>
            <div class='card-text'>$details</div>
            
        </div>


    </div>";

}
?>
