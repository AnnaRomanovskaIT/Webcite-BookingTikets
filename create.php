<?php
$nameRoute=$_POST["nameRoute"];
$price=$_POST["price"];
$data_time=$_POST["data_time"];
$first=$_POST["first"];
$last=$_POST["last"];

$conn = mysqli_connect("localhost","root","","test");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();}

$queryBuss=mysqli_query($conn,"INSERT INTO `buss`(`name`, `value`, `data_time`) VALUES ('$nameRoute','$price','$data_time')");
$querySelectBuss=mysqli_query($conn,"SELECT `id` FROM `buss` WHERE `name`='$nameRoute' and `value`=$price and `data_time`='$data_time' LIMIT 1");
while ($row = mysqli_fetch_row($querySelectBuss)) {
    $idBuss=end($row);
  }
mysqli_free_result($querySelectBuss);
for($i=$first;$i<$last;$i++){
$querySeat=mysqli_query($conn,"INSERT INTO `seat`(`bussID`, `seatID`, `free`) VALUES ($idBuss,$i,0)");
}

echo"<script>alert('Success!')</script>";
?>