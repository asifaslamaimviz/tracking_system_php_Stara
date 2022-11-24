<?php

include("config_indemnifier.php");
$id = $_GET['id'];
$url = $_GET['url'];


$del = mysqli_query($db,"delete from tc_user_device where deviceid  = '$id'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location: $url"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>