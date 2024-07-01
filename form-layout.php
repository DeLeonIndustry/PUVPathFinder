<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
   header("Location: sign-in.php");
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
   <!-- Wrapper Start -->
   <div class="wrapper">
      <!-- Sidebar  -->
      <?php include('partials/header.php'); ?>
      <!-- TOP Nav Bar -->
      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-12 col-lg-6 mx-auto">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Drivers Account Registration</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <p>Fill up drivers information.</p>
                        <form action="config/drivers-account-reg.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputText1">First Name<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Juan" Required>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputText1">Middle Name</label>
                                    <input type="text" class="form-control" name="mname" placeholder="A">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputText1">Surname<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="surname" placeholder="Dela Cruz" Required>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputText1">Suffix</label>
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
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputText1">Address<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="address" placeholder="18. Dacanay St. San Fermin, Cauayan City" Required>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputText1">Birthdate<span style="color:red;">*</span></label>
                                    <input type="date" name="dob" class="form-control" Required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputText1">Contact<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="contact" placeholder="(+63) 000 0000 000" Required>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputText1">Type of ID<span style="color:red;">*</span></label>
                                    <select type="text" name="idtype" class="form-control" Required>
                                        <option value="">Select ID Type</option>
                                        <option value="Passport">Passport</option>
                                        <option value="Driver's License">Driver's License</option>
                                        <option value="UMID">Unified Multi-Purpose ID (UMID)</option>
                                        <option value="Postal ID">Postal ID</option>
                                        <option value="Voter's ID">Voter's ID</option>
                                        <option value="PhilHealth ID">PhilHealth ID</option>
                                        <option value="Senior Citizen ID">Senior Citizen ID</option>
                                        <option value="PRC ID">PRC ID</option>
                                        <option value="SSS ID">SSS ID</option>
                                        <option value="GSIS ID">GSIS ID</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputText1">ID No.<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="idno" placeholder="XXXX XXXX XXXX XXXX" Required>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputText1">Email<span style="color:red;">*</span></label>
                                    <input type="email" class="form-control" name="email" placeholder="email@email.com" Required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputText1">Password<span style="color:red;">*</span></label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" Required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   </div>
   </div>
   </div>
   <!-- Wrapper END -->
   <!-- Footer -->
   <?php include('partials/footer.php'); ?>
   <!-- Footer END -->
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
   <!-- lottie JavaScript -->
   <script src="js/lottie.js"></script>
   <!-- Chart Custom JavaScript -->
   <script src="js/chart-custom.js"></script>
   <!-- Custom JavaScript -->
   <script src="js/custom.js"></script>
</body>

</html>