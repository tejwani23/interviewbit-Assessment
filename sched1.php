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

//echo "success <br>";


$sql=mysqli_select_db($conn,'interview');

if(!$conn)
{
die("failed".mysqli_error());
}

//echo "success <br>";

?>
<!DOCTYPE html>
<html>
<head>
<title> Showing Results</title>
</head>

<body>
<h2>Name</h2>
<form  id="frm" method="POST" action="sched2.php">
<?php
$result = mysqli_query($conn,"SELECT * FROM students") or die( mysqli_error($conn));
//$cnt = mysqli_query($conn,"SELECT COUNT(name) FROM students") or die( mysqli_error($conn));
$i=0;
while($db_row = mysqli_fetch_array($result)) {

?>
<input type="checkbox" name="name[]">
<label for="1">Name: <?php echo $db_row['name']; ?> Email:<?php echo $db_row['email']; ?></label>
<br>

<!-- <label for="time">Choose a time:</label>
  <select id="time" name="time">
    <option value="1">12pm-1pm</option>
    <option value="2">1pm-2pm</option>
    <option value="3">2pm-3pm</option>
    <option value="4">3pm-4pm</option>
  </select> -->


<?php

$i++;
}
?>
<input type="datetime-local" id="birthdaytime" name="birthdaytime" required> <br>

<button type="submit" id="select">Schedule</button>
<script>

$('#submit_button').on('click', function() {
   var interests = $("input[type='checkbox']");
   if ($('input:checkbox:checked').length >= 2) {
         var checkedValues = $('input:checkbox:checked').map(function()   {return this.value}).get();
         alert("Valid");
      } 
      else 
      {
         $('._setupErrorHandler').show();
         $('#errorMessage').html("Please choose at least two interests")
      }
}

function deRequireCb(elClass) {
            el=document.getElementById(elClass);
            var c=0;

            var n=<?php echo cnt ?>
            var atLeastTwoChecked=false;//at least one cb is checked
            for (i=0; i<n; i++) {
                if (el[i].checked === true) {
                    c++;
                } 
            }
            if(c==2)
                atLeastTwoChecked=true;
            if (atLeastTwoChecked === true) {
                for (i=0; i<n; i++) {
                    el[i].required = false;
                }
            } else {
                for (i=0; i<el.length; i++) {
                    el[i].required = true;
                }
            }
        }  
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


