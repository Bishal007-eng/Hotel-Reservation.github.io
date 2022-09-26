<?php

require('inc/essentials.php');
require('inc/db_connect.php');

adminLogin();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panal</title>

  <?php require('inc/links.php'); ?>

</head>

<body class="bg-white">

  <?php require('inc/header.php'); ?>

  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <h3 class="mb-4 mt-2">USERS</h3>

        <!-- This div is for Features section -->
        <div class="card border-0 shadow mb-4">
          <div class="card-body">

            <div class="text-end mb-4">
              <!-- Button trigger modal -->
              <!-- <button type="button" class="btn btn-primary shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                <i class="bi bi-cloud-plus-fill"></i> Add
              </button> -->
              <input type="text" oninput="search_user(this.value)" class="form-control shadow w-25 ms-auto rounded-edge" placeholder="Search">
            </div>

            <div class="table-responsive">

              <table class="table table-hover border shadow text-center" style="min-width: 1500px;">
                <thead>
                  <tr class="custom-bg text-light">
                    <th scope="col">S.N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone no.</th>
                    <th scope="col">Location</th>
                    <th scope="col">D.O.B</th>
                    <th scope="col">verified</th>
                    <th scope="col">Status</th>
                    <th scope="col">Check-in</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="users-data">
                </tbody>
              </table>

            </div>

          </div>
        </div>

      </div>
    </div>
  </div>




  <?php require('inc/script.php'); ?>


  <script src="scripts/users.js"></script>

</body>

</html>