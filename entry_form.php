<?php
include("sessioninput.php");


?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Sitara</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">

    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="./styles.css">


    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise, Remove it
        */
        .navbar .navbar-item.navbar-dropdown {
            margin-left: auto;
        }

        .layout-px-spacing {
            min-height: calc(100vh - 125px) !important;
        }

        .car_upper {
            text-transform: uppercase !important;
        }

        .caret::before {
            content: none !important;
        }

        .select2-container--default .select2-selection--multiple {
            background-color: #fff;
        }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php
include("config_indemnifier.php");
$result = mysqli_query($db, "SELECT * FROM inventory");
?>

<body class="sidebar-noneoverflow starterkit">
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Vehicle Inventory Form</h3>
                        </div>
                    </div>
                </li>
            </ul>
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                    <line x1="8" y1="6" x2="21" y2="6"></line>
                    <line x1="8" y1="12" x2="21" y2="12"></line>
                    <line x1="8" y1="18" x2="21" y2="18"></line>
                    <line x1="3" y1="6" x2="3" y2="6"></line>
                    <line x1="3" y1="12" x2="3" y2="12"></line>
                    <line x1="3" y1="18" x2="3" y2="18"></line>
                </svg></a>



            <ul class="navbar-item flex-row navbar-dropdown">


                <li class="nav-item dropdown message-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                            </path>
                        </svg><span class="badge badge-primary"></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="messageDropdown">
                        <div class="">

                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg><span class="badge badge-success"></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="notificationDropdown">
                        <div class="notification-scroll">


                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">

                        <div class="dropdown-item">
                            <a href="user_profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg> <span>My Profile</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="index.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg> <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php include 'sidebar.php'; ?>
        <!--  END SIDEBAR  -->

        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="content-body">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                </div>
                                <div class="content-body">
                                    <div class="content-body">
                                        <div class="card">


                                            <div id="notify" class="alert alert-success" style="display:none;">

                                                <div class="message"></div>
                                            </div>
                                            <div class="container-fluid mt-5">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form method="POST" role="form" action="/add_vehicle" enctype="multipart/form-data">
                                                            <div class="row ">
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Registration Number</label>
                                                                        <input type="text" class="form-control" id="reg_number" name="reg_number" placeholder="Enter Registration Number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Fuel Type</label>
                                                                        <div class="btn-group bootstrap-select dropup" style="width: 100%;">

                                                                            <div class="dropdown-menu select-dropdown open" role="combobox" style="max-height: 182.5px; overflow: hidden; min-height: 117px; will-change: transform;">
                                                                                <div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div>
                                                                                <div class="dropdown-menu inner" role="listbox" aria-expanded="false" style="max-height: 127.5px; overflow-y: auto; min-height: 62px;"><a tabindex="0" class="dropdown-item active" data-original-index="0"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Select Fuel Type </span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="1"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Petrol</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item selected" data-original-index="2"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="true"><span class="text">Petrol+CNG</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="3"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Diesel</span><span class="  check-mark"></span></span></a></div>
                                                                            </div><select class="selectpicker" data-width="100%" id="fuel_type_id" name="fuel_type_id" data-live-search="true" tabindex="-98">
                                                                                <option>Select Fuel Type </option>

                                                                                <option value="2">Petrol</option>

                                                                                <option value="3">Petrol+CNG</option>

                                                                                <option value="4">Diesel</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row ">
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Make </label>
                                                                        <!-- <input type="text" class="form-control" placeholder="Enter Make" id="make" name="make"> -->
                                                                        <div class="btn-group bootstrap-select" style="width: 100%;">
                                                                            <div class="dropdown-menu select-dropdown open" role="combobox">
                                                                                <div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div>
                                                                                <div class="dropdown-menu inner" role="listbox" aria-expanded="false"><a tabindex="0" class="dropdown-item selected" data-original-index="0"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="true"><span class="text">Select Make </span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="1"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">7 - Bolan</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="2"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">5 - KIA PICANTO Seria 1</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="3"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">5 - City</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="4"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">3 - Truck</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="5"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">7 - Jimmny</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="6"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">5 - Corolla</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="7"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">5 - WagonR</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="8"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">5 - Alto</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="9"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">5 - WagonR VXR</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="10"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">5 - Cultus</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="11"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">22 - Panorama</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="12"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">2 - Motorcycle</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="13"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">4 - Mehran</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="14"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">5 - Toyota,Aqua</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="15"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">4 - Toyota,Swift</span><span class="  check-mark"></span></span></a></div>
                                                                            </div><select class="selectpicker" data-width="100%" id="make" name="make" data-live-search="true" onchange="getCapacity(this.value)" tabindex="-98">
                                                                                <option>Select Make </option>

                                                                                <option value="2">7 - Bolan</option>

                                                                                <option value="8">5 - KIA PICANTO Seria 1</option>

                                                                                <option value="12">5 - City</option>

                                                                                <option value="13">3 - Truck</option>

                                                                                <option value="14">7 - Jimmny</option>

                                                                                <option value="16">5 - Corolla</option>

                                                                                <option value="17">5 - WagonR</option>

                                                                                <option value="18">5 - Alto</option>

                                                                                <option value="19">5 - WagonR VXR</option>

                                                                                <option value="22">5 - Cultus</option>

                                                                                <option value="23">22 - Panorama</option>

                                                                                <option value="24">2 - Motorcycle</option>

                                                                                <option value="25">4 - Mehran</option>

                                                                                <option value="26">5 - Toyota,Aqua</option>

                                                                                <option value="27">4 - Toyota,Swift</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Model</label>
                                                                        <div class="btn-group bootstrap-select" style="width: 100%;">
                                                                            <div class="dropdown-menu select-dropdown open" role="combobox">
                                                                                <div class="dropdown-menu inner" role="listbox" aria-expanded="false"><a tabindex="0" class="dropdown-item selected" data-original-index="0"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="true"><span class="text">Select Year</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="1"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">2020</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="2"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">2021</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="3"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">2022</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="4"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">2023</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="5"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">2024</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="6"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">2025</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="7"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">2026</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="8"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">2027</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="9"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">2028</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="10"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">2029</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="11"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">2030</span><span class="  check-mark"></span></span></a></div>
                                                                            </div><select class="selectpicker" data-width="100%" id="model" name="model" tabindex="-98">
                                                                                <option value="">Select Year</option>
                                                                                <option value="2020">2020</option>
                                                                                <option value="2021">2021</option>
                                                                                <option value="2021">2022</option>
                                                                                <option value="2021">2023</option>
                                                                                <option value="2021">2024</option>
                                                                                <option value="2021">2025</option>
                                                                                <option value="2021">2026</option>
                                                                                <option value="2021">2027</option>
                                                                                <option value="2021">2028</option>
                                                                                <option value="2021">2029</option>
                                                                                <option value="2021">2030</option>


                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row ">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Date Of Registration </label>
                                                                        <input id="dor" name="dor" class="form-control flatpickr flatpickr-input active" type="date" placeholder="Select Date.." required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Date Of Purchase </label>
                                                                        <input id="dop" name="dop" class="form-control flatpickr flatpickr-input active" type="date" placeholder="Select Date.." onchange="check()" required="">
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="row ">
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Purchase Price (Rs.) </label>
                                                                        <input type="text" class="form-control" placeholder="Enter Make" id="purchase_price" name="purchase_price" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Registration State</label>

                                                                        <div class="btn-group bootstrap-select" style="width: 100%;">
                                                                            <div class="dropdown-menu select-dropdown open" role="combobox">
                                                                                <div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div>
                                                                                <div class="dropdown-menu inner" role="listbox" aria-expanded="false"><a tabindex="0" class="dropdown-item selected" data-original-index="0"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="true"><span class="text">Select Registeration State</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="1"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Sindh</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="2"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Punjab</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="3"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">KPK</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="4"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Islamabad</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="5"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Balochistan</span><span class="  check-mark"></span></span></a></div>
                                                                            </div><select class="selectpicker" data-width="100%" id="r_state_id" name="r_state_id" data-live-search="true" required="" tabindex="-98">
                                                                                <option>Select Registeration State</option>

                                                                                <option value="2">Sindh</option>

                                                                                <option value="3">Punjab</option>

                                                                                <option value="5">KPK</option>

                                                                                <option value="6">Islamabad</option>

                                                                                <option value="4">Balochistan</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row ">
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Engine Number </label>
                                                                        <input id="engine_no" name="engine_no" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Enter Engine Number" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Chasis Number </label>
                                                                        <input id="chasis_no" name="chasis_no" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Enter Chasis Number" required="">
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div class="row ">
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Capacity </label>
                                                                        <input id="capacity_make" name="capacity" class="form-control" type="text" placeholder="Enter Capacity" required="" readonly="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Vehicle Allocation</label>
                                                                        <div class="btn-group bootstrap-select" style="width: 100%;">
                                                                            <div class="dropdown-menu select-dropdown open" role="combobox">
                                                                                <div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div>
                                                                                <div class="dropdown-menu inner" role="listbox" aria-expanded="false"><a tabindex="0" class="dropdown-item selected" data-original-index="0"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="true"><span class="text">Select Allocation</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="1"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Auction</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="2"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Awaiting Allocation</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="3"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Functional</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="4"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Non TCF</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="5"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Pick and Drop (Office)</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="6"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Pick and Drop School</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="7"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Pool</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="8"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Sold</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="9"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Spare</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="10"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Stolen</span><span class="  check-mark"></span></span></a></div>
                                                                            </div><select class="selectpicker" data-width="100%" id="function_type_id" name="function_type_id" data-live-search="true" tabindex="-98">
                                                                                <option>Select Allocation</option>

                                                                                <option value="3">Auction</option>

                                                                                <option value="8">Awaiting Allocation</option>

                                                                                <option value="2">Functional</option>

                                                                                <option value="7">Non TCF</option>

                                                                                <option value="10">Pick and Drop (Office)</option>

                                                                                <option value="1">Pick and Drop School</option>

                                                                                <option value="5">Pool</option>

                                                                                <option value="11">Sold</option>

                                                                                <option value="9">Spare</option>

                                                                                <option value="12">Stolen</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row ">
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Region </label>
                                                                        <div class="btn-group bootstrap-select" style="width: 100%;">
                                                                            <div class="dropdown-menu select-dropdown open" role="combobox">
                                                                                <div class="dropdown-menu inner" role="listbox" aria-expanded="false"><a tabindex="0" class="dropdown-item selected" data-original-index="0"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="true"><span class="text">Select Region</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="1"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">North</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="2"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">South</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="3"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">South West</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="4"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">North West</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="5"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">PS - North</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="6"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">PS - South</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="7"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Railway School</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="8"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Test Region for App</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="9"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Central</span><span class="  check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="10"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">TCF College</span><span class="  check-mark"></span></span></a></div>
                                                                            </div><select class="selectpicker" data-width="100%" id="region" name="region" onchange="changeFunc('region','area')" tabindex="-98">
                                                                                <option>Select Region</option>

                                                                                <option value="1">North</option>

                                                                                <option value="2">South</option>

                                                                                <option value="3">South West</option>

                                                                                <option value="4">North West</option>

                                                                                <option value="7">PS - North</option>

                                                                                <option value="17">PS - South</option>

                                                                                <option value="18">Railway School</option>

                                                                                <option value="19">Test Region for App</option>

                                                                                <option value="20">Central</option>

                                                                                <option value="21">TCF College</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Area </label>
                                                                        <select class="form-control" data-width="100%" id="area" name="area">
                                                                            <option>Select Area</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6" style="display: none;">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Current Odometer </label>
                                                                        <input id="current_odo" name="current_odo" value="0" class="form-control" type="text" placeholder="Enter Current Odometer">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Card Limit
                                                                            (In Litres)
                                                                        </label>
                                                                        <input id="card_limit" name="card_limit" class="form-control" type="text" placeholder="Enter Card Limit In Rupees" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Release Date</label>
                                                                        <input id="add_v_release" name="add_v_release" class="form-control flatpickr flatpickr-input active" type="date" placeholder="Select Date.." required="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group ">
                                                                        <label for="exampleFormControlInput2">Upload Picture </label>
                                                                        <!-- <input class="form-control" type="file" name="uploaded_image" accept=""/> -->
                                                                        <div class="custom-file-container" data-upload-id="myFirstImage">
                                                                            <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                                            <label class="custom-file-container__custom-file">
                                                                                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" id="uploaded_image" name="uploaded_image">
                                                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                                                                                <span class="custom-file-container__custom-file__custom-file-control">Choose file...<span class="custom-file-container__custom-file__custom-file-control__button"> Browse </span></span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <script>
                                                                        var firstUpload = new FileUploadWithPreview('myFirstImage');
                                                                        var firstUpload_upload = new FileUploadWithPreview('myFirstImage_upload');
                                                                    </script>
                                                                </div>

                                                            </div>

                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button type="submit" name="useradd" class="btn btn-primary  font-weight-bold mx-2" style="float: right; ">SAVE</button>


                                                                    </div>
                                                                </div>
                                                            </div>
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
                </div>


                <!-- CONTENT AREA -->

            </div>

        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $("#msgfrm").on("submit", function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "ajax_inventory/insert_inv.php",

                data: $(this).serialize(),
                success: function(output) {
                    alert("record inserted successfully.")
                    location.reload();


                }
            });
        });
    </script>
    <script type="text/javascript">
        function addRows() {
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            var cellCount = table.rows[0].cells.length;
            var row = table.insertRow(rowCount);
            for (var i = 0; i <= cellCount; i++) {
                var cell = 'cell' + i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col' + i).innerHTML;
                cell.innerHTML = copycel;

            }
        }

        function deleteRows() {
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            if (rowCount > '2') {
                var row = table.deleteRow(rowCount - 1);
                rowCount--;
            } else {
                alert('There should be atleast one row');
            }
        }
    </script>

    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="plugins/treeview/custom-jstree.js"></script>
    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>

    <script src="plugins/flatpickr/flatpickr.js"></script>
    <script src="plugins/noUiSlider/nouislider.min.js"></script>

    <script src="plugins/flatpickr/custom-flatpickr.js"></script>
    <script src="plugins/noUiSlider/custom-nouiSlider.js"></script>
    <script src="plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js"></script>

    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/select2/custom-select2.js"></script>

    <script>
        $('#html5-extension').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn'
                    },
                    {
                        extend: 'csv',
                        className: 'btn'
                    },
                    {
                        extend: 'excel',
                        className: 'btn'
                    },
                    {
                        extend: 'print',
                        className: 'btn'
                    }
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>