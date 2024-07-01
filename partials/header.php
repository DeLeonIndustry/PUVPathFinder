<?php

if (!isset($_SESSION['admin_id'])) {
    header("Location: sign-in.php");
    exit();
}
?>
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="index.php">
            <img src="images/logo.png" class="img-fluid" alt="">
            <span>PathFinder</span>
        </a>

</div>
<div id="sidebar-scrollbar">
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
        <?php if ($_SESSION['role'] === 'Admin'): ?>
            <li class="iq-menu-title"><i class="ri-separator"></i><span>Main</span></li>
            <li>
                <a href="index.php" class="iq-waves-effect collapsed" aria-expanded="false"><i class="ri-home-4-line"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="profile.php" class="iq-waves-effect collapsed" aria-expanded="false"><i class="ri-user-line"></i><span>Profile</span></a>
            </li>
            <li>
                <a href="form-layout.php" class="iq-waves-effect collapsed" aria-expanded="false"><i class="ri-profile-line"></i><span>Driver Registration</span></a>
            </li>
            <li>
                <a href="#tables" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-map-line"></i><span>Routes</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="tables" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="routes.php">Routes</a></li>
                    <li><a href="drivers.php">Add Routes</a></li>
                </ul>
            </li>
            <li>
                <a href="#tables" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-table-line"></i><span>Lists</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="tables" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="drivers.php">Driver List</a></li>
                    <li><a href="commuters.php">Commuters List</a></li>
                </ul>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
        <?php if ($_SESSION['role'] === 'Driver'): ?>
            <li class="iq-menu-title"><i class="ri-separator"></i><span>Main</span></li>
            <li>
                <a href="index.php" class="iq-waves-effect collapsed" aria-expanded="false"><i class="ri-home-4-line"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="profile.php" class="iq-waves-effect collapsed" aria-expanded="false"><i class="ri-user-line"></i><span>Profile</span></a>
            </li>
            <li>
                <a href="form-layout.php" class="iq-waves-effect collapsed" aria-expanded="false"><i class="ri-profile-line"></i><span>Driver Registration</span></a>
            </li>
            <li>
                <a href="#tables" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-table-line"></i><span>Lists</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="tables" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="drivers.php">Driver List</a></li>
                    <li><a href="commuters.php">Commuters List</a></li>
                </ul>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

</div>
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <div class="iq-sidebar-logo">
            <div class="top-logo">
                <a href="index.html" class="logo">
                    <img src="images/logo.png" class="img-fluid" alt="">
                    <span>Sofbox</span>
                </a>
            </div>
        </div>
        <div class="navbar-breadcrumb">
            <h5 class="mb-0">Dashboard</h5>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                </ul>
            </nav>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="line-menu half start"></div>
                    <div class="line-menu"></div>
                    <div class="line-menu half end"></div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list">
                    <li class="nav-item">
                        <a class="search-toggle iq-waves-effect" href="#"><i class="ri-search-line"></i></a>
                        <form action="#" class="search-box">
                            <input type="text" class="text search-input" placeholder="Type here to search..." />
                        </form>
                    </li>

                    <li class="nav-item iq-full-screen"><a href="#" class="iq-waves-effect" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a></li>
                </ul>
            </div>
            <ul class="navbar-list">
                <li>
                    <a href="#" class="search-toggle iq-waves-effect bg-primary text-white"><img src="images/user/default.jpg" class="img-fluid rounded" style="object-fit:cover;" alt="user"></a>
                    <div class="iq-sub-dropdown iq-user-dropdown">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height shadow-none m-0">
                            <div class="iq-card-body p-0 ">
                                <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello, <?php echo htmlspecialchars($_SESSION['admin_name']); ?>!</h5>
                                </div>
                                <a href="profile.php" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-primary">
                                            <i class="ri-file-user-line"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0 ">My Profile</h6>
                                            <p class="mb-0 font-size-12">View personal profile details.</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-inline-block w-100 text-center p-3">
                                    <a class="iq-bg-danger iq-sign-btn" href="config/logout.php" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>