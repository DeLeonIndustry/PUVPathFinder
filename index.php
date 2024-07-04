<?php
session_start();
include('config/database.php');
include('config/function.php');

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
   <link rel="stylesheet" href="css/toogle.css">
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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

      <!-- ADMIN -->
      <?php if ($_SESSION['role'] === 'Admin') : ?>
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                        <div class="iq-card-body pb-0">
                           <div class="rounded-circle iq-card-icon iq-bg-primary"><i class="ri-exchange-dollar-fill"></i></div>
                           <span class="float-right line-height-6">Routes</span>
                           <div class="clearfix"></div>
                           <div class="text-center">
                              <h2 class="mb-0"><span class="counter"><?php echo $locations_count; ?></h2>
                           </div>
                        </div>
                        <br><br>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                        <div class="iq-card-body pb-0">
                           <div class="rounded-circle iq-card-icon iq-bg-warning"><i class="ri-bar-chart-grouped-line"></i></div>
                           <span class="float-right line-height-6">Drivers</span>
                           <div class="clearfix"></div>
                           <div class="text-center">
                              <h2 class="mb-0"><span class="counter"><?php echo $driver_count; ?></span></h2>
                           </div>
                        </div>
                        <br><br>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                        <div class="iq-card-body pb-0">
                           <div class="rounded-circle iq-card-icon iq-bg-success"><i class="ri-group-line"></i></div>
                           <span class="float-right line-height-6">Commuters</span>
                           <div class="clearfix"></div>
                           <div class="text-center">
                           <h2 class="mb-0"><span class="counter"><?php echo $commuter_count; ?></span></h2>
                           </div>
                        </div>
                        <br><br>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                        <div class="iq-card-body pb-0">
                           <div class="rounded-circle iq-card-icon iq-bg-danger"><i class="ri-shopping-cart-line"></i></div>
                           <span class="float-right line-height-6">In Route</span>
                           <div class="clearfix"></div>
                           <div class="text-center">
                           <h2 class="mb-0"><span class="counter"><?php echo $drivers_in_route_count; ?></span></h2>
                           </div>
                        </div>
                     <br><br>
                     </div>
                  </div>
               </div>
               <div id="map" style="height: 500px; margin-bottom: 15px;"></div>
               <script>
                  var map = L.map('map').setView([16.936249, 121.769288], 13);
                  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
               </script>
            </div>
         </div>
      <?php endif; ?>

      <?php if ($_SESSION['role'] === 'Driver') : ?>
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Route</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div id="map" style="height: 500px; margin-bottom: 15px; z-index: 0;"></div>
                           <script>
                              var map = L.map('map').setView([16.936249, 121.769288], 13);
                              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
                           </script>
                           <form action="config/driver-update.php" method="POST">
                              <div class="form mt-3">
                                 <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label for="currentLocation">Current Location</label>
                                       <select id="currentLocation" name="curloc" class="form-control">
                                          <option selected>Choose...</option>
                                          <?php while ($location = $locations_result->fetch_assoc()) : ?>
                                             <option value="<?php echo htmlspecialchars($location['municipal'] . ' - ' . $location['terminal']); ?>">
                                                <?php echo htmlspecialchars($location['municipal'] . ' - ' . $location['terminal']); ?>
                                             </option>
                                          <?php endwhile; ?>
                                       </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="selectRoute">Select Route</label>
                                       <select id="selectRoute" name="route" class="form-control">
                                          <option selected>Choose...</option>
                                          <?php while ($routes = $routes_result->fetch_assoc()) : ?>
                                             <option value="<?php echo htmlspecialchars($routes['municipal'] . ' - ' . $routes['terminal']); ?>">
                                                <?php echo htmlspecialchars($routes['municipal'] . ' - ' . $routes['terminal']); ?>
                                             </option>
                                          <?php endwhile; ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label for="inQueue">Queue Status</label>
                                       <select id="inQueue" name="qstat" class="form-control">
                                          <option selected>Select Queue Status</option>
                                          <option value="In Queue">In Queue</option>
                                          <option value="Departing">Departing</option>
                                          <option value="Departed">Departed</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="currentLocation">Active Status</label>
                                       <select id="currentLocation" name="status" class="form-control">
                                          <option selected>Select Active Status</option>
                                          <option value="1">Active</option>
                                          <option value="0">Inactive</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <button type="submit" class="btn btn-primary float-right">Save</button>
                                    </div>
                                 </div>
                              </div>
                        </div>
                     </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>

   </div>
<?php endif; ?>

<!-- COMMUTERS -->
<?php if ($_SESSION['role'] === 'Commuters') : ?>
   <div id="content-page" class="content-page">
      <div class="container-fluid">

         <div id="map" style="height: 500px; margin-bottom: 15px; z-index: 0;"></div>
         <script>
            var map = L.map('map').setView([16.936249, 121.769288], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
         </script>
      </div>
   </div>
<?php endif; ?>
</div>

<!-- Wrapper END -->
<!-- Footer -->
<?php include('partials/footer.php'); ?>
<!-- Footer END -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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