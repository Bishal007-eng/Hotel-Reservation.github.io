<?php

require('inc/db_connect.php');
require('inc/essentials.php');

session_start();
if ((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)) {
    redirect('dashboard.php');
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panal</title>
    <?php require('inc/links.php'); ?>

    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
        }
    </style>


</head>

<body class="bg-light">

    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form action="#" method="POST">
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN PANAL</h4>

            <div class="p-4">

                <!-- Email -->
                <div class="mb-3">
                    <!-- mb-3 means margin bottom -->
                    <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Admin Name">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <input name="admin_password" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                </div>
                <button name="login" type="submit" class="btn text-white custom-bg shadow-none">Login</button>

            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['login'])) {

        $frm_data = filteration($_POST);

        $query = "SELECT * FROM `admin` WHERE `admin_name`=? AND `admin_password`=?";  //column names and table names are written inside backtick that is above the tab key which is as ` ` 
        $values = [$frm_data['admin_name'], $frm_data['admin_password']];              //values of table are writtten in single quote as '' 


        $res = select($query, $values, "ss");  //here 'ss' is the datatype, as we are passing two string values i.e admin name and admin password so both has string data type denoted by 's'. 
        if ($res -> num_rows == 1) {
           $row = mysqli_fetch_assoc($res);    //this fetches all the data if found through $res and store them in  $row
           $_SESSION['adminLogin'] = true;
           $_SESSION['adminId'] = $row['S.no'];
           redirect('dashboard.php');

        }
        else{
          alert('error','Login failed - Invalid Credentials !');
        }
    }
    ?>



    <?php require('inc/script.php'); ?>


</body>

</html>