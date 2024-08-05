<?php
$seatID=$_GET["seatID"];
$bussID=$_GET["bussID"];
$conn = mysqli_connect("localhost","root","","test");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();}
$query=mysqli_query($conn,"UPDATE `seat` SET `customerID`=NULL,`free`=0 WHERE `seatID`=$seatID and `bussID`=$bussID");
header('Location: index.php');
?>