<?php

    require('inc/essentials.php');
    require('inc/db_connect.php');

    adminLogin();

    
    if (isset($_GET['seen'])) 
    {
        $frm_data = filteration($_GET);

        if ($frm_data['seen']=='all') 
        {
            $q = "UPDATE `user_queries` SET `seen`=?";
            $values = [1];
            if (update($q, $values, 'i')) 
            {
                alert('success', 'No more Messages to Read!');
            } 
            else 
            {
                alert('error', 'Operation failed!');
            }
        } 
        else 
        {
            $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no` = ?";
            $values = [1, $frm_data['seen']];
            if (update($q, $values, 'ii')) 
            {
                alert('success', 'Marked as Read!');
            } 
            else 
            {
                alert('error', 'Operation failed!');
            }
        }
    }

    if (isset($_GET['del'])) 
    {
        $frm_data = filteration($_GET);

        if ($frm_data['del'] == 'all') 
        {
           $q = "DELETE FROM `user_queries`";
            if (mysqli_query($conn, $q)) 
            {
                alert('success', 'All Datas Deleted!');
            } 
            else
            {
                alert('error', 'Operation failed!');
            }
        } 
        else 
        {
            $q = "DELETE FROM `user_queries` WHERE `sr_no` = ?";
            $values = [$frm_data['del']];
            if (delete($q, $values, 'i')) 
            {
                alert('success', 'Data Deleted Successfully!');
            } 
            else
            {
                alert('error', 'Operation failed!');
            }
        }
    }

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
            <div class="col-lg-10 ms-auto p-3 overflow-hidden">
                <h3 class="mb-4 mt-2">User Queries</h3>


                <div class="card border-0 shadow mb-4">
                    <div class="card-body">

                    <div class="text-end mb-4">
                        <a href="?seen=all" class="btn custom-bg rounded-pill shadow text-white"><i class="bi bi-journal-check"></i> Mark all read</a>
                        <a href="?del=all" class="btn btn-danger rounded-pill shadow"><i class="bi bi-trash-fill"></i> Delete all</a>
                    </div>

                        <div class="table-responsive-md" style="height: 400px; overflow-y: scroll;">

                            <table class="table table-hover border shadow">
                                <thead class="sticky-top">
                                    <tr class="custom-bg text-light">
                                        <th scope="col">S.N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" width="20%">Email</th>
                                        <th scope="col" width="15%">Subject</th>
                                        <th scope="col" width="20%">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q = "SELECT * FROM `user_queries` ORDER BY `sr_no` DESC";
                                        $data = mysqli_query($conn, $q);
                                        $i = 1;

                                        while ($row = mysqli_fetch_assoc($data)) 
                                        {
                                            $seen = '';
                                            if ($row['seen']!= 1) {
                                                $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary'>Mark as Seen</a><br>";
                                            }
                                            $seen.= "<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>";
                                            echo <<<query
                                                <tr>
                                                    <td>$i</td>
                                                    <td>$row[name]</td>
                                                    <td>$row[email]</td>
                                                    <td>$row[subject]</td>
                                                    <td>$row[message]</td>
                                                    <td>$row[date]</td>
                                                    <td>$seen</td>
                                                </tr>
                                                query;
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

                

                

            </div>
        </div>
    </div>



    <?php require('inc/script.php'); ?>

</body>

</html>