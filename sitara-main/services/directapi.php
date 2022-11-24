<?php
	ini_set('max_execution_time', -1);
	$username="root";
	$password="Ptoptrack@(!!@";
	$database="sitara";

	// Opens a connection to a MySQL server
	$connection=mysqli_connect('localhost', $username, $password,$database);
	if (!$connection)
	{
	  die('Not connected : ' . mysqli_error());
	}

	// Set the active MySQL database
	$db_selected = mysqli_select_db( $connection,$database);
	if (!$db_selected)
	{
	  die ('Can\'t use db : ' . mysqli_error());
	}

function clean($string) {
   $string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}


//twsitara start

$fileman_twsitara = "http://203.175.74.153/AgilityWebApi/api/Values/GetVehiclesByLogin_Test?key=e4dafbca-9049-439b-aabd-68e0b4aa7de4";
$data_twsitara = file_get_contents($fileman_twsitara);
$array_twsitara = json_decode($data_twsitara,true);

foreach($array_twsitara["Response"] as $row_twsitara){
	
	$RecordDateTime_twsitara = $row_twsitara["RecordDateTime"];
	$time_server_twsitara = str_replace("T"," ",$RecordDateTime_twsitara);
	
	 $id_twsitara = $row_twsitara["UnitMasterID"];
	
	 $imei_twsitara = "tw".clean($row_twsitara["Alias"]);
	
	 $vehicle_twsitara = $row_twsitara["Alias"];
	 
	 $reason_twsitara = $row_twsitara["Reason"];
	
	 $LAT_twsitara = $row_twsitara["LAT"];
	
	 $LON_twsitara = $row_twsitara["LON"];
	
	 $LandMark_twsitara = $row_twsitara["LandMark"];
	
	 $Speed_twsitara = $row_twsitara["Speed"];
	if ($Speed_twsitara > '0'){
		 $ign_sitara = 'On';
	}
	else{
		 $ign_sitara = 'Off';
	}
	
	 
	
	
	
	
	 $sql_twsitara = "INSERT INTO bulkdata (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
 VALUES ('tw_sitara','$imei_twsitara','$time_server_twsitara','$LAT_twsitara','$LON_twsitara','360','$Speed_twsitara','$vehicle_twsitara','$id_twsitara','3321','$ign_sitara','tw_sitara','$time_server_twsitara','$time_server_twsitara','$LandMark_twsitara','0');";
mysqli_query( $connection,$sql_twsitara);


}

//twsitara end

$fileman1 = 'http://202.163.104.121/APIService/GetVehicleStatus.php?username=gas.oil&userpass=oil&choice=All';
$data1 = file_get_contents($fileman1);
$str = substr($data1, 11, -5);
$array1 = json_decode($str,true);


foreach($array1 as $rowtpl){
	
	 $imei 					= clean($rowtpl["RegistrationNo"]);
	 $name 					= $rowtpl["RegistrationNo"];
	 $lat 					= $rowtpl["Latitude"];
	 $lng					= $rowtpl["Longitude"];
	 $angle 				= $rowtpl["Direction"];
	 $speed 				= $rowtpl["Speed"];
	 $datetime 				= $rowtpl["GPSDateTime"];
	 $licensepn 			= '112113114115';
	 $odometer 				= '000';
	 $ignetion 				= $rowtpl["IgnitionStatus"];
	 $protocol 				= "al_shyma";
	 $last_idle 			= '000';
	 $last_move 			= '000';
	 $last_stop 			= $rowtpl["Location"];
	
	$sqlshy = "INSERT INTO bulkdata (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES ('al_shyma','$imei','$datetime','$lat','$lng','$angle','$speed','$name','$licensepn','$odometer','$ignetion','$protocol','$last_idle','$last_move','$last_stop','0');";


mysqli_query( $connection,$sqlshy);
}

