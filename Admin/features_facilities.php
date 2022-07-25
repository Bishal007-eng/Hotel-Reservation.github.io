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
                <h3 class="mb-4 mt-2">FEATURES & FACILITIES</h3>

                <!-- This div is for Features section -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Features</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                <i class="bi bi-cloud-plus-fill"></i> Add
                            </button>
                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">

                            <table class="table table-hover border shadow">
                                <thead>
                                    <tr class="custom-bg text-light">
                                        <th scope="col">S.N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data">
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

                <!-- This div is for Facilities section -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Facilities</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                                <i class="bi bi-cloud-plus-fill"></i> Add
                            </button>
                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">

                            <table class="table table-hover border shadow ">
                                <thead>
                                    <tr class="custom-bg text-light">
                                        <th scope="col">S.N</th>
                                        <th scope="col" width="10%">Icon</th>
                                        <th scope="col" width="10%">Name</th>
                                        <th scope="col" width="40%">Description</th>
                                        <th scope="col" class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="facilities-data">
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--Features Button trigerring model -->
    <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="feature_s_form">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Features </h5>
                    </div>
                    <div class="modal-body">
                        <!-- Feature Name we add here -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="feature_name" placeholder="Feature Name" class="form-control shadow-none" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Facility Button trigerring model -->
    <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="facility_s_form">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Facility</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Facilities we add here -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="facility_name" placeholder="Facility" class="form-control shadow-none" required>
                        </div>

                        <!-- Facilities Icons we add here -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Icons</label>
                            <input type="file" name="facility_icon" accept=".svg" placeholder="Member picture" class="form-control shadow-none" required>
                        </div>

                        <!-- Facilities decsription we add here -->
                        <div class="mb-3">
                            <label class="form-label ">Description</label>
                            <textarea name="facility_description" class="form-control shadow-none " rows="5"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>






    <?php require('inc/script.php'); ?>

    
    <script src="scripts/features_facilities.js"></script>

</body>

</html>