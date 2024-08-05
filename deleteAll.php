<?php
$id=$_POST["bussID"];

$conn = mysqli_connect("localhost","root","","test");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();}

$query=mysqli_query($conn,"DELETE FROM `buss` WHERE `id`=$id");
$query2=mysqli_query($conn,"DELETE FROM `seat` WHERE `bussID`=$id");

echo"<script>alert('Success!')</script>";
?>