<?php
$host = '127.0.0.1';
$username = 'root';
$password = '';
$db_name = 'ta_planner_tita';
$conn = mysqli_connect($host,$username,$password,$db_name);
if(!$conn){
	die("Connection Failed = ".mysqli_connect_error());
}
?>