<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
$con = mysqli_connect('localhost','root','','wedding_planner');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

?>