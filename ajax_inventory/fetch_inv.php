<?php
session_start();
include("../config_indemnifier.php");


if (isset($_POST['trip_id'])) {
    $check = $_POST['trip_id'];
    if ($check != "") {
        $result = mysqli_query($db, "SELECT * FROM inventory where id='$check'");
        $cust = mysqli_fetch_array($result);


        // echo 'True '.$data;
        if ($cust) {
            echo json_encode($cust);
        } else {
            echo "Error: " . "Select Correct Consignee Code" . "" . mysqli_error($db);
        }
    } else {
        echo 'False';
    }
}

if (!empty($_POST['trip_id_sub'])) {

    $trip_id_sub = $_POST['trip_id_sub'];
    if ($trip_id_sub != "") {
        $users_arr = array();
        $sql = "SELECT * FROM p_warehouse where main_id ='$trip_id_sub'";
        // echo $sql;
        $result = mysqli_query($db, $sql);

        while ($row = mysqli_fetch_array($result)) {
            // $userid = $row['id'];
            $sub_id = $row['id'];
            $w_type = $row['w_type'];

            $w_stock = $row['w_stock'];
            $w_alert = $row['w_alert'];
     

            $users_arr[] = array($w_type, $w_stock, $w_alert, $sub_id);
        }
        // print_r($users_arr);

        // echo 'True '.$data;

        echo json_encode($users_arr);
    } else {
        echo 'False';
    }
}