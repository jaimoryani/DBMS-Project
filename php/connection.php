<?php
$host="localhost";
$user="root";
$password="jaimoryani";
$db_name="feedback";

$con=mysqli_connect($host,$user,$password,$db_name);
if(mysqli_connect_errno()){
    die("Failed to connect");
}
