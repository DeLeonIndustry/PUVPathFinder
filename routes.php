<?php
include('config/database.php');
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php"); 
    exit();
}

// Determine the number of records per page
$records_per_page = 5;

// Determine the current page number
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($current_page - 1) * $records_per_page;

// Fetch the total number of records
$sql_total = "SELECT COUNT(*) FROM routes";
$result_total = $conn->query($sql_total);
$total_records = $result_total->fetch_array()[0];
$total_pages = ceil($total_records / $records_per_page);

$sql = "SELECT municipal, description, latitude, longitude, created_at FROM routes;";
$result = $conn->query($sql);
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Route List</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <div class="row justify-content-between">
                                <div class="col-sm-12 col-md-6">
                                    <div id="user_list_datatable_info" class="dataTables_filter">
                                        <form class="mr-3 position-relative">
                                            <div class="form-group mb-0">
                                                <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="user-list-files d-flex float-right">
                                        <a href="javascript:void();" class="chat-icon-phone">
                                            Print
                                        </a>
                                        <a href="javascript:void();" class="chat-icon-video">
                                            Excel
                                        </a>
                                        <a href="javascript:void();" class="chat-icon-delete">
                                            Pdf
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        <th>Municipal</th>
                                        <th>Description</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            
                                            echo "<tr>
                                                    <td>{$row["municipal"]}</td>
                                                    <td>{$row["description"]}</td>
                                                    <td>{$row["latitude"]}</td>
                                                    <td>{$row["longitude"]}</td>
                                                    <td>{$row["created_at"]}</td>
                                                    <td>
                                                        <div class='flex align-items-center list-user-action'>
                                                            <a data-toggle='tooltip' data-placement='top' title='' data-original-title='Edit' href='#'><i class='ri-pencil-line'></i></a>
                                                            <a data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete' href='#'><i class='ri-delete-bin-line'></i></a>
                                                        </div>
                                                    </td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='9' class='text-center'>No records found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-6">
                                <span>Showing <?php echo ($start_from + 1); ?> to <?php echo min($start_from + $records_per_page, $total_records); ?> of <?php echo $total_records; ?> entries</span>
                            </div>
                            <div class="col-md-6">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item <?php if($current_page == 1) echo 'disabled'; ?>">
                                            <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <?php for($page = 1; $page <= $total_pages; $page++) { ?>
                                            <li class="page-item <?php if($current_page == $page) echo 'active'; ?>">
                                                <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                                            </li>
                                        <?php } ?>
                                        <li class="page-item <?php if($current_page == $total_pages) echo 'disabled'; ?>">
                                            <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Close connection
$conn->close();
?>
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