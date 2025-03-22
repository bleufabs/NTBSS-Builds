<?php

$user = 'root';
$passwrd = '';
$database = 'mydatabase';

$conn = new mysqli('localhost', $user, $passwrd, $database);

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}
?>