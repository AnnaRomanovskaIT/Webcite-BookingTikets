<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
</head>
<body>
<h1>Delete bus</h1>
<h3>Delete entire bus with all tickets</h3>

<form id="form1" action="deleteAll.php" onsubmit="return checkForm()" method="POST">
buss ID: <br> <input type="number" name="bussID" placeholder="example: 1"><br><br>
<button type="submit">Delete</button>
</form>
<br><a href="admin.php" style="color: green;">Form to create bus</a>
<script>
function checkForm() {
var empt = document.forms["form1"]["bussID"].value;
if (!empt)
{
alert("Please input a Value");
return false;
}
}
</script>
</body>
</html>