//universal start
$fileuni = "http://universal.sjsolutionz.com:8060/api/api.php?api=user&ver=1.0&key=105BD1DECBCE5FEB537F58E873AAA5FD&cmd=OBJECT_GET_LOCATIONS_ALL,*";
$datauni = file_get_contents($fileuni);
$arrayuni = json_decode($datauni,true);


foreach($arrayuni as $rowuni){
	
	 $imeiuni 					= clean($rowuni["name"]);
	 $nameuni 					= $rowuni["RegNo"];
	 $latuni 					= $rowuni["lat"];
	 $lnguni					= $rowuni["lng"];
	 $angleuni 				= $rowuni["angle"];
	 $speeduni 				= $rowuni["speed"];
	 $datetimeuni 				= $rowuni["GpsDateTime"];
	 $licensepnuni 			= '112113114115';
	 $odometeruni 				= '000';
	 if($speeduni > 0){
		 $ignetionuni = 'On';
	 }else{
		 $ignetionuni = 'Off';
	 }
	 $protocoluni 				= "Universal";
	 $last_idleuni 			= '000';
	 $last_moveuni 			= '000';
	 $last_stopuni 			= $rowuni["Location"];
	
	$sqluni = "INSERT INTO bulkdata (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES ('Universal','$imeiuni','$datetimeuni','$latuni','$lnguni','$angleuni','$speeduni','$nameuni','$licensepnuni','$odometeruni','$ignetionuni','$protocoluni','$last_idleuni','$last_moveuni','$last_stopuni','0');";
 

mysqli_query( $connection,$sqluni);
}

//universal end
//any tracking one start

$fileman_anyone = "http://web.teletix.pk:8888/home/UserVehicles?username=tp_tariq&password=dGFyaXE=";
$data_anyone = file_get_contents($fileman_anyone);
$array_anyone = json_decode($data_anyone,true);

foreach($array_anyone as $row_anyone){
	
	$RecordDateTime_anyone = $row_anyone["DateTime"];
	$time_server_anyone = str_replace("T"," ",$RecordDateTime_anyone);

	 $id_anyone = $row_anyone["SimNo"];
	
	 $imei_anyone = "any".clean($row_anyone["VehicleName"]);
	
	 $vehicle_anyone = $row_anyone["VehicleName"];
	
	 $LAT_anyone = $row_anyone["Latitude"];
	
	 $LON_anyone = $row_anyone["Longitude"];
	
	 $LandMark_anyone = $row_anyone["Location"];
	
	 $Speed_anyone = $row_anyone["Speed"];
	 $ign_sitara = $row_anyone["ACC"];
	 $odo_sitara = $row_anyone["Mileage"];
	
	 
	
	
	
	
	 $sql_anyone = "INSERT INTO bulkdata (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
 VALUES ('anytracker','$imei_anyone','$time_server_anyone','$LAT_anyone','$LON_anyone','360','$Speed_anyone','$vehicle_anyone','$id_anyone','$odo_sitara','$ign_sitara','anytracker','$time_server_anyone','$time_server_anyone','$LandMark_anyone','0');";
mysqli_query( $connection,$sql_anyone);


}

//any tracking one end


//any tracking two start

$fileman_anytwo = "http://web.teletix.pk:8888/home/UserVehicles?username=tp_empiretransport&password=dHJhbnNwb3J0";
$data_anytwo = file_get_contents($fileman_anytwo);
$array_anytwo = json_decode($data_anytwo,true);

