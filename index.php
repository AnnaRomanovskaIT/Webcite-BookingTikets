<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
  }
  if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['success']);
        header("location: main.php");
  }
  if (isset($_GET['gotomain'])) {
    header("location: main.php");
}
?>
<!DOCTYPE html>
<html>
<head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
        <h2>Home Page</h2>
</div>
<div class="content">
        <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <?php 
                $username = $_SESSION['username'];
          ?>
      </div>
        <?php endif ?>

    <?php  if (isset($_SESSION['username'])) : ?>
        <p>Welcome, <strong><?php echo $_SESSION['username']; ?></strong>!</p>
        <p>Your tickets: </p>
<table>
	<thead>
		<th>Ticket number</th>
		<th>Route</th>
    <th>Data and time</th>
		<th>Price</th>
    <th></th>
		</thead>
		<tbody>
			<?php
        $conn = mysqli_connect("localhost","root","","test");
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit();}
				$query=mysqli_query($conn,"SELECT seat.seatID, buss.name, buss.value, buss.id, buss.data_time FROM seat INNER JOIN buss ON buss.id = seat.bussID WHERE seat.customerID='$username';");
					while($row=mysqli_fetch_array($query)){
				?>
						<tr>
							<td><?php echo $row['seatID']; ?></td>
							<td><?php echo $row['name']; ?></td>
              <td><?php echo $row['data_time']; ?></td>
							<td><?php echo $row['value']; ?></td>
							<td>
								<a href="delete.php?seatID=<?php echo $row['seatID']; ?>&bussID=<?php echo $row['id']?>">Delete</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
        <p> <a href="index.php?gotomain='1'" style="color: white;">Return to main page</a> </p>
        <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
                
</body>
</html>