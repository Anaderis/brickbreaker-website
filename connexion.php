<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'brickbreaker';

$conn = mysqli_connect($host, $user, $password, $dbname);

if(!$conn){
    die ("Connection Failed");
}
?>