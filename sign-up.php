<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header("Location: index.php"); 
    exit();
}
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>PUV PathFinder</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
            <div class="loader">
               <div class="cube">
                  <div class="sides">
                     <div class="top"></div>
                     <div class="right"></div>
                     <div class="bottom"></div>
                     <div class="left"></div>
                     <div class="front"></div>
                     <div class="back"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page bg-white">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 align-self-center">
                        <div class="sign-in-from">
                            <h1 class="mb-0">Sign Up</h1>
                            <p>Fill up all the required details.</p>
                            <form action="config/commuters-account-reg.php" method="POST" class="mt-4">
                                <div class="form-group">
                                    <label for="exampleInputName">Name<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control mb-0" id="Name" name="name" placeholder="Juan" Required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMName">Middle Name</label>
                                    <input type="emtextail" class="form-control mb-0" id="mname" name="mname" placeholder="A" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLName">Surname<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control mb-0" id="lname" name="surname" placeholder="Dela Cruz" Required>
                                </div>
                                <div class="form-group">
                                    <label for="suffix">Suffix</label>
                                    <select type="text" class="form-control" name="suffix" placeholder="">
                                    <option value="">Select Suffix</option>
                                    <option value="Jr">Jr</option>
                                    <option value="Sr">Sr</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                 </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Email address<span style="color:red;">*</span></label>
                                    <input type="email" class="form-control mb-0" id="exampleInputEmail2" name="email" placeholder="Enter email" Required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password<span style="color:red;">*</span></label>
                                    <input type="password" class="form-control mb-0" id="exampleInputPassword1" name="password" placeholder="Password" Required>
                                </div>
                                <div class="d-inline-block w-100">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">I accept <a href="#">Terms and Conditions</a></label>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Sign Up</button>
                                </div>
                                <div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a href="sign-in.php">Login</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="sign-in-detail text-white" style="background: url(images/login/2.jpg) no-repeat 0 0; background-size: cover;">
                            <a class="sign-in-logo mb-5" href="#"><img src="images/logo-white.png" class="img-fluid" alt="logo"></a>
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="images/login/1.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Welcome to PUV PathFinder - Your Gateway to Seamless Experiences</h4>
                                    <p>Discover a platform designed to simplify your interactions and enhance your productivity. At Fleeting, we provide intuitive tools and a user-friendly interface to ensure you get the most out of your experience. Log in now to start your journey with us.</p>
                                <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="images/login/3.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Secure and Reliable - Your Data, Our Priority</h4>
                                    <p>Your security is our top priority. With advanced encryption and stringent security measures, PUV PathFinder ensures that your data remains safe and confidential. Join our community of trusted users and enjoy peace of mind with every login.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="js/waypoints.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="js/smooth-scrollbar.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="js/custom.js"></script>
   </body>
</html>