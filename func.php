<?php
echo '<div class="row">';
$selected = $_GET["selected"];
$i=10;
$conn = mysqli_connect("localhost","root","","test");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
$query=mysqli_query($conn,"select * from `seat`");
while($row=mysqli_fetch_array($query)){
    if($row['bussID']==$selected){
        if($row['seatID']==$i+1){
            $i=$i+10;
            echo '</div>';
            echo '<div class="row">';
        }
        if($row['free']==0){
            echo "<div id=";
            echo $row['seatID'];
            echo " class='seat'></div>";
        } 
        if($row['free']==1){
            echo "<div id=";
            echo $row['seatID'];
            echo " class='seat sold'></div>";
        } 
    } 
}
echo '</div>';
?>
