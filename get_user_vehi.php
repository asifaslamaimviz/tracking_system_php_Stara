<?php
    session_start();
    include("config_indemnifier.php");
    if(isset($_POST)){
        $check = $_POST['check'];
        if($check!=""){
            $users_arr = array();
            $sql="SELECT ud.users_id,ud.devices_id as device_iid,us.name,UPPER(dc.name) as car_name,pos.latitude,pos.longitude,pos.device_id,pos.speed,pos.imileage,pos.time,pos.altitude,pos.vlocation,pos.time FROM users_devices as ud INNER JOIN users as us on ud.users_id=us.id INNER JOIN devices as dc on ud.devices_id=dc.uniqueId INNER JOIN positions as pos on dc.latestPosition_id=pos.id where  ud.users_id=$check";
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];
                $name = $row['name'];
                $lat = $row['latitude'];
                $lng = $row['longitude'];
                $speed = $row['speed'];
                $car_name = $row['car_name'];
                $device_id = $row['device_iid'];
                $altitude = $row['altitude'];
                $vlocation = $row['vlocation'];
                $time = $row['time'];
            
                $users_arr[] = array($name,$lat,$lng,$speed,$car_name,$device_id,$altitude,$vlocation,$time);
            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($users_arr);
                
        }else{
            echo 'False';
        }
    }
?>