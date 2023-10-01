<?php 

$server = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'blog';
$db = mysqli_connect($server,$username,$password,$database);

mysqli_query($db,"SET NAMES 'utf8'");

// iniciamos la sesion
if (!isset($_SESSION)) {
    session_start();
}
// session_start();