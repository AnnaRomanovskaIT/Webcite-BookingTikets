<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#buss option:eq(0)").prop('selected', true);
        $(".container").load("func.php?selected=1");
        isUserLoggedOn = <?php echo $_SESSION["success"] ?>;
        if(isUserLoggedOn==1){
          $("#Login").hide();
          $("#authorization").append('<span>Hello, </span>');
          $("#authorization").append('<a href="index.php" style="color: white;"> <?php echo $_SESSION["username"]; ?></a>');
          $("#authorization").append('<span>!</span>');
        }

        $("#buss").on("change", function () { 
        var selected = $(this).children(":selected").attr("id");
        $(".container").load("func.php?selected="+selected);
        });

        $("#btn_submit").on("click", function () {
            var idArray = [];
            $('.row .seat.selected').each(function () {
            idArray.push(this.id);
            });
            var selectedbuss = $("#buss").children(":selected").attr("id");
            let text = $("#total").text();
            if (confirm("Confirm reserving place " + idArray.toString()+" for "+text) == true) {
              window.open("update.php?username=<?php echo $_SESSION["username"]?>&arrayID="+idArray+"&selectedBuss="+selectedbuss);
              } else {
              alert("You canceled reserving");
          }
         });
    });
    </script>
    <title>Buss Seat Booking</title>
  </head>
  <body>
<div class="authorization" id="authorization">
<a id="Login" href="index.php"  style="color: white;">Log in</a>
</div>
    <div class="buss-container">
    <label> Select a route:</label>
      <select id="buss">
    <?php
	$connBuss = mysqli_connect("localhost","root","","test");
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
    }
                
	$queryBuss=mysqli_query($connBuss,"select * from `buss`");
	while($rowBuss=mysqli_fetch_array($queryBuss)){
    ?>
        <option id="<?php echo $rowBuss['id'] ?>" value="<?php echo $rowBuss['value'] ?>"><?php echo $rowBuss['data_time']; echo " "; echo $rowBuss['name']; echo " ("; echo $rowBuss['value'];echo  ")"; ?></option>
    <?php } ?>
    </select>
    </div>

    <ul class="showcase">
      <li>
        <div id="seat" class="seat"></div>
        <small>Available</small>
      </li>
      <li>
        <div id="seat selected" class="seat selected"></div>
        <small>Selected</small>
      </li>
      <li>
        <div id="seat sold" class="seat sold"></div>
        <small>Reserved</small>
      </li>
    </ul>
    <div class="container">
    </div>
    <p class="text">
      You have selected <span id="count">0</span> seat for a price of  <span id="total"> 0 </span> UAH
    </p>
    <button type="submit" class="btn" name="btn_submit" id="btn_submit">Reserve</button>
  </body>

  <script>
const container = document.querySelector(".container");
const bussSelect = document.getElementById("buss");
const count = document.getElementById("count");
const total = document.getElementById("total");
container.addEventListener("click", (e) => {
  if (e.target.classList.contains("seat") && !e.target.classList.contains("sold")){
    e.target.classList.toggle("selected");
    var seats = document.querySelectorAll(".row .seat.selected");
    var valueBuss = bussSelect.value;
    var selectedSeatsCount = seats.length;
    total.innerHTML=valueBuss*selectedSeatsCount;
    count.innerHTML=selectedSeatsCount;
    }
});
    </script>
</html>