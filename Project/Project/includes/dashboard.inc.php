<?php
session_start();
require 'connect.php';

if(!empty($_POST['weight']) && isset($_POST['weight']))
{
    $weight = $_POST['weight'];
    $date = date("Y/m/d");
    $id = $_SESSION['id'];

    $sql = "INSERT INTO dates (value, weight, userid) VALUES ('$date', '$weight','$id')";
    $result = mysqli_query($connect, $sql);
    header("Location: ../dashboard.php?info=ready");
}else{
    header("Location: ../dashboard.php?info=error");
}