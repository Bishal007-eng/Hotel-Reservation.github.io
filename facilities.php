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

    </head>

    <style>
        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>

    <body class="bg-light">
        <!-- Linking Nav-bar(Header) here -->
        <?php require('include/header.php'); ?>

        <div class="my-5 px-4">

            <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
            <div class="h-line bg-dark"></div>
            <p class="text-center mt-3">
                We want to ensure you have all the details about our property and its amenities prior to your arrival <br> so you can have a wonderful stay from the very start.
            </p>
        </div>

        <div class="container">
            <div class="row">

            <?php 
                $res = selectAll('facilities');
                $path = FACILITIES_IMG_PATH;

                while($row = mysqli_fetch_assoc($res))
                {
                    echo<<<data
                        <!-- Wi-fi -->
                        <div class="col-lg-4 col-md-6 mb-5 px-4">
                            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="$path$row[icon]" alt="img" width="40px">
                                    <h5 class="m-0 ms-3 fw-bold">$row[name]</h5>
                                </div>
                                <p>
                                    $row[description]
                                </p>
                            </div>
                        </div>
        

                    data;

                }
            ?>

                <!-- Wi-fi -->
                <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                        <div class="d-flex align-items-center mb-2">
                            <img src="images/facilities/wifi.png" alt="img" width="40px">
                            <h5 class="m-0 ms-3">Wi-fi</h5>
                        </div>
                        <p>
                            Since the world is connecting and growing rapidly, Our customers wants to know the world better and connect with everyone. We at Soltee Hotel, Provide you with the best ISP with a blazing speed with which you can get online without any problem.
                            you can get connected to the Wi-fi and be happyly online sharing your experiences.
                        </p>
                    </div>
                </div> -->

                <!-- Valet Parking -->
                <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                        <div class="d-flex align-items-center mb-2">
                            <img src="images/facilities/valet parking.png" alt="img" width="40px">
                            <h5 class="m-0 ms-3">Valet Parking</h5>
                        </div>
                        <p>
                            Valet parking facilities are secure and have professional members of staff who handle your car with care, meaning you will return to find your car in exactly the same condition as you left it. Make Your Reservation in Just 2 Minutes Once you have found your ideal parking, booking takes just a couple of minutes.
                        </p>
                    </div>
                </div> -->

                <!-- Swimming -->
                <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                        <div class="d-flex align-items-center mb-2">
                            <img src="images/facilities/swimming pool.png" alt="img" width="40px">
                            <h5 class="m-0 ms-3">swimming</h5>
                        </div>
                        <p>
                            Guests staying at hotel may use the swimming pool area free of charge. Current admission fees and detailed information is provided by the Swimming Pool Reception Desk. Proper swimming costume is a must for using the swimming pool facilities.
                            Do not apply any lotion/cream on the body before entering the pool.
                        </p>
                    </div>
                </div> -->

                <!-- Bar -->
                <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                        <div class="d-flex align-items-center mb-2">
                            <img src="images/facilities/bar.png" alt="img" width="40px">
                            <h5 class="m-0 ms-3">Bar</h5>
                        </div>
                        <p>
                            Sample some fine vintages at our comfortable air-conditioned indoor main bar. Our wines perfectly complement the meals we serve and cater to all tastes and the icy cold beers help take the edge off a hot day. Pull up a chair and
                            get yourself a great vantage point to experience all the current world live sporting events on the big screens throughout.
                        </p>
                    </div>
                </div> -->

                <!-- Laundry -->
                <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                        <div class="d-flex align-items-center mb-2">
                            <img src="images/facilities/laundry.png" alt="img" width="40px">
                            <h5 class="m-0 ms-3">Laundry</h5>
                        </div>
                        <p>
                            We also provide the Laundry Service for Our Guests. The best Laundry service yet, where all the dirty clothes of our guests are cleaned and provided back to the guests in a well mannered and in good condition.
                            You can have a nice stay at The Soltee hotel and not worry about the dirty clothes as they will be properly handled and returned back to your room.
                        </p>
                    </div>
                </div> -->

                <!-- Fitness Center -->
                <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                        <div class="d-flex align-items-center mb-2">
                            <img src="images/facilities/gym.png" alt="img" width="40px">
                            <h5 class="m-0 ms-3">Fitness Center</h5>
                        </div>
                        <p>
                            Maintaining your routine while traveling is important, especially when you’re short on time and on the go. We get it. The right workout—right when you want it—helps you stay focused, energized and on top of your game. So, Guests staying at The Soaltee Kathmandu can recharge and feel ready for anything with our fully equipped fitness center and wellness options.
                        </p>
                    </div>
                </div> -->
            </div>
        </div>



        <!-- Linking footer here -->
        <?php require('include/footer.php');  ?>





    </body>

</html>