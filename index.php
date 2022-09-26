<?php

    // use JetBrains\PhpStorm\Internal\ReturnTypeContract;

    include_once('connection.php');

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Soltee Hotel</title>

        <!--  Linking all the links  -->
        <?php require('include/links.php'); ?>

        <!--Swiperjs for swiping and changing images CDN link -->
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

        <style>
            .availability-form {
                margin-top: -50px;
                z-index: 2;
                position: relative;
            }

            @media screen and (max-width: 575px) {
                .availability-form {
                    margin-top: 20px;
                    padding: 0 35px;
                }
            }
        </style>


    </head>

    <body class="bg-light">


        <!-- Linking Nav-bar(Header) here -->
        <?php require('include/header.php'); ?>

        <!-- Swiper images -->
        <div class="container-fluid px-lg-4 mt-4">
            <div class="swiper swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    $res = selectAll('banner');
                    while ($row = mysqli_fetch_assoc($res)) {
                        $path  = BANNER_IMG_PATH;
                        echo <<<data
                                <div class="swiper-slide">
                                    <img src="$path$row[image]" class="w-100 d-block" height="500">
                                </div>
                            data;
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <!-- Rooms availability form -->
        <div class="container availability-form">
            <div class="row">
                <div class="col-lg-12 bg-white shadow p-4 rounded">
                    <h5 class="mb-4">Check Booking availability</h5>
                    <form>
                        <div class="row align-items-end">
                            <div class="col-lg-3 mb-3">
                                <label class="form-label" style="font-weight: 500;">Check-In</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label class="form-label" style="font-weight: 500;">Check-Out</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label class="form-label" style="font-weight: 500;">Adult</label>
                                <select class="form-select shadow-none">
                                    <!-- <option selected>Open this select menu</option> -->
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-lg-2 mb-3">
                                <label class="form-label" style="font-weight: 500;">Children</label>
                                <select class="form-select shadow-none">
                                    <!-- <option selected>Open this select menu</option> -->
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-lg-1 mb-lg-3 mt-2">
                                <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Room Section -->
        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>

        <div class="container">
            <div class="row">

                <?php

                    $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` LIMIT 3 ",[1,0],'ii');

                    while($room_data = mysqli_fetch_assoc($room_res))
                    {
                        //getting features from room

                        $fea_q = mysqli_query($conn,"SELECT f.name FROM `features` f INNER JOIN `room_features` 
                        rfea ON f.id = rfea.features_id WHERE rfea.room_id = '$room_data[id]'");  
                        
                        $features_data = "";
                        while($fea_row = mysqli_fetch_assoc($fea_q))
                        {
                            $features_data .="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>$fea_row[name]</span>";
                        }
                    
                        
                        //getting facilities from room

                        $fac_q = mysqli_query($conn, "SELECT f.name FROM `facilities` f INNER JOIN `room_facilities` 
                        rfac ON f.id = rfac.facilities_id WHERE rfac.room_id = '$room_data[id]'");

                        $facilities_data = "";
                        while($fac_row = mysqli_fetch_assoc($fac_q))
                        {
                            $facilities_data .="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>$fac_row[name]</span>";
                        }

                        //getting thumbnail for the rooms

                        $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                        $thumb_q = mysqli_query($conn, "SELECT * FROM `room_images` WHERE `room_id`='$room_data[id]' AND
                        `thumb` ='1' ");

                        if(mysqli_num_rows($thumb_q)>0)
                        {
                            $thumb_res = mysqli_fetch_assoc($thumb_q);
                            $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
                        }

                        $book_btn = " ";
                        if(!$settings_r['shutdown']){
                            $book_btn = "<a href='#' class='btn btn-sm text-white custom-bg shadow-none'>Book Now</a>";
                        }

                        //print room  card

                        echo <<<data

                            <div class="col-lg-4 col-md-6 my-3">
                                
                                <!-- Executive Room -->
                                <!-- col-md-6 is for column on medium devices -->
                                <div class="card border-0 shadow" style="max-width: 400px; height: 700px; margin: auto;">
                                    <img src="$room_thumb" class="card-img-top" style="height:250px;">

                                    <div class="card-body">
                                        <h5>$room_data[name]</h5>
                                        <h6 class="mb-4"> NRP $room_data[price] per night</h6>

                                        <!-- Features section -->
                                        <div class="features mb-3">
                                            <h6 class="mb-1">Features</h6>
                                            $features_data
                                        </div>

                                        <!-- Facilities section -->
                                        <div class="facilities mb-3">
                                            <h6 class="mb-1">Facilities</h6>
                                            $facilities_data
                                        </div>

                                        <!-- Guests section -->
                                        <div class="guests mb-3">
                                            <h6 class="mb-1">Guests</h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                $room_data[adult] Adults
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                $room_data[children] Children
                                            </span>
                                        </div>

                                        <!-- Rating section -->
                                        <div class="rating mb-3">
                                            <h6 class="mb-1">Rating</h6>
                                            <span class="badge rounded-pill bg-light">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-half text-warning"></i>
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-evenly mb-2">
                                            $book_btn
                                            <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        data;



                    }
                ?>


                
                <!-- Classic Heritage Room -->
                <!-- <div class="col-lg-4 col-md-6 my-3"> -->
                    <!-- col-md-6 is for column on medium devices -->
                    <!-- <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                        <img src="images/rooms/2.jfif" class="card-img-top" alt="room 2">

                        <div class="card-body">
                            <h5>Classic Heritage Room</h5>
                            <h6 class="mb-4"> NRP 1000 per night</h6> -->

                            <!-- Features section -->
                            <!-- <div class="features mb-4">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    1 Bathroom
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Beds
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 chairs 1 sofa
                                </span>
                            </div> -->

                            <!-- Facilities section -->
                            <!-- <div class="facilities mb-4">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Telivision
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    A.C
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Hot water shower
                                </span>
                            </div> -->

                            <!-- Guests section -->
                            <!-- <div class="guests mb-4">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Childrens
                                </span>
                            </div> -->

                            <!-- Rating section -->
                            <!-- <div class="rating mb-4">
                                <h6 class="mb-1">Rating</h6>
                                <span class="badge rounded-pill bg-light">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                </span>
                            </div>

                            <div class="d-flex justify-content-evenly mb-2">
                                <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                                <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                            </div>

                        </div>

                    </div>

                </div> -->

                <!-- Club Room -->
                <!-- <div class="col-lg-4 col-md-6 my-3"> -->
                    <!-- col-md-6 is for column on medium devices -->
                    <!-- <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                        <img src="images/rooms/3.jfif" class="card-img-top" alt="room 3">

                        <div class="card-body">
                            <h5>Club Room</h5>
                            <h6 class="mb-4"> NRP 1000 per night</h6> -->

                            <!-- Features section -->
                            <!-- <div class="features mb-4">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    1 Bathroom
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    1 Balcony
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Beds
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    3 Chairs 1 Sofa
                                </span>
                            </div> -->

                            <!-- Facilitiess section -->
                            <!-- <div class="facilities mb-4">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Telivision
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    A.C
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Hot water shower
                                </span>
                            </div> -->

                            <!-- Guests section -->
                            <!-- <div class="guests mb-4">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    4 Childrens
                                </span>
                            </div> -->

                            <!-- Rating section -->
                            <!-- <div class="rating mb-4">
                                <h6 class="mb-1">Rating</h6>
                                <span class="badge rounded-pill bg-light">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-half text-warning"></i>
                                </span>
                            </div>

                            <div class="d-flex justify-content-evenly mb-2">
                                <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                                <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                            </div>

                        </div>

                    </div>

                </div> -->

                <div class="col-lg-12 text-center mt-3">
                    <a href="rooms.php" class="btn btn-sm btn-primary rounded-0 fw-bold shadow-none">More Rooms >></a>
                </div>
            </div>
        </div>

        <!-- Facilities Section -->
        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>

        <div class="container">
            <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            
                <?php 
                    $res = mysqli_query($conn,"SELECT * FROM `facilities` ORDER BY `id` LIMIT 5 ");
                    $path = FACILITIES_IMG_PATH;

                    while($row = mysqli_fetch_assoc($res))
                    {
                        echo<<<data

                            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                                <img src="$path$row[icon]" alt="img" width="80px">
                                <h5 class="mt-3">$row[name]</h5>                            
                            </div>

                            
            

                        data;

                    }
                ?>


                <!-- Wifi facility -->
                <!-- <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/facilities/wifi.png" alt="img" width="80px">
                    <h5 class="mt-3">Wifi</h5>                            
                </div> -->

                <!-- Valet Parking facility -->
                <!-- <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/facilities/valet parking.png" alt="img" width="80px">
                    <h5 class="mt-3">Valet Parking</h5>

                </div> -->

                <!-- Swimming Pool facility -->
                <!-- <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/facilities/swimming pool.png" alt="img" width="80px">
                    <h5 class="mt-3">Swimming Pool</h5>

                </div> -->

                <!-- Bar facility -->
                <!-- <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/facilities/bar.png" alt="img" width="80px">
                    <h5 class="mt-3">Bar</h5>

                </div> -->

                <!-- Laundry facility -->
                <!-- <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/facilities/laundry.png" alt="img" width="80px">
                    <h5 class="mt-3">Laundry Service</h5>

                </div> -->

                <!-- More facility -->
                <div class="col-lg-12 text-center mt-5">
                    <a href="facilities.php" class="btn btn-sm btn-primary rounded-0 fw-bold shadow-none">More Facilities >></a>
                </div>

            </div>
        </div>

        <!-- Testimonial Section-->
        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>

        <!-- Swiper for Testimonials-->
        <div class="container mt-5">
            <div class="swiper swiper-testimonials">
                <div class="swiper-wrapper mb-5">

                    <!-- Ujwal Thapa's Review -->
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center mb-3">
                            <img src="images/testimonials/ujwal.jpg" alt="img" width="60px">
                            <h6 class="m-0 ms-2">Ujwal Thapa</h6>
                        </div>
                        <p> They were extremely accommodating and allowed us to check in early at like 10am. We got to hotel
                            super early and I didn’t wanna wait.
                            So this was a big plus. The sevice was exceptional as well. Would definitely send a friend
                            there.</p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                        </div>
                    </div>

                    <!-- Kushal Rijal's Review -->
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center mb-3">
                            <img src="images/testimonials/kushal.jpg" alt="img" width="60px">
                            <h6 class="m-0 ms-2">Kushal Rijal</h6>
                        </div>
                        <p>The staff was the nicest staff I have ever encountered at a hotel. They were always friendly and
                            asked how our stay was going every time we walked in the door.
                            They also were able to recommend places to get any type of meal that we needed as well.</p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                        </div>
                    </div>

                    <!-- Pramesh Maharjan's Review -->
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center mb-3">
                            <img src="images/testimonials/pramesh.jpg" alt="img" width="60px">
                            <h6 class="m-0 ms-2">Pramesh Maharjan</h6>
                        </div>
                        <p>Beautiful downtown hotel with nice roof top bar. Rooms have historic feel with old hard wood
                            floors, yet modern as bathrooms have white
                            subway tiles with TVs in each bathroom. Staff is wonderful and accommodating providing upgrades
                            when available.</p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                    </div>

                    <!-- Pramila Bhandari's Review -->
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center mb-3">
                            <img src="images/testimonials/Pramila.JPG" alt="img" width="60px">
                            <h6 class="m-0 ms-2">Pramila Bhandari</h6>
                        </div>
                        <p>The staff at The Soltee Hotel was GREAT -- so helpful, friendly and accommodating! The food was terrific, we especially enjoyed our
                            dinners there and looked forward to them every day! <br>
                            <br> The only issue i had was that the internet was a bit week and patchy at times.
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                        </div>
                    </div>

                    <!-- Sumi Bhatta's Review -->
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center mb-3">
                            <img src="images/testimonials/sumi.JPG" alt="img" width="60px">
                            <h6 class="m-0 ms-2">Sumi Bhatta</h6>
                        </div>
                        <p>This hotel is perfect and matches all my expectations for what I paid. Friendly staff, nice cozy room.
                            Breakfast is awesome. I will definitely come back here when I will be in Kathmandu. Recommended to everyone.
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                        </div>
                    </div>

                    <!-- Hemant Dangol's Review -->
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center mb-3">
                            <img src="images/testimonials/hemant.JPG" alt="img" width="70px" height="50px">
                            <h6 class="m-0 ms-2">Hemant Dangol</h6>
                        </div>
                        <p>
                            Rooms were clean, well equipped. Family friendly place. Location was great. Staffs were friendly.
                            <br>
                            <br>

                            The bad side i faced was that there was not enough space for Parking. we were ensured we would get a proper parking during
                            the night, but our car was left outside on the roadside for parking.
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="about.php" class="btn btn-sm btn-primary rounded-0 fw-bold shadow-none">Know More >></a>
            </div>


        </div>

        <!-- Reach Us Section -->

        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>
        <div class="container">
            <div class="row">
                <!-- Real time Map -->
                <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-4 bg-white rounded">
                    <iframe class="w-100 rounded" height="350px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy"></iframe>
                </div>

                <!-- Call us and Follo us are kept inside this division -->
                <div class="col-lg-4 col-md-4">
                    <!-- Call us Tab here -->
                    <div class="bg-white p-4 rounded mb-4">
                        <h5>Call Us</h5>
                        <a href="tel:+977-<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                            <i class="bi bi-telephone-fill"></i>+977-<?php echo $contact_r['pn1'] ?>
                        </a>
                        <br>
                        <?php
                        if ($contact_r['pn2'] != '') {
                            echo <<<data
                                    <a href="tel:+977-$contact_r[pn2]" class="d-inline-block text-decoration-none text-dark">
                                        <i class="bi bi-telephone-fill"></i>+977-$contact_r[pn2]
                                    </a>
                                    data;
                        }
                        ?>

                    </div>

                    <!-- Follow us tab here -->
                    <div class="bg-white p-4 rounded mb-4">
                        <h5>Follow us</h5>
                        <?php
                        if ($contact_r['tw'] != '') {
                            echo <<<data
                                    <a href="$contact_r[tw]" class="d-inline-block mb-3">
                                        <span class="badge bg-light text-dark fs-6 p-2">
                                            <i class="bi bi-twitter me-1 btn-primary"></i> Twitter
                                        </span>
                                    </a><br>
                                data;
                        }
                        ?>
                        <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block mb-3">
                            <span class="badge bg-light text-dark fs-6 p-2">
                                <i class="bi bi-instagram me-1 btn-danger"></i> Instagram
                            </span>
                        </a><br>
                        <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3">
                            <span class="badge bg-light text-dark fs-6 p-2">
                                <i class="bi bi-facebook me-1 btn-primary"></i> facebook
                            </span>
                        </a>
                    </div>
                </div>


                <div class="col-lg-12 text-center mt-5">
                    <a href="contact.php" class="btn btn-sm btn-primary rounded-0 fw-bold shadow-none">Reach us >></a>
                </div>
            </div>
        </div>


        <!-- Password reset modal  -->
        <div class="modal fade" id="recoveryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="recovery-form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title d-flex align-items-center">
                                <i class="bi bi-shield-lock-fill fs-3 me-2"></i>Setup new Password
                            </h5>
                        </div>

                        <div class="modal-body">

                            <div class="mb-4">
                                <label class="form-label">New Password</label>
                                <input type="password" name="pass" required class="form-control shadow-none">
                                <input type="hidden" name="email">
                                <input type="hidden" name="token">
                            </div>

                            <!-- Login button and forgot password link here  -->
                            <div class="mb-3 text-end">
                                <button type="button" class="btn shadow-none me-2" data-bs-dismiss="modal">
                                    CANCEL
                                </button>
                                <button type="submit" class="btn btn-primary shadow-none">Reset</button>
                            </div>
                        </div>                        
                    </div>
                </form>
            </div>
        </div>


        <!-- Linking footer here -->
        <?php require('include/footer.php');  ?>

        <?php 
            if(isset($_GET['account_recovery']))
            {
                $data = filteration($_GET);

                $t_date = date("Y-m-d");

                $query = select("SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? AND `t_expire`=? LIMIT 1",
                [$data['email'],$data['token'],$t_date],'sss');

                if(mysqli_num_rows($query)==1)
                {
                    echo<<<showModal
                        <script>
                            var myModal = document.getElementById('recoveryModal');

                            myModal.querySelector("input[name='email']").value = '$data[email]';
                            myModal.querySelector("input[name='token']").value = '$data[token]';

                            var modal = bootstrap.Modal.getOrCreateInstance(myModal);
                            modal.show();
                        </script>

                    showModal;
                }
                else
                {
                    alert("error", "The link has Expired !!");
                }

            }
        ?>



        <!-- Swiperjs Script -->
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper images -->
        <script>
            /* Swiper for top display with effect fade */
            var swiper = new Swiper(".swiper-container", {
                spaceBetween: 30,
                effect: "fade",
                loop: true,
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                }
            });

            /* Swiper for Testimonials with Effect Coverflow  */
            var swiper = new Swiper(".swiper-testimonials", {
                effect: "coverflow",
                grabCursor: true,
                loop: true,
                centeredSlides: true,
                slidesPerView: "auto",
                slidesPerView: "3",
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true,
                },
                pagination: {
                    el: ".swiper-pagination",
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                    },
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                }
            });

            //recover account
            let recovery_form = document.getElementById('recovery-form');

            recovery_form.addEventListener('submit', function(e) 
            {
                e.preventDefault();

                let data = new FormData();

                data.append('email', recovery_form.elements['email'].value);
                data.append('token', recovery_form.elements['token'].value);
                data.append('pass', recovery_form.elements['pass'].value);
                data.append('recover_user', '');


                var myModal = document.getElementById('recoveryModal');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();


                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/login_register.php", true);


                xhr.onload = function() {
                    if (this.responseText == 'failed') {
                        alert('error', "Reset Failed!!");
                    } 
                    else {
                        alert('success', "Reset Success!!");
                        recovery_form.reset();
                    }

                }

                xhr.send(data);
            });

        </script>

    </body>

</html>