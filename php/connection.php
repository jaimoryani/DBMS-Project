<?php
$host="localhost";
$user="root";
$password="12345";
$db_name="feedback_management_grp1";

$con=mysqli_connect($host,$user,$password,$db_name);
if(mysqli_connect_errno()){
    die("Failed to connect");
}