foreach($array_anytwo as $row_anytwo){
	
	$RecordDateTime_anytwo = $row_anytwo["DateTime"];
	$time_server_anytwo = str_replace("T"," ",$RecordDateTime_anytwo);
	 $id_anytwo = $row_anytwo["SimNo"];
	
	 $imei_anytwo = "any".clean($row_anytwo["VehicleName"]);
	
	 $vehicle_anytwo = $row_anytwo["VehicleName"];
	
	 $LAT_anytwo = $row_anytwo["Latitude"];
	
	 $LON_anytwo = $row_anytwo["Longitude"];
	
	 $LandMark_anytwo = $row_anytwo["Location"];
	
	 $Speed_anytwo = $row_anytwo["Speed"];
	 $ign_sitara = $row_anytwo["ACC"];
	 $odo_sitara = $row_anytwo["Mileage"];
	
	 
	
	
	
	
	 $sql_anytwo = "INSERT INTO bulkdata (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
 VALUES ('anytracker','$imei_anytwo','$time_server_anytwo','$LAT_anytwo','$LON_anytwo','360','$Speed_anytwo','$vehicle_anytwo','$id_anytwo','$odo_sitara','$ign_sitara','anytracker','$time_server_anytwo','$time_server_anytwo','$LandMark_anytwo','0');";
mysqli_query( $connection,$sql_anytwo);


}

//any tracking two end
//topfly start

$fileman_top = "http://topfly.sjsolutionz.com:8090/api/api.php?api=user&ver=1.0&key=8A1A03468671DC0D6378C9E77D16B632&cmd=OBJECT_GET_LOCATIONS_ALL,*";
$data_top = file_get_contents($fileman_top);
$top_array = json_decode($data_top,true);


foreach($top_array as $rowtop){
	
	 $imeitop 					= clean($rowtop["name"]);
	 $nametop 					= $rowtop["name"];
	 $lattop 					= $rowtop["lat"];
	 $lngtop					= $rowtop["lng"];
	 $angletop 				= $rowtop["angle"];
	 $speedtop 				= $rowtop["speed"];
	 $datetimetop 				= $rowtop["GpsDateTime"];
	 $licensepntop 			= '112113114115';
	 $odometertop 				= '333';
	 $ignetiontop 				= $rowtop["AccStatus"];
	 $protocoltop 				= "topflay";
	 $last_idletop 			= '000';
	 $last_movetop 			= '000';
	 $last_stoptop 			= $rowtop["Location"];
	
	$sqltop = "INSERT INTO bulkdata (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES ('topflay','$imeitop','$datetimetop','$lattop','$lngtop','$angletop','$speedtop','$nametop','$licensepntop','$odometertop','$ignetiontop','$protocoltop','$last_idletop','$last_movetop','$last_stoptop','0');";


mysqli_query( $connection,$sqltop);
}

//topfly end

//primer start

$filemanpre = 'http://202.163.104.124/APIService/GetVehicleStatus.php?username=gas.oil&userpass=oil&choice=All';
$datapre = file_get_contents($filemanpre);
$strpre = substr($datapre, 11, -5);
$arraypre = json_decode($strpre,true);


foreach($arraypre as $rowpre){
	
	 $imeipre 					= "pre".clean($rowpre["RegistrationNo"]);
	 $namepre 					= $rowpre["RegistrationNo"];
	 $latpre 					= $rowpre["Latitude"];
	 $lngpre					= $rowpre["Longitude"];
	 $anglepre 				= $rowpre["Direction"];
	 $speedpre 				= $rowpre["Speed"];
	 $datetimepre 				= $rowpre["GPSDateTime"];
	 $licensepnpre 			= '112113114115';
	 $odometerpre 				= '000';
	 $ignetionpre 				= $rowpre["IgnitionStatus"];
	 $protocolpre 				= "PTSL";
	 $last_idlepre 			= '000';
	 $last_movepre 			= '000';
	 $last_stoppre 			= $rowpre["Location"];
	
	$sqlpre = "INSERT INTO bulkdata (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES ('PTSL','$imeipre','$datetimepre','$latpre','$lngpre','$anglepre','$speedpre','$namepre','$licensepnpre','$odometerpre','$ignetionpre','$protocolpre','$last_idlepre','$last_movepre','$last_stoppre','0');";


mysqli_query( $connection,$sqlpre);
}
//primer end


//unitedsitara start

$fileman_unitedsitara = "http://localhost:8080/sitara/services/united.php";
$data_unitedsitara = file_get_contents($fileman_unitedsitara);
$array_unitedsitara = json_decode($data_unitedsitara,true);

