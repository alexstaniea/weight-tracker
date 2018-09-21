<?php
session_start();
require 'connect.php';

if(!empty($_POST['weight']) && isset($_POST['weight']) && !empty($_POST['date']) && isset($_POST['date']))
{
    $weight = $_POST['weight'];
    $date = $_POST['date'];
    $id = $_SESSION['id'];

    $sql = "INSERT INTO dates (value, weight, userid) VALUES ('$date', '$weight','$id')";
    $result = mysqli_query($connect, $sql);
    header("Location: ../dashboard.php?info=ready");
}else{
    header("Location: ../enter.php?info=error");
}