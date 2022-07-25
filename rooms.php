<?php

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

</head>


<body class="bg-light">
    <!-- Linking Nav-bar(Header) here -->
    <?php require('include/header.php'); ?>

    <div class="my-5 px-4">

        <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            We want to ensure you have all the details about our property and its amenities prior to your arrival <br> so you can have a wonderful stay from the very start.
        </p>

    </div>

    <div class="container-fluid">
        <div class="row">

            <!-- This is nav bar for filtering our searches or simply say roooms -->
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column aligh-items-stretch">

                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse flex-column align-items-stretch" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                                <label class="form-label">Check-In</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Check-Out</label>
                                <input type="date" class="form-control shadow-none">
                            </div>

                            <!-- Facilities filter section -->
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>

                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-label" for="f1">Wi-fi</label>
                                </div>

                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                    <label class="form-label" for="f2">Laundry</label>
                                </div>

                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                    <label class="form-label" for="f3">Heated Swimming pool</label>
                                </div>
                            </div>

                            <!-- Guests Filter Section -->
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>

                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label">Adults</label>
                                        <input type="number" class="form-control shadow-none me-1">
                                    </div>

                                    <div>
                                        <label class="form-label">Childrens</label>
                                        <input type="number" class="form-control shadow-none me-1">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Room's Container -->
            <div class="col-lg-9 col-md-12 px-4">
                <?php

                    $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?",[1,0],'ii');

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

                        //print room  card

                        echo <<<data

                            <div class="card mb-4  border-0 shadow">
                                <div class="row g-0 p-3 align-items-center">
                                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">                            
                                        <img src="$room_thumb" class="w-80 d-block" height="250">                                      
                                    </div>
                            
                                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                        <h5 class="mb-3">$room_data[name]</h5>
                            
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
                                        <div class="guests">
                                            <h6 class="mb-1">Guests</h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                $room_data[adult] Adults
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                $room_data[children] Children
                                            </span>
                                        </div>
                                    </div>
                            
                                    <div class="col-md-2 mt-0 mt-md-0 mt-4 text-center">
                                        <div class="card-body">
                                            <h6 class="mb-4"> NRP $room_data[price]  per night</h6>
                                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                                            <a href="room_details.php?id=$room_data[id]" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        data;



                    }
                ?>



                <!-- Classic Heritage room -->
                <!-- <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3"> -->
                            <!-- Swiper images -->
                            <!-- <div class="container-fluid px-lg-3 mt-3 mb-3 px-3">
                                <div class="swiper swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="images/room_details/classic 1.jpg" class="w-80 d-block" height="250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/classic 2.jpg" class="w-80 d-block" height=" 250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/classic 3.jpg" class="w-80 d-block" height="250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/classic 4.jpg" class="w-80 d-block" height="250">
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Classic Heritage Room</h5> -->

                            <!-- Features section -->
                            <!-- <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                    1 Bathroom
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Beds
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Chair 2 Sofas
                                </span>
                            </div> -->

                            <!-- Facilities section -->
                            <!-- <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Telivision
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    A.C
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Hot water shower
                                </span>
                            </div> -->

                            <!-- Guests section -->
                            <!-- <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Children
                                </span>
                            </div>
                        </div>

                        <div class="col-md-2 mt-0 mt-md-0 mt-4 text-center">
                            <div class="card-body">
                                <h6 class="mb-4"> NRP 1000 per night</h6>
                                <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                                <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Club Room -->
                <!-- <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3"> -->
                            <!-- Swiper images -->
                            <!-- <div class="container-fluid px-lg-3 mt-3 mb-3 px-3">
                                <div class="swiper swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="images/room_details/club 1.jpg" class="w-80 d-block" height="250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/club 2.jpg" class="w-80 d-block" height=" 250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/club 3.jpg" class="w-80 d-block" height="250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/club 4.jpg" class="w-80 d-block" height="250">
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Club Room</h5> -->

                            <!-- Features section -->
                            <!-- <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                    1 Bathroom
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Beds
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 Chairs 1 sofa
                                </span>
                            </div> -->

                            <!-- Facilities section -->
                            <!-- <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Telivision
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    A.C
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Hot water shower
                                </span>
                            </div> -->

                            <!-- Guests section -->
                            <!-- <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    4 Children
                                </span>
                            </div>
                        </div>

                        <div class="col-md-2 mt-0 mt-md-0 mt-4 text-center">
                            <div class="card-body">
                                <h6 class="mb-4"> NRP 1000 per night</h6>
                                <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                                <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Execuite Suite -->
                <!-- <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3"> -->
                            <!-- Swiper images -->
                            <!-- <div class="container-fluid px-lg-3 mt-3 mb-3 px-3">
                                <div class="swiper swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="images/room_details/execuite suite 1.jpg" class="w-80 d-block" height="250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/execuite suite 2.jpg" class="w-80 d-block" height=" 250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/execuite suite 3.jpg" class="w-80 d-block" height="250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/execuite suite 4.jpg" class="w-80 d-block" height="250">
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Executive Suite</h5> -->

                            <!-- Features section -->
                            <!-- <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                    1 Bathroom
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 Beds
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 Sofas
                                </span>
                            </div> -->

                            <!-- Facilities section -->
                            <!-- <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Telivision
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    A.C
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Hot water shower
                                </span>
                            </div> -->

                            <!-- Guests section -->
                            <!-- <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Children
                                </span>
                            </div>
                        </div>

                        <div class="col-md-2 mt-0 mt-md-0 mt-4 text-center">
                            <div class="card-body">
                                <h6 class="mb-4"> NRP 2000 per night</h6>
                                <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                                <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Regal Suite -->
                <!-- <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3"> -->
                            <!-- Swiper images -->
                            <!-- <div class="container-fluid px-lg-3 mt-3 mb-3 px-3">
                                <div class="swiper swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="images/room_details/regal 1.jpg" class="w-80 d-block" height="250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/regal 2.jpg" class="w-80 d-block" height=" 250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/regal 3.jpg" class="w-80 d-block" height="250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/regal 4.jpg" class="w-80 d-block" height="250">
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Regal Suite</h5> -->

                            <!-- Features section -->
                            <!-- <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                    1 Bathroom
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Beds
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Large living space
                                </span>
                            </div> -->

                            <!-- Facilities section -->
                            <!-- <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Telivision
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    A.C
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Hot water shower
                                </span>
                            </div> -->

                            <!-- Guests section -->
                            <!-- <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Children
                                </span>
                            </div>
                        </div>

                        <div class="col-md-2 mt-0 mt-md-0 mt-4 text-center">
                            <div class="card-body">
                                <h6 class="mb-4"> NRP 3000 per night</h6>
                                <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                                <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- presidential Suite -->
                <!-- <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3"> -->
                            <!-- Swiper images -->
                            <!-- <div class="container-fluid px-lg-3 mt-3 mb-3 px-3">
                                <div class="swiper swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="images/room_details/presidential suite 1.jpg" class="w-80 d-block" height="250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/presidential suite 2.jpg" class="w-80 d-block" height=" 250">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="images/room_details/presidential suite 3.jpg" class="w-80 d-block" height="250">
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Presidential Suite</h5> -->

                            <!-- Features section -->
                            <!-- <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                    Glass Enclosed Shower
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Beds
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 Sofas
                                </span>
                            </div> -->

                            <!-- Facilities section -->
                            <!-- <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Telivision
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    A.C
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Hot water shower
                                </span>
                            </div> -->

                            <!-- Guests section -->
                            <!-- <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Children
                                </span>
                            </div>
                        </div>

                        <div class="col-md-2 mt-0 mt-md-0 mt-4 text-center">
                            <div class="card-body">
                                <h6 class="mb-4"> NRP 5000 per night</h6>
                                <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                                <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>

        </div>

    </div>



    <!-- Linking footer here -->
    <?php require('include/footer.php');  ?>


    <!-- Swiperjs Script -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper images -->
    <script>
        /* Swiper for top display with effect fade */
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            // navigation: {
            //     nextEl: ".swiper-button-next",
            //     prevEl: ".swiper-button-prev",
            // },
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            }

        });
    </script>


</body>

</html>