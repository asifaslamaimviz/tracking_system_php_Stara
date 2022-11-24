<?php

if (isset($_POST['update'])) {
    $userData = count($_POST["v_stock"]);
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
    mysqli_query($db, "UPDATE inventory SET product_name='$product_name',product_code='$product_code',product_cat='$product_cat', sub_cat='$sub_cat',product_warehouse='$product_warehouse', fproduct_price='$fproduct_price',product_tax='$product_tax',product_price='$product_price', product_disc='$product_disc',product_qty='$product_qty',product_qty_alert='$product_qty_alert', product_desc='$product_desc',barcode='$barcode',product_desc='$product_desc',wdate='$wdate' WHERE id=$id");

    if ($userData > 0) {
        for ($i = 0; $i < $userData; $i++) {
            if (trim($_POST['w_type'] != '') && trim($_POST['w_stock'] != '') && trim($_POST['w_alert'] != '')) {
                $main_id = $active;
                $w_type = $_POST["w_type"][$i];
                $w_stock = $_POST["w_stock"][$i];
                $w_alert = $_POST["w_alert"][$i];
                $start_time = date("Y-m-d H:i:s");
                mysqli_query($db, "UPDATE p_warehouse SET w_type='$w_type',w_stock='$w_stock',w_alert='$w_alert' WHERE main_id=$id");
                $result = mysqli_query($db, $query);
            }
        }
        echo "<script>
// alert('Trip Add successfully');
window.location.href='../v_table.php';
</script>";
        // header("location: ../zpos.php");
    } else {
        echo "Please Enter user name";
    }
}
