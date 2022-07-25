<?php

    require('inc/essentials.php');
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
            <div class="col-lg-10 ms-auto p-3 overflow-hidden">
                <h3 class="mb-4 mt-2">SETTINGS</h3>

                <!-- General settings section -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
                        <p class="card-text" id="site_about"></p>
                    </div>
                </div>

                <!-- Button trigerring model -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">General Settings</h5>
                                </div>
                                <div class="modal-body">
                                    <!-- Site title to edit -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Site Title</label>
                                        <input type="text" name="site_title" id="site_title_inp" placeholder="Site title" class="form-control shadow-none" required>
                                    </div>

                                    <!-- About the site adds here -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">About</label>
                                        <textarea name="site_about" id="site_about_inp" class="form-control shadow-none " rows="5" required></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="site_title.value = general_data.site_title,site_about.value = general_data.site_about " class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Shutdown Mode for users to not be allowed to book or make any reservations -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Shutdown Website</h5>

                            <div class="form-check form-switch">
                                <div class="form-check form-switch">

                                    <form>
                                        <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                                    </form>

                                </div>
                            </div>

                        </div>
                        <p class="card-text">
                            No customers will be allowed to book or make any reservations, when Shutdown Mode is turned on.
                        </p>
                    </div>
                </div>


                <!-- Contact details section -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Contact us Settings</h5>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>

                        <div class="row">
                            <!-- Contact details like address, google map, phone numbers and Email links here -->
                            <div class="col-lg-6">
                                <!-- Address here -->
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text" id="address"></p>
                                </div>

                                <!-- Google map of location here -->
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Maps</h6>
                                    <p class="card-text" id="gmap"></p>
                                </div>

                                <!-- Contacts here -->
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn1"></span>
                                    </p>
                                    <p class="card-text">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn2"></span>
                                    </p>
                                </div>

                                <!-- Email here -->
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                                    <p class="card-text" id="email"></p>
                                </div>

                            </div>

                            <!-- Social links and iframe link here -->
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social links</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-facebook me-1"></i>
                                        <span id="fb"></span>
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-instagram me-1"></i>
                                        <span id="insta"></span>
                                    </p>
                                    <p class="card-text">
                                        <i class="bi bi-twitter me-1"></i>
                                        <span id="tw"></span>
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iframe</h6>
                                    <iframe id="iframe" class="border p-2 w-100" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Contacts details button trigerring model -->
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">

                        <form id="contacts_s_form">

                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">Contacts Settings</h5>
                                </div>


                                <div class="modal-body">
                                    <div class="container-fluid p-0">
                                        <div class="row">

                                            <!-- This div contains settings for Contacts like Address, Google maps links, Phone numbers and email -->
                                            <div class="col-md-6">
                                                <!-- Address to edit -->
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Address</label>
                                                    <input type="text" name="address" id="address_inp" placeholder="Address" class="form-control shadow-none" required>
                                                </div>

                                                <!-- Google map link to edit -->
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Google Map Link</label>
                                                    <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none" required>
                                                </div>

                                                <!-- Phone numbers to edit -->
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Phone numbers (with country code)</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="number" name="pn1" id="pn1_inp" placeholder="Phone 1" class="form-control shadow-none" required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="number" name="pn2" id="pn2_inp" placeholder="Phone 2" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <!-- Email to edit -->
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Email</label>
                                                    <input type="email" name="email" id="email_inp" placeholder="Email" class="form-control shadow-none" required>
                                                </div>

                                            </div>

                                            <!-- This div contains settings for Contacts like Social media links and iframe of map -->
                                            <div class="col-md-6">

                                                <!-- Social links to edit -->
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Social Links</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                        <input type="text" name="fb" id="fb_inp" placeholder="Facebook link" class="form-control shadow-none" required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                        <input type="text" name="insta" id="insta_inp" placeholder="Instagram Link" class="form-control shadow-none" required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                                                        <input type="text" name="tw" id="tw_inp" placeholder="Twitter link" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <!-- iFrame to edit -->
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">iFrame Src</label>
                                                    <input type="text" name="iframe" id="iframe_inp" placeholder="Address" class="form-control shadow-none" required>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" onclick="contacts_inp(contacts_data)" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                                </div>


                            </div>

                        </form>
                    </div>
                </div>

                <!-- Management Team settings section -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Management Team Settings</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#team-s">
                                <i class="bi bi-person-plus-fill"></i> Add
                            </button>
                        </div>

                        <div class="row" id="team-data">
                            <!-- <div class="col-md-2 mb-3">
                                <div class="card bg-dark text-white">
                                    <img src="../images/about/hemant.JPG" class="card-img" alt="img">
                                    <div class="card-img-overlay text-end">
                                        <button type="button" class="btn btn-danger btn-sm shadow-none">
                                            <i class="bi bi-trash3-fill"></i> Delete
                                        </button>                                       
                                    </div>
                                    <p class="card-text text-center px-3 py-2">Hemant Dangol</p>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>

                <!--Management team Button trigerring model -->
                <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="team_s_form">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Team Members</h5>
                                </div>
                                <div class="modal-body">
                                    <!-- Member Name we add here -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" name="member_name" id="member_name_inp" placeholder="Member Name" class="form-control shadow-none" required>
                                    </div>

                                    <!-- Member Picture we add here -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Picture</label>
                                        <input type="file" name="member_picture" id="member_picture_inp" accept=".jpg, .JPG, .jfif, .svg, .png, .webp, .jpeg" placeholder="Member picture" class="form-control shadow-none" required>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="member_name.value='' , member_picture.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>



    <?php require('inc/script.php'); ?>

    <script src="scripts/settings.js"> </script>
    
</body>

</html>