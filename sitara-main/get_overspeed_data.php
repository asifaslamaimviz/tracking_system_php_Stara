<?php
    session_start();
    include("config_indemnifier.php");
    if(isset($_POST)){
        $check = $_POST['check'];
        $str = implode($check,',');

        if($str==='all'){
            $from = $_POST['from'];
            $next_date = new dateTime($from);
            $next_date -> modify('+1 day');
            $tommorrow = $next_date->format('Y-m-d');
            // $to = $_POST['to'];
            if($from!=""){
                $users_arr = array();
                $sql="SELECT pos.device_id,pos.vehicle_id,pos.speed,pos.vlocation,pos.time FROM sitara.positions as pos where speed>'55' and pos.time>'$from' and pos.time<'$tommorrow'  and power='1'";

                $result = mysqli_query($db,$sql);
                
                while( $row = mysqli_fetch_array($result) ){
                    // $userid = $row['id'];
                    $name = $row['vehicle_id'];
                    $speed = $row['speed'];
                    $location = $row['vlocation'];
                    $time = $row['time'];
                
                    $users_arr[] = array(
                        'name'=>$name,
                        'speed'=>$speed,
                        'location'=>$location,
                        'time'=>$time
                    );
                }
                // print_r($users_arr);

                // echo 'True '.$data;
                
                    echo json_encode($users_arr);
                    
            }else{
                echo 'False';
            }
        }
        else{

        

            $str = implode($check,',');
            $from = $_POST['from'];
            // $to = $_POST['to'];
            $next_date = new dateTime($from);
            $next_date -> modify('+1 day');
            $tommorrow = $next_date->format('Y-m-d');
            if($from!=""){
                $users_arr = array();
                $sql="SELECT pos.device_id,pos.vehicle_id,pos.speed,pos.vlocation,pos.time FROM sitara.positions as pos where speed>'55' and pos.time>'$from' and pos.time<'$tommorrow' and pos.device_id IN ({$str}) and power='1'";
                // echo $sql;
                $result = mysqli_query($db,$sql);
                
                while( $row = mysqli_fetch_array($result) ){
                    // $userid = $row['id'];
                    $name = $row['vehicle_id'];
                    $speed = $row['speed'];
                    $location = $row['vlocation'];
                    $time = $row['time'];
                
                    $users_arr[] = array(
                        'name'=>$name,
                        'speed'=>$speed,
                        'location'=>$location,
                        'time'=>$time
                    );
                }
                // print_r($users_arr);

                // echo 'True '.$data;
                
                    echo json_encode($users_arr);
                    
            }else{
                echo 'False';
            }
        }
    }
?>