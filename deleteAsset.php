<?php
include("config_indemnifier.php");
$id = $_GET['id'];

$del = mysqli_query($db,"delete from sitara.devices where uniqueId = '$id'"); // delete query
$del2 = mysqli_query($db,"delete from sitara.users_devices where devices_id = '$id'"); // delete query

if($del)
{
    
    echo "<script>
alert('Record Delete successfully');
window.location.href='manageAsset.php';
</script>";
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

if($del2)
{
    
    echo "Deleted";
}


?>