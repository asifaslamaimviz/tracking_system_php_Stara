<?php
include("../config_indemnifier.php");

$ids = $_POST['warehouse_id'];

$delete = $db->query("DELETE FROM warehouse WHERE warehouse_id = '$ids'");
