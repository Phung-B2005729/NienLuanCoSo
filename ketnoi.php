<?php

header('content-type: text/html; charset=utf8');
$servername = 'localhost'; // Tên server
$dataname = 'VeXemPhimOnline'; // ten database
$username = 'root'; // ten su dung database
$password = ''; // mat khau su dung database


$conn = mysqli_connect($servername, $username, $password, $dataname);
mysqli_set_charset($conn,'utf8');
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}