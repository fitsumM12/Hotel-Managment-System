<?php 

include_once "includes/navigationcontrol.php";
include_once "includes/control.php";
?>

<body>
    <div class="container-scroller">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="dashboard">
                    <button class='btn'>
                        <h4>XYZ</h4>
                    </button>
                </a>
                <a class="sidebar-brand brand-logo-mini" href="dashboard">XYZ

                </a>
            </div>
            <ul class="nav">

                <li class="nav-item menu-items">
                    <a class="nav-link" href="dashboard">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#posts" aria-expanded="false"
                        aria-controls="posts">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Posts</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="posts">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="post_add">Add Post</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="post_view">View Post</a></li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#team" aria-expanded="false" aria-controls="team">
                        <span class="menu-icon">
                            <i class=" mdi mdi-account-multiple-plus"></i>
                        </span>
                        <span class="menu-title">Team</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="team">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="team_add">Add Member</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="team_view">View Members</a></li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#services" aria-expanded="false"
                        aria-controls="services">
                        <span class="menu-icon">
                            <i class=" mdi mdi-briefcase"></i>
                        </span>
                        <span class="menu-title">Services</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="services">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="service_add">Add Service</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="service_view">View Services</a></li>

                        </ul>
                    </div>
                </li>

                

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#slider" aria-expanded="false"
                        aria-controls="slider">
                        <span class="menu-icon">
                            <i class=" mdi mdi-briefcase"></i>
                        </span>
                        <span class="menu-title">Sliders</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="slider">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="slider_add">Add slider</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="slider_view">View slider</a></li>

                        </ul>
                    </div>
                </li>
                <?php
                    if($_SESSION['tm_role']=='admin'){?>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="company">
                        <span class="menu-icon">
                            <i class=" mdi mdi-settings "></i>
                        </span>
                        <span class="menu-title">Company</span>
                    </a>
                </li>
                <?php }
                    ?>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="feedback">
                        <span class="menu-icon">
                            <i class=" mdi mdi-comment-multiple-outline "></i>
                        </span>
                        <span class="menu-title">Feedback</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="dashboard">Z</a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>

                    <ul class="navbar-nav navbar-nav-right">

                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <?php viewProfilePicture(); ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-success">
                                            </i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1"><button class="btn"
                                                id="profile_setting">setting</button></p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1"><button class="btn"
                                                id="logout_setting">Logout</button></p>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">