<?php
$buss = $_GET["selectedBuss"];
$idArray = $_GET["arrayID"];
$username = $_GET["username"];
$myArray = explode(',', $idArray);

$conn = new mysqli("localhost","root","","test");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

foreach ($myArray as $element) {
    $sql="UPDATE `seat` SET `customerID`='$username',`free`=1 WHERE `seatID`=$element and `bussID`=$buss";    
    if ($conn->query($sql) === TRUE) {
    echo "<script>alert('You reserved ticket successfully')</script>";
    header('Location: main.php');
    } else {
    echo "<script>alert('Error!')</script>";
    }
}
    $conn->close();
?>