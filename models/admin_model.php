<?php

function model_validate_loggedin(&$username,&$password){
global $conn;

$query = "SELECT `id` FROM `accounts` WHERE `username`='$username' AND `password`='$password' AND activate='0' ";
$result = mysqli_query($conn, $query);

return $result;
}


?>