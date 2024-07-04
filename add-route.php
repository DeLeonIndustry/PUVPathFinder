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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
        }
    </style>
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
                                    <h4 class="card-title">Routes</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <p>Fill up Route.</p>
                                <form action="config/add-route.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputText1">Municipal<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="municipal" placeholder="Municipal" Required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputText1">Terminal</label>
                                            <input type="text" class="form-control" name="terminal" placeholder="(i.e. SM Cauayan)">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="latitude">Latitude<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="" required>
                                            <button id="openMapModal" style="margin-top: 10px;" class="btn btn-success">Get Location</button>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="longitude">Longitude<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="" required>
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
        <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mapModalLabel">Select Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="map"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map;
            var latitudeInput = document.getElementById('latitude');
            var longitudeInput = document.getElementById('longitude');
            var mapModal = $('#mapModal');

            mapModal.on('shown.bs.modal', function () {
                if (!map) {
                    map = L.map('map').setView([16.936249, 121.769288], 13);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    map.on('click', function(e) {
                        var lat = e.latlng.lat;
                        var lng = e.latlng.lng;
                        latitudeInput.value = lat;
                        longitudeInput.value = lng;
                        mapModal.modal('hide');
                    });
                } else {
                    setTimeout(function() {
                        map.invalidateSize();
                    }, 10);
                }
            });

            document.getElementById('openMapModal').addEventListener('click', function() {
                mapModal.modal('show');
            });
        });
    </script>
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