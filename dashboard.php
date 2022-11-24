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
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" class="dashboard-analytics" />
    <link href="assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" class="dashboard-sales" />
    <link href="assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="assets/css/elements/custom-tree_view.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">

    <!-- END GLOBAL MANDATORY STYLES -->

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

    @font-face {
        font-family: myFirstFont;
        src: url(sansation_light.woff);
    }

    .widget-account-invoice-two {
        background-image: 0;
        background: #fff !important;
    }

    .component-card_3 .card-body {
        background: #1b1650;
        border-radius: 10px;
    }

    /* .component-card_3 .card-body h5.card-user_name{
            color: #f47621;
        } */
    .navbar .navbar-item.search-ul {
        margin-left: auto;
        margin-right: 0;
    }

    .widget-one_hybrid.widget-followers {
        background: #fff;
    }

    .widget-one_hybrid.widget-referral {
        background: #fff;

    }

    .widget-one_hybrid.widget-engagement {
        background: #fff;

    }

    .file-tree li.file-tree-folder::before {
        content: url(data:image/svg+xml <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="%232b50ed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>);



    }

    .component-card_7 {
        width: 100% !important;
    }

    .caret::before {
        display: none !important;
    }
    .car_upper{
        text-transform: uppercase !important;
    }
    </style>

    <?php function clean($string) {
        $string=str_replace('', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
    }

    $todate=date("Y-m-d H:i:s", time());
    $prev_date=date("Y-m-d H:i:s", strtotime($todate .' -1 day'));
    include("config_indemnifier.php");
    $id=$_GET['id'];

    $result=mysqli_query($db, "SELECT * FROM users where id='$id'");
    $data=mysqli_fetch_array($result);



    $vehicle=mysqli_query($db, "SELECT COUNT(*) AS device FROM devices as dv join positions as pos on pos.id = dv.latestPosition_id join users_devices as ud on ud.devices_id = dv.uniqueId WHERE ud.users_id='$id'");
    $countdata=mysqli_fetch_array($vehicle);

    $vehicle_movw=mysqli_query($db, "SELECT count(*) as car_moving FROM positions as pos INNER join devices as dv on pos.id = dv.latestPosition_id INNER JOIN users_devices as ud on dv.uniqueId = ud.devices_id where pos.speed > 0  and pos.speed < 55  and pos.time >='$prev_date' and ud.users_id='$id'");
    $count_move=mysqli_fetch_array($vehicle_movw);

    $vehicle_idel=mysqli_query($db, "SELECT count(*) as idel FROM positions as pos INNER join devices as dv on pos.id = dv.latestPosition_id INNER JOIN users_devices as ud on dv.uniqueId = ud.devices_id where pos.speed = 0 and pos.power =1 and pos.time >='$prev_date' and ud.users_id='$id'");
    $count_idel=mysqli_fetch_array($vehicle_idel);

    $vehicle_stop=mysqli_query($db, "SELECT count(*) as car_stop FROM `positions` as pos INNER join `devices` as dv on pos.id = dv.latestPosition_id INNER JOIN `users_devices` as ud on dv.uniqueId = ud.devices_id where pos.speed=0 and pos.power = 0 and pos.time >='$prev_date' and ud.users_id='$id'");
    $count_stop=mysqli_fetch_array($vehicle_stop);

    $vehicle_speed=mysqli_query($db, "SELECT count(*) as car_speed FROM `positions` as pos INNER join `devices` as dv on pos.id = dv.latestPosition_id INNER JOIN `users_devices` as ud on dv.uniqueId=ud.devices_id where pos.speed >= 55 and pos.time >='$prev_date' and ud.users_id='$id'");
    $count_speed=mysqli_fetch_array($vehicle_speed);

    $nr=mysqli_query($db, "SELECT count(*) as car_nr FROM `positions` as pos INNER join `devices` as dv on pos.id = dv.latestPosition_id INNER JOIN `users_devices` as ud on dv.uniqueId=ud.devices_id where  pos.time <='$prev_date' and ud.users_id='$id'");
    $countnr=mysqli_fetch_array($nr);

    $black_=mysqli_query($db, "SELECT count(*) as black_spot FROM sitara.geo_in_check join users_devices as ud on ud.devices_id = geo_in_check.veh_id where geotype='black spote' and ud.users_id ='$id'");
    $blacking=mysqli_fetch_array($black_);


    $result12=mysqli_query($db, "SELECT dv.name,pos.time,pos.speed,pos.vlocation FROM `positions` as pos INNER join `devices` as dv on pos.id=dv.latestPosition_id INNER JOIN `users_devices` as ud on dv.uniqueId=ud.devices_id where ud.users_id='$id'");
    $result13=mysqli_query($db, "SELECT dv.name,pos.time,pos.speed,pos.vlocation FROM `positions` as pos INNER join `devices` as dv on pos.id=dv.latestPosition_id INNER JOIN `users_devices` as ud on dv.uniqueId=ud.devices_id where pos.speed>0 and  pos.speed < 55 and pos.time >='$prev_date' and ud.users_id='$id'");
    $result14=mysqli_query($db, "SELECT dv.name,pos.time,pos.speed,pos.vlocation FROM `positions` as pos INNER join `devices` as dv on pos.id=dv.latestPosition_id INNER JOIN `users_devices` as ud on dv.uniqueId=ud.devices_id where  pos.speed=0 and pos.power = 0 and pos.time >='$prev_date' and ud.users_id='$id'");
    $result15=mysqli_query($db, "SELECT dv.name,pos.time,pos.speed,pos.vlocation FROM `positions` as pos INNER join `devices` as dv on pos.id=dv.latestPosition_id INNER JOIN `users_devices` as ud on dv.uniqueId=ud.devices_id where pos.time <='$prev_date' and ud.users_id='$id'");
    $result16=mysqli_query($db, "SELECT dv.name,pos.time,pos.speed,pos.vlocation FROM `positions` as pos INNER join `devices` as dv on pos.id=dv.latestPosition_id INNER JOIN `users_devices` as ud on dv.uniqueId=ud.devices_id where pos.speed>=55   and pos.time >='$prev_date' and ud.users_id='$id'");
    $result17=mysqli_query($db, "SELECT dv.name,pos.time,pos.speed,pos.vlocation FROM positions as pos INNER join devices as dv on pos.id = dv.latestPosition_id INNER JOIN users_devices as ud on dv.uniqueId = ud.devices_id where pos.speed = 0 and pos.power =1 and pos.time >='$prev_date' and ud.users_id='$id'");
    $result18=mysqli_query($db, "SELECT * FROM sitara.geo_in_check join users_devices as ud on ud.devices_id = geo_in_check.veh_id where geotype='black spote' and ud.users_id ='$id'");
    ?>


    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<script>
var consignee_name = [];
var depot_count = [];

var back_consignee_name = [];
var blackSpot_count = [];
</script>

<?php
    $query="SELECT * FROM sitara.geofenceing where geotype='depot'";
    // echo $query;
    $results = mysqli_query($db, $query);

                                                

    
    foreach ($results as $city){
        $id = $city['id'];
        $consignee_name = $city['consignee_name'];
        // echo $id ;
        ?>
<script>

</script>
<?php
        $query1="SELECT count(*) as counting FROM sitara.geo_in_check where geo_id='$id' ;";
        // echo $query;
        $results1 = mysqli_query($db, $query1);
    
                                                    
    
        
        foreach ($results1 as $city1){
            $a = $city1['counting'];
            // echo "hamza".$a;
            ?>

<script>
depot_count.push(parseInt('<?php echo $a?>'));
console.log(depot_count);
consignee_name.push('<?php echo $consignee_name?>' + ' - ' + '<?php echo $a?>');
// console.log(consignee_name);
</script>

<?php
        }
    }
                                            
?>

<?php
    $query_black="SELECT * FROM sitara.geofenceing where geotype='black Spote'";
    // echo $query;
    $results_black = mysqli_query($db, $query_black);

                                                

    
    foreach ($results_black as $city_black){
        $black_id = $city_black['id'];
        $black_consignee_name = $city_black['consignee_name'];
        // echo $id ;
        ?>
<script>

</script>
<?php
        $query1_black="SELECT count(*) as counting FROM sitara.geo_in_check where geo_id='$black_id' ;";
        // echo $query;
        $results1_black = mysqli_query($db, $query1_black);
    
                                                    
    
        
        foreach ($results1_black as $city1_black){
            $a = $city1_black['counting'];
            // echo "hamza".$a;
            ?>

<script>
blackSpot_count.push(parseInt('<?php echo $a?>'));
console.log(blackSpot_count);
back_consignee_name.push('<?php echo $black_consignee_name?>' + ' - ' + '<?php echo $a?>');
// console.log(back_consignee_name);
</script>

<?php
        }
    }
                                            
?>

<body class="sidebar-noneoverflow starterkit">
     <!-- BEGIN LOADER -->
     <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->
    <script>
    var arr_car = [];
    var car_lable = [];
    </script>
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Dashboard</h3>
                        </div>
                    </div>
                </li>
            </ul>
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-list">
                    <line x1="8" y1="6" x2="21" y2="6"></line>
                    <line x1="8" y1="12" x2="21" y2="12"></line>
                    <line x1="8" y1="18" x2="21" y2="18"></line>
                    <line x1="3" y1="6" x2="3" y2="6"></line>
                    <line x1="3" y1="12" x2="3" y2="12"></line>
                    <line x1="3" y1="18" x2="3" y2="18"></line>
                </svg></a>

            <ul class="navbar-item flex-row search-ul">
                <li class="nav-item align-self-center search-animated">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> -->
                    <h2 class="text-center"><?php echo $data['name']; ?> </h2>
                </li>
            </ul>

            <ul class="navbar-item flex-row navbar-dropdown">

                <li class="nav-item dropdown message-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-message-circle">
                            <path
                                d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                            </path>
                        </svg><span class="badge badge-primary"></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="messageDropdown">
                        <div class="">
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg><span class="badge badge-success"></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp"
                        aria-labelledby="notificationDropdown">
                        <div class="notification-scroll">
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp"
                        aria-labelledby="userProfileDropdown">

                        <div class="dropdown-item">
                            <a href="index.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-log-out">
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
    <script>
    var total = <?php echo $countdata['device'] ?>;
    var mov = <?php echo $count_move['car_moving'] ?>;
    var stop = <?php echo $count_stop['car_stop'] ?>;
    var overspeed = <?php echo $count_speed['car_speed'] ?>;
    var ideal_state = <?php echo $count_idel['idel'] ?>;
    var no_activity = <?php echo $countnr['car_nr'] ?>;

    total = parseInt(total);
    mov = parseInt(mov);
    stop = parseInt(stop);
    overspeed = parseInt(overspeed);
    ideal_state = parseInt(ideal_state);
    var per_move = ((mov / total) * 100).toFixed();
    var per_stop = ((stop / total) * 100).toFixed();
    var per_over = ((overspeed / total) * 100).toFixed();
    var per_ideal = ((ideal_state / total) * 100).toFixed();
    var per_no_activity = ((no_activity / total) * 100).toFixed();
    // alert(per_ideal)
    arr_car.push(per_move, per_stop, per_over, per_ideal, per_no_activity)
    car_lable.push('Moving', 'Stop', 'Overspeed', 'Ideal', 'NR');
    // //alert(arr_car)
    </script>
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->

        <?php include 'sidebar.php';?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <!-- <div class="container-fluid my-3">
                    <div class="row">
                        <div class="col-md-3">
                        <select class="selectpicker" id="user_track" onchange="mytraker()">
                            <option >Select User</option>
                            <option value="198">tracking_world</option>
                            <option value="230">al shyma</option>
                        </select>
                        </div>
                       
                    </div>
                    
                </div> -->


                <div class="row layout-top-spacing">

                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#24245b !important ;  cursor: pointer;"
                                        onclick="dis_all()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-car p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#fff"> Total Vehicle</h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;"><?php echo $countdata['device'] ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#3b78b7 !important ;  cursor: pointer;"
                                        onclick="chup()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-route p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#fff"> Vehicles Currently Moving
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;"><?php echo $count_move['car_moving'] ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#ea7372 !important ;  cursor: pointer;"
                                        onclick="vehi_stop()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-stop-circle p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#fff"> Vehicles Currently
                                                    Stopped</h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;"><?php echo $count_stop['car_stop'] ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>


                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#e6b730 !important ;  cursor: pointer;"
                                        onclick="ideal_state()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-pause p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#fff"> Ideal State</h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;"><?php echo $count_idel['idel'] ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#c34c9c !important ;  cursor: pointer;"
                                        onclick="activity_record()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-tasks p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#fff"> No Vehicles Activity
                                                    Recored</h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;"><?php echo $countnr['car_nr'] ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#e62e2d !important ;  cursor: pointer;"
                                        onclick="speed_over()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-tachometer-alt p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#fff"> Speed Violation</h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;"><?php echo $count_speed['car_speed'] ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#421515 !important ;  cursor: pointer;" onclick="blacks()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-tachometer-alt p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#fff"> Black Spot</h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;"><?php echo $blacking['black_spot'] ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- list start -->


                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" id="all_car">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <center>
                                    <h3 style="color: #24245c;">All Vehicle</h3>
                                </center>
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Reporting Time</th>
                                            <th>Location</th>
                                            <th>Speed</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row1 = mysqli_fetch_array($result12)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <?php if ($row1["speed"]>='55') { ?>
                                            <td class="car_upper" style="background:#e62e2d !important ;  color: #fff;">
                                                <?php echo $row1["name"]; ?></td>
                                            <?php }elseif($row1["speed"]==='0'){ ?>
                                            <td class="car_upper" style="background:#ea7372 !important ;  color: #fff;">
                                                <?php echo $row1["name"]; ?></td>

                                            <?php }elseif($row1["speed"]>'0'){ ?>
                                            <td class="car_upper" style="background:#3b78b7 !important ;  color: #fff;">
                                                <?php echo $row1["name"]; ?></td>



                                            <?php }else{} ?>
                                            <td><?php echo $row1["time"]; ?></td>
                                            <td><?php echo $row1["vlocation"]; ?></td>
                                            <td><?php echo $row1["speed"]; ?></td>






                                        </tr>

                                        <?php
                                            $i++;
                                            }
                                        ?>


                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="moving_car">
                        <div class="widget-content widget-content-area br-6">
                            <!-- <div class="container-fluid mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="addAsset.php"> <button class="btn btn-primary">ADD Asset</button>
                                        </a>

                                    </div>
                                </div>
                            </div> -->
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension1" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Reporting Time</th>
                                            <th>Location</th>
                                            <th>Speed</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result13)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#3b78b7 !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["speed"]; ?></td>





                                        </tr>

                                        <?php
                                            $i++;
                                            }
                                        ?>


                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="moving_stop">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension2" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Reporting Time</th>
                                            <th>Location</th>
                                            <th>Speed</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result14)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#ea7372  !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["speed"]; ?></td>





                                        </tr>

                                        <?php
                                            $i++;
                                            }
                                        ?>


                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="never_report">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension3" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Reporting Time</th>
                                            <th>Location</th>
                                            <th>Speed</th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                        id="activity_record">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension4" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Reporting Time</th>
                                            <th>Location</th>
                                            <th>Speed</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result15)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#c24e9d  !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["speed"]; ?></td>





                                        </tr>

                                        <?php
                                            $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="speed_over">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension5" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Reporting Time</th>
                                            <th>Location</th>
                                            <th>Speed</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result16)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#e63130  !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["speed"]; ?></td>





                                        </tr>

                                        <?php
                                            $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="ideal_state">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension6" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Reporting Time</th>
                                            <th>Location</th>
                                            <th>Speed</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result17)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td style="background:#e6b730  !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["speed"]; ?></td>





                                        </tr>

                                        <?php
                                            $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="api_nr">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension7" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Reporting Time</th>
                                            <th>Location</th>
                                            <th>Speed</th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="black__spot">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension8" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>In Time</th>
                                            <th>Black Spot Area</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result18)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#421515  !important ;  color: #fff;">
                                                <?php echo $row["car_name"]; ?></td>
                                            <td><?php echo $row["in_time"]; ?></td>
                                            <td><?php echo $row["consignee_name"]; ?></td>





                                        </tr>

                                        <?php
                                            $i++;
                                            }
                                        ?>


                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                    <!-- list end -->
                    <!-- graph start -->
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-two">
                            <div class="widget-heading">
                                <h5 class="">Black Spot Status</h5>
                            </div>
                           <div class="widget-content">
                                <div id="radial-chart" class=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-two">
                            <div class="widget-heading">
                                <h5 class="">Depot Status</h5>
                            </div>
                            <div class="widget-content">
                                <div id="radial-chart1" class=""></div>
                            </div>
                        </div>
                    </div>
                    <!-- graph end -->
                </div>




            </div>
        </div>

    </div>
    <!--  END CONTENT AREA  -->

    </div>
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
    <script src="plugins/apex/apexcharts.min.js"></script>
    <!-- <script src="assets/js/dashboard/dash_1.js"></script> -->
    <!-- <script src="assets/js/dashboard/dash_2.js"></script> -->
    <script src="plugins/treeview/custom-jstree.js"></script>

    <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script>
    function chup() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "block";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";







    }
    </script>
    <script>
    function dis_all() {
        //alert("Running")
        document.getElementById("all_car").style.display = "block";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";







    }
    </script>
    <script>
    function vehi_stop() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "block";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";






    }
    </script>
    <script>
    function never_report() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "block";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        




    }
    </script>
    <script>
    function activity_record() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "block";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";




    }
    </script>
    <script>
    function speed_over() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "block";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        


    }
    </script>
    <script>
    function ideal_state() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "block";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";


    }
    </script>
    <script>
    function api_nr() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "block";
        document.getElementById("black__spot").style.display = "none";
        
        
    }
    </script>
    <script>
    function blacks() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "block";
    }
    </script>
    <script>
        $('#html5-extension').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm'
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
        $('#html5-extension1').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm'
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
        $('#html5-extension2').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm'
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
        $('#html5-extension3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm'
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
        $('#html5-extension4').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm'
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
        $('#html5-extension5').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm'
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
        $('#html5-extension6').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm'
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
        $('#html5-extension7').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm'
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
        $('#html5-extension8').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm'
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

    <script>
    // var radialChart = {
    //     chart: {
    //         height: 350,
    //         type: 'radialBar',
    //         toolbar: {
    //             show: false,
    //         }
    //     },
    //     plotOptions: {
    //         radialBar: {
    //             dataLabels: {
    //                 name: {
    //                     fontSize: '22px',
    //                 },
    //                 value: {
    //                     fontSize: '16px',
    //                 },
    //                 total: {
    //                     show: true,
    //                     label: '',
    //                     formatter: function(w) {
    //                         // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
    //                         // return 249
    //                     }
    //                 }
    //             }
    //         }
    //     },
    //     series: arr_car,
    //     labels: car_lable,
    //     colors: ['#3b78b7','#ea7372','#e62e2d','#e6b730','#c34d9c'],
    // }

    // var chart = new ApexCharts(
    //     document.querySelector("#radial-chart"),
    //     radialChart
    // );

    // chart.render();

    var donutChart = {
        chart: {
            height: 350,
            type: 'donut',
            toolbar: {
                show: false,
            }
        },
        series: depot_count,
        labels: consignee_name,
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    }

    var donut = new ApexCharts(
        document.querySelector("#radial-chart1"),
        donutChart
    );

    donut.render();

    var donutChart1 = {
        chart: {
            height: 350,
            type: 'donut',
            toolbar: {
                show: false,
            }
        },
        series: blackSpot_count,
        labels: back_consignee_name,
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    }

    var donut1 = new ApexCharts(
        document.querySelector("#radial-chart"),
        donutChart1
    );

    donut1.render();
    </script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>