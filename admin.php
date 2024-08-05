<!DOCTYPE html>
<html>
<head>
        <title>Admin</title>
<style>
input,
button {
  width: 150px;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

.data_time{
  width: 250px;
}
.number{
  width: 89px;
}
</style>
</head>
<body>
    <h1>Create new buss</h1>
<form id="myForm" action="create.php" onsubmit="return validateForm()" method="POST">
Create new route<br> <input type="text" name="nameRoute" placeholder="example: Lviv-Kyiv"><br>
Price<br> <input type="number" name="price" placeholder="example: 400"><br>
Data and time<br> <input class="data_time" type="text" name="data_time" placeholder="example: 06.12.2023 12:00-18:00"><br><br>
<hr>
Create new seats (from-to)<br> <input class="number" type="number" name="first" placeholder="example: 1"><input  class="number" type="number" name="last" placeholder="example: 21"><br><br>
<button type="submit">Create</button>
</form>
<br><a href="adminDelete.php" style="color: red;">Form to delete bus</a>
<script>
function validateForm() {
  var x = document.forms["myForm"]["nameRoute"].value;
  var y = document.forms["myForm"]["price"].value;
  var z = document.forms["myForm"]["data_time"].value;
  var f = document.forms["myForm"]["first"].value;
  var l = document.forms["myForm"]["last"].value;
  if (!x) {
    alert("Route must be filled out");
    return false;
  }
  if (!y) {
    alert("Price must be filled out");
    return false;
  }
  if (!z) {
    alert("Data and time must be filled out");
    return false;
  }
  if (!f) {
    alert("First number must be filled out");
    return false;
  }
  if (!l) {
    alert("Last number must be filled out");
    return false;
  }
}
</script>
</body>
</html>