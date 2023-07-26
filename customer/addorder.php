<?php

include_once "authguard.php";
include_once "../shared/connection.php";

$userid=$_SESSION['userid'];



$sql_cursor=mysqli_query($conn, "select * from cart join product on cart.pid=product.pid where userid=$userid");

while($row=mysqli_fetch_assoc($sql_cursor)){

$pid=$row['pid'];
$status=mysqli_query($conn,"insert into placedorder(pid,userid) values($pid,$userid)");

if($status){
    header("location:vieworder.php");
}
else{
    echo mysqli_error($conn);

}
}
echo "successfull";


?>