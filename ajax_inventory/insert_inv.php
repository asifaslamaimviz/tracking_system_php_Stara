<?php
include("../config_indemnifier.php");
$userData = count($_POST["v_stock"]);
$userData = count($_POST["w_type"]);

$product_name = mysqli_real_escape_string($db, $_POST["product_name"]);
$product_code = mysqli_real_escape_string($db, $_POST["product_code"]);
$product_cat = mysqli_real_escape_string($db, $_POST["product_cat"]);
$sub_cat = mysqli_real_escape_string($db, $_POST["sub_cat"]);
$product_warehouse = mysqli_real_escape_string($db, $_POST["product_warehouse"]);
$product_price = mysqli_real_escape_string($db, $_POST["product_price"]);
$fproduct_price = mysqli_real_escape_string($db, $_POST["fproduct_price"]);
$product_tax = mysqli_real_escape_string($db, $_POST["product_tax"]);
$product_disc = mysqli_real_escape_string($db, $_POST["product_disc"]);
$product_qty = mysqli_real_escape_string($db, $_POST["product_qty"]);
$product_qty_alert = mysqli_real_escape_string($db, $_POST["product_qty_alert"]);
$unit = mysqli_real_escape_string($db, $_POST["unit"]);
$code_type = mysqli_real_escape_string($db, $_POST["code_type"]);
$barcode = mysqli_real_escape_string($db, $_POST["barcode"]);
$product_desc = mysqli_real_escape_string($db, $_POST["product_desc"]);
$wdate = mysqli_real_escape_string($db, $_POST["wdate"]);
// $file = mysqli_real_escape_string($db, $_POST["file"]);
$file = rand(1000, 100000) . "-" . $_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
//  $file_type = $_FILES['file']['type'];
$folder = "uploads/";
move_uploaded_file($file_loc, $folder . $file);

$query_main  = "INSERT INTO `inventory`(`product_name`,`product_code`,`product_cat`,`sub_cat`,`product_warehouse`,`product_price`,`fproduct_price`,`product_tax`,`product_disc`,`product_qty`,`product_qty_alert`,`unit`,`code_type`,`barcode`,`product_desc`,`wdate`,`file`,`size`) Value('$product_name','$product_code','$product_cat','$sub_cat','$product_warehouse','$product_price','$fproduct_price','$product_tax','$product_disc','$product_qty','$product_qty_alert','$unit','$code_type','$barcode','$product_desc','$wdate','$file','$file_size') ";
// echo $query_main;
$result_main = mysqli_query($db, $query_main);
$active = mysqli_insert_id($db);

if ($userData > 0) {
    for ($i = 0; $i < $userData; $i++) {
        if (trim($_POST['w_type'] != '') && trim($_POST['w_stock'] != '') && trim($_POST['w_alert'] != '')) {
            $main_id = $active;
            $w_type = $_POST["w_type"][$i];
            $w_stock = $_POST["w_stock"][$i];
            $w_alert = $_POST["w_alert"][$i];
            $start_time = date("Y-m-d H:i:s");
            $query  = "INSERT INTO `p_warehouse`(`w_type`, `w_stock`, `w_alert`,`main_id`) VALUES ('$w_type','$w_stock','$w_alert','$main_id')";
            $result = mysqli_query($db, $query);
        }
    }
    echo "<script>
alert('Trip Add successfully');
// window.location.href='zpos.php';
</script>";
    // header("location: ../zpos.php");
} else {
    echo "Please Enter user name";
}
