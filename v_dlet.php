<?php

include("config_indemnifier.php");
$id = $_GET['id'];

$del = mysqli_query($db, "delete from inventory  where id = '$id'"); // delete query
$del1 = mysqli_query($db, "delete from p_warehouse  where main_id = '$id'"); // delete query
$del2 = mysqli_query($db, "delete from p_variant  where main_id = '$id'"); // delete query

if ($del) {
    mysqli_close($db); // Close connection
    header("location:v_table.php"); // redirects to all records page
    exit;
} else {
    echo "Error deleting record"; // display error message if not delete
}   