foreach($array_unitedsitara as $row_unitedsitara){

	 $datetunited = $row_unitedsitara["GPSTime"];
	$datebbunited=date_create($datetunited);
	$time_server_unitedsitara = date_format($datebbunited,"Y-m-d H:i:s");
	 $id_unitedsitara = $row_unitedsitara["CarReg"];
	 $imei_unitedsitara = "un".clean($row_unitedsitara["CarReg"]);
	 $vehicle_unitedsitara = $row_unitedsitara["CarReg"];
	 $LAT_unitedsitara = $row_unitedsitara["Lat"];
	 $LON_unitedsitara = $row_unitedsitara["Long"];
	 $LandMark_unitedsitara = $row_unitedsitara["Location"];
	 $Speed_unitedsitara = $row_unitedsitara["Speed"];
	if ($Speed_unitedsitara > '0'){
		 $ign_sitara = 'On';
	}
	else{
		 $ign_sitara = 'Off';
	}
	
	 
	
	
	
	
	 $sql_unitedsitara = "INSERT INTO bulkdata (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
 VALUES ('united_sitara','$imei_unitedsitara','$time_server_unitedsitara','$LAT_unitedsitara','$LON_unitedsitara','360','$Speed_unitedsitara','$vehicle_unitedsitara','$id_unitedsitara','3321','$ign_sitara','united_sitara','$time_server_unitedsitara','$time_server_unitedsitara','$LandMark_unitedsitara','0');";
mysqli_query( $connection,$sql_unitedsitara);


}

//united_sitara end


?>





     <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $i;?>%">
    <span class="sr-only"> <?php  ?></span>
  </div>
</div>
</div>
<?php
	
			
			if ($sql_twsitara == true) {
				echo "<br> New record created successfully yeahoo Tracking World ";
				
			} else {
			   echo "Error: " . $sql_twsitara . "<br>" . mysqli_error($connection);
			  
			}
			if ($sqlshy == true) {
				echo "<br> New record created successfully yeahoo Al Shyma ";
				
			} else {
			   echo "Error: " . $sqlshy . "<br>" . mysqli_error($connection);
			  
			}
			if ($sqluni == true) {
				echo "<br> New record created successfully yeahoo Universal ";
				
			} else {
			   echo "Error: " . $sqluni . "<br>" . mysqli_error($connection);
			  
			}
			if ($sql_anyone == true) {
				echo "<br> New record created successfully yeahoo Any Tracker one ";
				
			} else {
			   echo "Error: " . $sql_anyone . "<br>" . mysqli_error($connection);
			  
			}
			if ($sql_anytwo == true) {
				echo "<br> New record created successfully yeahoo Any Tracker Two ";
				
			} else {
			   echo "Error: " . $sql_anytwo . "<br>" . mysqli_error($connection);
			  
			}
				if ($sqltop == true) {
				echo "<br> New record created successfully yeahoo TopFlay ";
				
			} else {
			   echo "Error: " . $sqltop . "<br>" . mysqli_error($connection);
			  
			}
			if ($sqlpre == true) {
				echo "<br> New record created successfully yeahoo PTSL ";
				
			} else {
			   echo "Error: " . $sqlpre . "<br>" . mysqli_error($connection);
			  
			}


$sql1= mysqli_query  ( $connection,"SELECT COUNT(*) as num FROM bulkdata" );
 
  $result = mysqli_fetch_assoc ( $sql1 );
  echo '<br>'.$result['num'];
  $t_row = $result['num'];
mysqli_close($connection);
?>
 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta http-equiv="refresh" content="20">
 	<title>Sitara Data</title>
	<style>
	.progress {
    height: 3px !important;
    margin-bottom: 1px !important;
}
	</style>
 </head>
 <body style="background: #fff;">
 <div class="col-md-8">

<div class="col-md-12">
 	<br>
 	<?php echo "Successfully done"."<br>"; echo date("d-m-Y H:i:s", time()); ?>
	</div>
 </body>
 </html>