<?php
$host="localhost";
$user="fcsldba";
$password="Junaid_123";
$db_name="fcsldb";

$con=mysqli_connect($host,$user,$password,$db_name);
if(mysqli_connect_errno()){
    die("Failed to connect");
}
?>