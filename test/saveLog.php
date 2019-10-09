<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "time_App";
date_default_timezone_set('America/Chicago');
//$lcl_machine = $_GET['date'];
$srvr_machine = date("d/m/Y")." ".date("h:i:s");
$localIP = $_SERVER['REMOTE_ADDR'];
echo $localIP;

//// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//
//////// Check connection
//if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
//}
//$sql = "INSERT INTO time_log (log_id, ip_address, lcl_date_time, srvr_date_time)
//VALUES ('','$localIP','$lcl_machine','$srvr_machine')";
//
//if (mysqli_query($conn, $sql)) 
//{echo "New record created successfully";} 
//else {echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
//
//mysqli_close($conn);
?>