<?php 
include_once('db.php');
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$doctor = isset($_POST['doctor']) ? $_POST['doctor'] : null;
$date = isset($_POST['date']) ? $_POST['date'] : null;
$time = isset($_POST['time']) ? $_POST['time'] : null;
$date_now = date("Y-m-d h:i");
$fdate = $date." ".$time;
$query="SELECT `start`,`end` FROM `doctors` WHERE `doctor`='$doctor'";
$result = mysqli_query($conn,$query);
$errors = 0;
// validator
if (empty($name) || empty($email) || empty($phone) || empty($doctor)||empty($date)||empty($time)) {
  echo "<div class='error'><p>All fields are required</p></div>";
  $error=1;
};
if (strlen($name)>40||strlen($name) <3) {$error=1;echo "<div class='error'><p>Name must be between 3-40 characters</p></div>";};
if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {$error=1;echo "<div class='error'><p>Only letters and white space allowed</p></div>";};
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {$error=1;echo "<div class='error'><p>Invalid email format</p></div>";};
if (!preg_match("/^[1-9][0-9]{0,15}$/", $phone)) {$error=1;echo "<div class='error'><p>Invalid Phone number</p></div>";};
if ($date_now > $fdate) {$error=1;echo "<div class='error'><p>You cannot time travel,check the date</p></div>";}

while($row = mysqli_fetch_array($result))
{ 
  $start = $row['start'];
  $end= $row['end'];
  if ($start > $time){
    $error=1;
    echo"<div class='error'><p>Doctor not available at this time</p><a style='color:blue' href='/doctors.php'>Check available Doctors</a></div>";
  }
  if ($end < $time){
    $error=1;
    echo"<div class='error'><p>Doctor not available at this time,<a style='color:blue' href='/doctors.php'>Check available Doctors</a></p></div>";
  }
 
}
if ($error==0){
  $sql = "INSERT INTO `appointment` (name,email,phone,doctor,date,time)
VALUES ('$name', '$email', '$phone','$doctor','$date','$time:00')";

if ($conn->query($sql) === TRUE) {
  echo "<div class='success'><p>Appointment Booked</p></div>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
};
?>