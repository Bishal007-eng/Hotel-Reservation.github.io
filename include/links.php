<!-- Bootstrap link -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<!--Google fonts link -->

<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">


<!-- Bootstrap Icons link -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


<!-- CSS link -->
<link rel="stylesheet" href="css/style.css">

<link rel="icon" type="image/x-icon" href="images/fav.jfif">

<?php
  session_start();
  date_default_timezone_set("Asia/Kathmandu");

  require('Admin/inc/db_connect.php');
  require('Admin/inc/essentials.php');

  $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
  $settings_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
  $values = [1];

  $contact_r = mysqli_fetch_assoc(select($contact_q, $values,'i'));
  $settings_r = mysqli_fetch_assoc(select($settings_q, $values,'i'));


  if($settings_r['shutdown']){
    echo<<<alertbar
      <div class = 'bg-danger text-center p-2 fw-bold'>
       <i class="bi bi-exclamation-triangle-fill"></i>
        Bookings are temporarily closed!!
      </div>
    alertbar;

  } 
?>