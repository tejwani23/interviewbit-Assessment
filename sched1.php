<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if(!$conn)
{
die("failed".mysqli_error());
}

echo "success <br>";


$sql=mysqli_select_db('interview',$conn);

if(!$conn)
{
die("failed".mysqli_error());
}

echo "success <br>";
$result = mysqli_query($conn,"SELECT * FROM students");

?>
<!DOCTYPE html>
<html>
<head>
<title> Showing Results</title>
</head>

<body>
<h2>Name</h2>
<form  method="POST" action="sched2.php">
<?php
$i=0;
while($db_row = mysqli_fetch_array($result)) {
?>
<input type="checkbox" name="name"><p><?php echo $db_row["name"]; ?></p>
<label for="time">Choose a time:</label>
  <select id="time" name="time">
    <option value="1">12pm-1pm</option>
    <option value="2">1pm-2pm</option>
    <option value="3">2pm-3pm</option>
    <option value="4">3pm-4pm</option>
  </select>


<?php
$i++;
}
?>

<button type="submit" id="select">Schedule</button>
<script>
$(document).ready(function() {
  $('#select').click(function() {
    var checkboxes = $('input[type="checkbox"]').length;
    if(chackboxes!=2)
    prompt("Please Tick exactly two Checkboxes")

  })
});
</script>
</form>

</body>
</html>


