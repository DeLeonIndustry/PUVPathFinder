<?php
session_start();
include('config/database.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['admin_id'])) {
    header("Location: sign-in.php");
    exit();
}
$admin_id = $_SESSION['admin_id']; // Assuming you have stored the user ID in the session
$query = "SELECT * FROM accounts WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $admin_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
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
       
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         <?php if ($_SESSION['role'] === 'Admin') : ?>
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body profile-page p-0">
                           <div class="profile-header">
                              <div class="cover-container">
                                 <img src="images/page-img/profile-bg.jpg" alt="profile-bg" class="rounded img-fluid w-100"> 
                                 <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                 </ul>
                              </div>
                              <div class="profile-info p-4">
                                 <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                       <div class="user-detail pl-5">
                                          <div class="d-flex flex-wrap align-items-center">
                                             <div class="profile-img pr-4">
                                                <img src="images/user/11.png" alt="profile-img" class="avatar-130 img-fluid" />
                                             </div>
                                             <div class="profile-detail d-flex align-items-center">
                                                <h3><?php echo htmlspecialchars($_SESSION['admin_name']); ?></h3>
                                                <p class="m-0 pl-3"> - <?php echo htmlspecialchars($_SESSION['role']); ?></p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                       <ul class="nav nav-pills d-flex align-items-end float-right profile-feed-items p-0 m-0">
                                          <li>
                                             <a class="nav-link" href="profile-edit.php">Edit profile</a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php endif; ?>
         <?php if ($_SESSION['role'] === 'Driver' || $_SESSION['role'] === 'Commuters') : ?>
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body profile-page p-0">
                           <div class="profile-header">
                              <div class="cover-container">
                                 <img src="images/page-img/profile-bg.jpg" alt="profile-bg" class="rounded img-fluid w-100"> 
                                 <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                 </ul>
                              </div>
                              <div class="profile-info p-4">
                                 <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                       <div class="user-detail pl-5">
                                          <div class="d-flex flex-wrap align-items-center">
                                             <div class="profile-img pr-4">
                                                <img src="images/user/11.png" alt="profile-img" class="avatar-130 img-fluid" />
                                             </div>
                                             <div class="profile-detail d-flex align-items-center">
                                                <h3><?php echo htmlspecialchars($_SESSION['admin_name']); ?></h3>
                                                <p class="m-0 pl-3"> - <?php echo htmlspecialchars($_SESSION['role']); ?></p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                       <ul class="nav nav-pills d-flex align-items-end float-right profile-feed-items p-0 m-0">
                                          <li>
                                             <a class="nav-link" href="profile-edit.php">Edit profile</a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="row">
                        <div class="col-lg-3 profile-right">
                           <div class="iq-card iq-card-block iq-card-stretch">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">About</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <div class="about-info m-0 p-0">
                                    <div class="row">
                                       <div class="col-3">Email:</div>
                                       <div class="col-9"><?php echo $user['email']; ?></div>
                                       <div class="col-3">Phone:</div>
                                       <div class="col-9"><?php echo $user['contact']; ?></div>
                                       <div class="col-3">Address:</div>
                                       <div class="col-9"><?php echo $user['address']; ?></div>
                                       <div class="col-3">Birthdate</div>
                                       <div class="col-9"><?php echo $user['dob']; ?></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php endif; ?>
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
      <?php include('partials/footer.php');?>
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