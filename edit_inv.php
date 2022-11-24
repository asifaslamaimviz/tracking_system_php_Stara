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

?>
<?php

if (isset($_POST['update'])) {
    // $userData = count($_POST["v_stock"]);
    $userData = count($_POST["w_type"]);
    $id = $_GET['id'];
    $product_name = $_POST["product_name"];
    $product_code = $_POST["product_code"];
    $product_cat = $_POST["product_cat"];
    $sub_cat = $_POST["sub_cat"];
    $product_warehouse = $_POST["product_warehouse"];
    $product_price = $_POST["product_price"];
    $fproduct_price = $_POST["fproduct_price"];
    $product_tax = $_POST["product_tax"];
    $product_disc = $_POST["product_disc"];
    $product_qty = $_POST["product_qty"];
    $product_qty_alert = $_POST["product_qty_alert"];
    $unit = $_POST["unit"];
    $code_type = $_POST["code_type"];
    $barcode = $_POST["barcode"];
    $product_desc = $_POST["product_desc"];
    $wdate = $_POST["wdate"];
    $file = $_POST["file"];
    mysqli_query($db, "UPDATE inventory SET product_name='$product_name',product_code='$product_code',product_cat='$product_cat', sub_cat='$sub_cat',product_warehouse='$product_warehouse', fproduct_price='$fproduct_price',product_tax='$product_tax',product_price='$product_price', product_disc='$product_disc',product_qty='$product_qty',product_qty_alert='$product_qty_alert', product_desc='$product_desc',barcode='$barcode',product_desc='$product_desc',wdate='$wdate',file='$file' WHERE id=$id");
    $_SESSION['message'] = "Address updated!";

    if ($userData > 0) {
        for ($i = 0; $i < $userData; $i++) {
            if (trim($_POST['w_type'] != '') && trim($_POST['w_stock'] != '') && trim($_POST['w_alert'] != '')) {
                // $id = $active;
                $w_type = $_POST["w_type"][$i];
                $w_stock = $_POST["w_stock"][$i];
                $w_alert = $_POST["w_alert"][$i];
                $start_time = date("Y-m-d H:i:s");
                mysqli_query($db, "UPDATE p_warehouse SET w_type='$w_type',w_stock='$w_stock',w_alert='$w_alert' WHERE main_id=$id");
                // $result = mysqli_query($db, $query);
            }
        }
        echo "<script>
alert('Trip Add successfully');
window.location.href='v_table.php';
</script>";
        // header("location: ../zpos.php");
    } else {
        echo "Please Enter user name";
    }
}

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
                                            <div class="card-body">

                                                <form method="post" class="msgfrm" id="msgfrm">

                                                    <div class="form-group row">
                                                        <div class="col-sm-6"><label class="col-form-label" for="product_name">Product Name *</label>
                                                            <input type="text" placeholder="Product Name" class="form-control margin-bottom required" id="product_name" name="product_name">
                                                        </div>


                                                        <div class="col-sm-6"><label class="col-form-label" for="product_code">Product Code</label>
                                                            <input type="text" placeholder="Product Code" class="form-control" name="product_code" id="product_code">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <div class="col-sm-6"><label class="col-form-label" for="product_cat">Product Category *</label>
                                                            <input type="text" placeholder="Product Category" class="form-control" name="product_cat" id="product_cat">

                                                        </div>


                                                        <div class="col-sm-6"><label class="col-form-label" for="sub_cat">SubCategory</label>
                                                            <input type="text" placeholder="Sub Category" class="form-control" id="sub_cat" name="sub_cat">


                                                        </div>

                                                    </div>

                                                    <div class="form-group row">

                                                        <label class="col-sm-2 col-form-label" for="product_cat">Warehouse*</label>

                                                        <div class="col-sm-6">

                                                            <input type="text" placeholder="Warehouse   " class="form-control" name="product_warehouse" id="product_warehouse">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">

                                                        <label class="col-sm-2 control-label" for="product_price">Product Retail
                                                            Price*</label>

                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">PKR</span>
                                                                <input type="text" id="product_price" name="product_price" class="form-control required" placeholder="0.00" aria-describedby="sizing-addon" onkeypress="return isNumber(event)">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <label class="col-sm-2 col-form-label">Purchase Order Price</label>

                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">PKR</span>
                                                                <input type="text" id="fproduct_price" name="fproduct_price" class="form-control" placeholder="0.00" aria-describedby="sizing-addon1" onkeypress="return isNumber(event)">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group row">


                                                        <div class="col-sm-4">
                                                            <div class="input-group">

                                                                <input type="text" id="product_tax" name="product_tax" class="form-control" placeholder="Default TAX Rate" aria-describedby="sizing-addon1" onkeypress="return isNumber(event)"><span class="input-group-addon">%</span>
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-4">
                                                            <div class="input-group">

                                                                <input type="text" id="product_disc" name="product_disc" class="form-control" placeholder="Default Discount Rate" aria-describedby="sizing-addon1" onkeypress="return isNumber(event)"><span class="input-group-addon">%</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <small>You can change the Discount rate during invoice creation
                                                                also</small>

                                                            <small>You can change the Tax rate during invoice creation
                                                                also</small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">


                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="Stock Units*" class="form-control margin-bottom required" name="product_qty" id="product_qty" onkeypress="return isNumber(event)">
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="Alert Quantity" class="form-control margin-bottom" name="product_qty_alert" id="product_qty_alert" onkeypress="return isNumber(event)">
                                                        </div>

                                                    </div>
                                                    <hr>

                                                    <div class="form-group row">

                                                        <label class="col-sm-2 col-form-label" for="product_cat">Measurement
                                                            Unit*</label>

                                                        <div class="col-sm-4">

                                                            <input type="text" placeholder="Alert Quantity" class="form-control margin-bottom" name="unit" id="unit">


                                                        </div>
                                                    </div>


                                                    <div class="form-group row">

                                                        <label class="col-sm-2 col-form-label">BarCode</label>
                                                        <div class="col-sm-2">
                                                            <select class="form-control" name="code_type" id="code_type">
                                                                <option value="EAN13">EAN13 - Default</option>
                                                                <option value="UPCA">UPC</option>
                                                                <option value="EAN8">EAN8</option>
                                                                <option value="ISSN">ISSN</option>
                                                                <option value="ISBN">ISBN</option>
                                                                <option value="C128A">C128A</option>
                                                                <option value="C39">C39</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="BarCode Numeric Digit 123112345671" class="form-control margin-bottom" id="barcode" name="barcode" onkeypress="return isNumber(event)">
                                                            <small>Leave blank if you want auto generated in EAN13.</small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <label class="col-sm-2 col-form-label">Description</label>

                                                        <div class="col-sm-8">
                                                            <textarea placeholder="Description" class="form-control margin-bottom" name="product_desc" id="product_desc"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <label class="col-sm-2 control-label" for="edate">Valid (To Date
                                                            )</label>

                                                        <div class="col-sm-2">
                                                            <input type="datetime-local" class="form-control" id="wdate" name="wdate" placeholder="Expiry Date">
                                                        </div>
                                                        <small>Do not change if not applicable</small>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Image</label>
                                                        <div class="col-sm-6">
                                                            <div id="progress" class="progress">
                                                                <div class="progress-bar progress-bar-success"></div>
                                                            </div>
                                                            <table id="file" name="file" class="files"></table>
                                                            <br>
                                                            <span class="btn btn-success fileinput-button">
                                                                <i class="glyphicon glyphicon-plus"></i>
                                                                <span>Select files...</span>
                                                                <input id="fileupload" type="file" id="file" name="files[]">
                                                            </span>
                                                            <br>
                                                            <pre>Allowed: gif, jpeg, png (Use light small weight images for fast loading - 200x200)</pre>
                                                            <br>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <label class="col-sm-2 col-form-label"></label>

                                                        <div class="col-sm-4">
                                                            <input type="hidden" value="products/addproduct" id="action-url">
                                                        </div>
                                                    </div>
                                                    <!-- <button class="btn btn-pink add_serial btn-sm m-1"> Add Serial Row</button> -->
                                                    <div id="added_product">

                                                    </div>


                                                    <div id="accordionWrapa2" role="tablist" aria-multiselectable="true">

                                                        <div id="coupon5" class="card-header">
                                                            <a data-toggle="collapse" data-parent="#accordionWrapa2" href="#accordion42" aria-expanded="true" aria-controls="accordion41" class="card-title lead"><i class="fa fa-plus-circle"></i>
                                                                Add Products Warehouse </a>
                                                        </div>
                                                        <div id="accordion42" role="tabpanel" aria-labelledby="coupon5" class="card-collapse collapse show" aria-expanded="false" style="">
                                                            <div class="row p-1">
                                                                <div class="col">
                                                                    <!-- <input class="btn btn-blue" type="button" value="Add Row" onclick="addRows()" /> -->

                                                                    <hr>
                                                                    <table id="emptbl">
                                                                        <tr>
                                                                            <th>Main WareHouse</th>
                                                                            <th>Stock Units*</th>
                                                                            <th>Alert Quantity*</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <!-- <td id="col0"> <input class="form-control" type="text" name="w_type[]" value="" /></td>
                                                                            <td id="col1"><input class="form-control" type="text" name="w_stock[]" value="" /></td>
                                                                            <td id="col2"><input class="form-control" type="text" name="w_alert[]" value="" /></td> -->

                                                                        </tr>
                                                                    </table>

                                                                </div>
                                                            </div>
                                                            <input type="button" value="Delete Row" class="btn btn-red" onclick="deleteRows()" />

                                                        </div>
                                                    </div>

                                                    <button type="submit" name="update" class="btn btn-primary" style="float:right">update</button>

                                                    <!-- <input type=" submit" class="btn btn-primary" style="float:right" value="save"> -->
                                                </form>
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
        function creat_form(qty_f) {
            if (qty_f != '') {
                for (var i = 1; i <= qty_f; i++) {
                    $('#emptbl').append(' <tr id = "row' + i + '"> <td id = "col0' + i + '" > <input class = "form-control" type = "text" id = "w_type' + i + '" name = "w_type[]" / > </td> <td id = "col1' + i + '" > <input class = "form-control"  type = "text" id = "w_stock' + i + '"  name = "w_stock[]" > </td>  <td id = "col2' + i + '" > <input class = "form-control" type = "text" id = "w_alert' + i + '" name = "w_alert[]" > </td></tr> ');
                }

            }
        }

        let url_str = document.URL;

        let url = new URL(url_str);
        let search_params = url.searchParams;

        var id = search_params.get('id');

        $.ajax({
            url: 'ajax_inventory/fetch_inv.php',
            type: 'POST',
            data: {
                trip_id: id
            },
            success: function(data) {
                data = JSON.parse(data)
                console.log(data);
                var sub_trip_id = data.id;
                var product_name = data.product_name;
                var product_code = data.product_code;
                var product_cat = data.product_cat;
                var sub_cat = data.sub_cat;
                var product_warehouse = data.product_warehouse;
                var product_price = data.product_price;
                var fproduct_price = data.fproduct_price;
                var product_tax = data.product_tax;
                var product_disc = data.product_disc;
                var product_qty = data.product_qty;
                var product_qty_alert = data.product_qty_alert;
                var unit = data.unit;
                var code_type = data.code_type;
                var barcode = data.barcode;
                var product_desc = data.product_desc;
                var wdate = data.wdate;
                var file = data.file;
                var trip_count = data.trip_count;

                document.getElementById("product_name").value = product_name;

                document.getElementById("product_name").value = product_name;
                document.getElementById("product_code").value = product_code;
                document.getElementById("product_cat").value = product_cat;
                document.getElementById("sub_cat").value = sub_cat;
                document.getElementById("product_warehouse").value = product_warehouse;
                document.getElementById("product_price").value = product_price;
                document.getElementById("fproduct_price").value = fproduct_price;
                document.getElementById("product_tax").value = product_tax;
                document.getElementById("product_disc").value = product_disc;
                document.getElementById("product_qty").value = product_qty;
                document.getElementById("product_qty_alert").value = product_qty_alert;
                document.getElementById("unit").value = unit;
                document.getElementById("code_type").value = code_type;
                document.getElementById("barcode").value = barcode;
                document.getElementById("product_desc").value = product_desc;
                document.getElementById("wdate").value = wdate;
                document.getElementById("file").value = file;

                // $("#tbodyid").empty();


                $.ajax({
                    url: 'ajax_inventory/fetch_inv.php',
                    type: 'POST',
                    data: {
                        trip_id_sub: sub_trip_id
                    },
                    success: function(data1) {
                        data1 = JSON.parse(data1)
                        console.log(data1);
                        var len = data1.length;
                        // alert(len)
                        creat_form(len)

                        for (var i = 0; i < len; i++) {
                            console.log(i)

                            document.getElementById("w_type" + (i + 1) + "").value = data1[i][0];
                            document.getElementById("w_stock" + (i + 1) + "").value = data1[i][1];
                            document.getElementById("w_alert" + (i + 1) + "").value = data1[i][2];
                            // document.getElementById("sub_id" + (i + 1) + "").value = data1[i][5];

                        }
                    }
                });


            }
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
                if (i == 3) {
                    var radioinput = document.getElementById('col3').getElementsByTagName('input');

                }
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
    <!-- <script src="assets/js/libs/jquery-3.1.1.min.js"></script> -->
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