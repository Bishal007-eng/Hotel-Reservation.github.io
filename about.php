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

<style>
    .box:hover {
        border-top-color: var(--teal) !important;
    }
</style>



<body class="bg-light">
    <!-- Linking Nav-bar(Header) here -->
    <?php require('include/header.php'); ?>

    <div class="my-5 px-4">

        <h2 class="fw-bold h-font text-center">ABOUT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
        We want to ensure you have all the details about our property and its amenities prior to your arrival <br> so you can have a wonderful stay from the very start.
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-2 order-2">
                <h3 class="mb-3">About Us</h3>
                <p>
                    Architecturally stunning, authentic Nepali in style the hotel features 285 beautifully appointed heritage & modern rooms, largest
                    casino in the city, wide range of fine dining options including authentic Nepali, Chinese, Indian and Italian with brilliantly
                    designed meeting spaces making it an ideal destination for business, leisure, and all celebrations.
                    You can host stylish banquets, conventions and conferences in one of the 10 elegant meeting rooms with space for 20 – 1200 people.
                    The hotel offers access to vast array of services and activities including visit to Pashupatinath Temple, Swoyambhunath Temple,
                    Kathmandu Durbar Square and hiking trips to the mountains, villages and panoramic destinations within the city, when you return
                    from your inspiring adventure sink into your room’s inviting warmth.
                </p>
            </div>

            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="images/about/IMG_30031.JPG" class="w-100" height="500px">
            </div>
        </div>
    </div>


    <!-- Rooms, customers, rating and staff icons here -->
    <div class="container mt-5">
        <div class="row">

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/facilities/Rooms.png" width="70px">
                    <h4 class="mt-3">100+ Rooms</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/facilities/customers.svg" width="70px">
                    <h4 class="mt-3">1000+ Customers</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/facilities/rating.svg" width="70px">
                    <h4 class="mt-3">500+ Reviews</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/facilities/staffs.jpg" width="70px">
                    <h4 class="mt-3">200+ Staffs</h4>
                </div>
            </div>

        </div>
    </div>

    <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>
    <div class="container px-4">

        <!-- Swiper for management team members -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">

            <?php  
                $about_r = selectAll('team_details');
                $path = ABOUT_IMG_PATH;

                while($row = mysqli_fetch_assoc($about_r))
                {
                    echo<<<data
                        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                            <img src="$path$row[picture]" alt="img" class="w-90" height="500px">
                            <h5 class="mt-2">$row[name]</h5>
                        </div>
                    data;
                }
            ?>                

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>


    <!-- Linking footer here -->
    <?php require('include/footer.php');  ?>

    <!-- Swiper JS script -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Swiper Initializer -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
            },
                      
        });
    </script>





</body>

</html>