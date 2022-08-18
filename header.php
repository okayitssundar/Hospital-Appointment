<head>
  <link rel="stylesheet" href="style.css">
  <title> <?php if (isset($title)) {echo $title;}
else {echo "Hospital Form";} ?> </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<nav>
  <a href="/">
    <img src="https://seeklogo.com/images/H/hospital-clinic-plus-logo-7916383C7A-seeklogo.com.png" alt="logo">
  </a>
  <ul class="flex">
    <li class="m1">
      <a href="/">Home</a>
    </li>
    <li class="m1">
      <a href="/doctors.php">Doctors</a>
    </li>
    <li class="m1">
      <a href="/appointment.php">Book a appoinment</a>
    </li>

  </ul>
</nav>