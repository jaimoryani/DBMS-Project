<?php
$host="localhost";
$user="root";
$password="jaimoryani";
$db_name="dbms";

$con=mysqli_connect($host,$user,$password,$db_name);
if(mysqli_connect_errno()){
    die("Failed to connect");
}
else echo("fegrwbfe");
?>