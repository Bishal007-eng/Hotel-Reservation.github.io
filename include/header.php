<?php

    require('admin/inc/db_connect.php');
    require('admin/inc/essentials.php');

    $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no` = ?";
    $settings_q = "SELECT * FROM `settings` WHERE `sr_no` = ?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
    $settings_r = mysqli_fetch_assoc(select($settings_q, $values, 'i'));

?>






 <!--  Bootstrap code for Navbar with slight to more Adjustments  -->
 <nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">


     <!--px-lg-3 means padding on x co-ordinate i.e left and right side on large devices by 3, shadow-sm means small shadows and sticky top means navbar will not hide when page is scrolled down   -->
     <div class="container-fluid">
         <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php"><img src="images/logo.jpg" alt="Solti Hotel"></a>


         <!--me-5 is for margin on right side fw-bold is for bold font weight  fs-3 is for font sixe 3 -->
         <button class="navbar-toggler  shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                     <a class="nav-link me-2 fw-bold" href="index.php">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link me-2 fw-bold" href="rooms.php">Rooms</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link me-2 fw-bold" href="facilities.php">Facilities</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link me-2 fw-bold" href="contact.php">Contact US</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link me-2 fw-bold" href="about.php">About</a>
                 </li>
             </ul>


             <div class="d-flex">
                <?php  
                   if(isset($_SESSION['login']) && $_SESSION['login']==true)
                   {
                    $path = USERS_IMG_PATH;
                    echo<<<data
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-success shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <img src="$path$_SESSION[uPic]" style="width: 25px; height: 25px;" class="me-1">
                                $_SESSION[uName]
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="bookings.php">Bookings</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    data;
                   }

                   else
                   {
                    echo<<<data

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Login
                        </button>
                        <button type="button" class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                            Register
                        </button>

                    data;

                   }
                ?>
             </div>
         </div>
     </div>
 </nav>




 <!-- Modal for Login-->
 <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <form id="login-form">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title d-flex align-items-center">
                         <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                     </h5>
                     <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>

                 <!-- Email and password inputs here -->
                 <div class="modal-body">

                     <!-- Email -->
                     <div class="mb-3">
                         <!-- mb-3 means margin bottom -->
                         <label class="form-label">Email / Mobile</label>
                         <input type="text" name="email_mob" required class="form-control shadow-none">
                     </div>

                     <!-- Password -->
                     <div class="mb-4">
                         <label class="form-label">Password</label>
                         <input type="password" name="pass" required class="form-control shadow-none">
                     </div>

                     <!-- Login button and forgot password link here  -->
                     <div class="d-flex aling-items-center justify-content-between mb-3">
                         <button type="submit" class="btn btn-primary shadow-none">LOGIN</button>
                         <button type="button" class="btn text-secondary text-decoration-none shadow-none p-0" data-bs-toggle="modal" data-bs-target="#forgotModal" data-bs-dismiss="modal">
                            Forgot password ?
                         </button>
                     </div>
                 </div>
                 <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div> -->
             </div>
         </form>
     </div>
 </div>




 <!-- Modal for registration-->
 <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <form id="register-form">

             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title d-flex align-items-center">
                         <i class="bi bi-person-plus-fill fs-3 me-2"></i> User Registeration
                     </h5>
                     <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                         Note: Your details must match with your ID(Critizenship, Passport, Driving Lisence etc),
                         that will be required during Check-in.
                     </span>

                     <!-- Registration Contents like Name, Address, etc  -->
                     <div class="container-fluid">
                         <div class="row">

                             <!-- Name -->
                             <div class="col-md-6 ps-0 mb-3">
                                 <label class="form-label">Name</label>
                                 <input name="name" type="text" placeholder="Full Name" class="form-control shadow-none" required>
                             </div>

                             <!-- Email  -->
                             <div class="col-md-6 ps-0 mb-3">
                                 <label class="form-label ">Email</label>
                                 <input name="email" type="email" placeholder="E-mail" class="form-control shadow-none" required>
                             </div>

                             <!-- Phone Number -->
                             <div class="col-md-6 ps-0 mb-3">
                                 <label class="form-label ">Phone Number</label>
                                 <input name="phonenum" type="number" placeholder="Phone number" class="form-control shadow-none" required>
                             </div>

                             <!-- Picture -->
                             <div class="col-md-6 ps-0 mb-3">
                                 <label class="form-label ">Picture</label>
                                 <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>
                             </div>

                             <!-- Address -->
                             <div class="col-md-12 ps-0 mb-3">
                                 <label class="form-label ">Address</label>
                                 <textarea name="address" class="form-control shadow-none " rows="5" required></textarea>
                             </div>

                             <!-- Pin Code  -->
                             <div class="col-md-6 ps-0 mb-3">
                                 <label class="form-label ">Pin Code</label>
                                 <input name="pincode" type="number" placeholder="Pin Code" class="form-control shadow-none" required>
                             </div>

                             <!-- D.O.B  -->
                             <div class="col-md-6 ps-0 mb-3">
                                 <label class="form-label ">Date of Birth</label>
                                 <input name="dob" type="date" class="form-control shadow-none" required>
                             </div>

                             <!-- Password  -->
                             <div class="col-md-6 ps-0 mb-3">
                                 <label class="form-label ">Password</label>
                                 <input name="pass" type="password" placeholder="Password" class="form-control shadow-none" required>
                             </div>

                             <!-- Confirm Password  -->
                             <div class="col-md-6 ps-0 mb-3">
                                 <label class="form-label ">Confirm Password</label>
                                 <input name="cpass" type="password" placeholder="Confirm password" class="form-control shadow-none" required>
                             </div>
                         </div>
                     </div>

                     <!-- Submission button -->
                     <div class="text-center my-1">
                         <button type="submit" class="btn btn-primary shadow-none">SIGN UP</button>
                     </div>
                     <!-- <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control shadow-none">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control shadow-none">
                            </div>
                            <div class="d-flex aling-items-center justify-content-between mb-3">
                                <button type="submit" class="btn btn-primary shadow-none">LOGIN</button>
                                <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot password ?</a>
                            </div> -->
                 </div>

             </div>
         </form>
     </div>
 </div>



 <!-- forgot password modal  -->
 <div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <form id="forgot-form">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title d-flex align-items-center">
                         <i class="bi bi-person-circle fs-3 me-2"></i>Forgot Password
                     </h5>
                 </div>

                 <div class="modal-body">

                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        Note: A link will be sent to youe Email to reset your password !
                    </span>

                     <!-- Email -->
                     <div class="mb-4">
                         <label class="form-label">Email</label>
                         <input type="email" name="email" required class="form-control shadow-none">
                     </div>

                     <!-- Login button and forgot password link here  -->
                     <div class="mb-3 text-end">
                            <button type="button" class="btn shadow-none p-0 me-2" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">
                                CANCEL
                            </button>
                            <button type="submit" class="btn btn-primary shadow-none">SEND LINK</button>
                     </div>
                 </div>
                 <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div> -->
             </div>
         </form>
     </div>
 </div>