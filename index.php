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
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
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
      <?php if ($_SESSION['role'] === 'Admin'): ?>
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6 col-lg-3">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                     <div class="iq-card-body pb-0">
                        <div class="rounded-circle iq-card-icon iq-bg-primary"><i class="ri-exchange-dollar-fill"></i></div>
                        <span class="float-right line-height-6">Net Worth</span>
                        <div class="clearfix"></div>
                        <div class="text-center">
                           <h2 class="mb-0"><span class="counter">65</span><span>M</span></h2>
                           <p class="mb-0 text-secondary line-height"><i class="ri-arrow-up-line text-success mr-1"></i><span class="text-success">10%</span> Increased</p>
                        </div>
                     </div>
                     <div id="chart-1"></div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-3">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                     <div class="iq-card-body pb-0">
                        <div class="rounded-circle iq-card-icon iq-bg-warning"><i class="ri-bar-chart-grouped-line"></i></div>
                        <span class="float-right line-height-6">Todays Gains</span>
                        <div class="clearfix"></div>
                        <div class="text-center">
                           <h2 class="mb-0"><span>$</span><span class="counter">4500</span></h2>
                           <p class="mb-0 text-secondary line-height"><i class="ri-arrow-up-line text-success mr-1"></i><span class="text-success">20%</span> Increased</p>
                        </div>
                     </div>
                     <div id="chart-2"></div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-3">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                     <div class="iq-card-body pb-0">
                        <div class="rounded-circle iq-card-icon iq-bg-success"><i class="ri-group-line"></i></div>
                        <span class="float-right line-height-6">Total Users</span>
                        <div class="clearfix"></div>
                        <div class="text-center">
                           <h2 class="mb-0"><span class="counter">96.6</span><span>K</span></h2>
                           <p class="mb-0 text-secondary line-height"><i class="ri-arrow-up-line text-success mr-1"></i><span class="text-success">30%</span> Increased</p>
                        </div>
                     </div>
                     <div id="chart-3"></div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-3">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                     <div class="iq-card-body pb-0">
                        <div class="rounded-circle iq-card-icon iq-bg-danger"><i class="ri-shopping-cart-line"></i></div>
                        <span class="float-right line-height-6">Orders Received</span>
                        <div class="clearfix"></div>
                        <div class="text-center">
                           <h2 class="mb-0"><span class="counter">15.5</span><span>K</span></h2>
                           <p class="mb-0 text-secondary line-height"><i class="ri-arrow-down-line text-danger mr-1"></i><span class="text-danger">10%</span> Increased</p>
                        </div>
                     </div>
                     <div id="chart-4"></div>
                  </div>
               </div>
            </div>
            <div id="map" style="height: 500px; margin-bottom: 15px;"></div>
            <script>
               var map = L.map('map').setView([16.936249, 121.769288], 13);
               L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
               }).addTo(map);
               var marker = L.marker([16.936249, 121.769288]).addTo(map);
            </script>
         </div>
      </div>
   </div>
   <?php endif; ?>
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