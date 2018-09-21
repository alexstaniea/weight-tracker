<?php
session_start();
require 'connect.php';
include 'delete.php';

if(!empty($_POST['delete']) && isset($_POST['delete']))
{ 
    $id = $_POST['delete'];

    $sql = "DELETE FROM dates WHERE id=$id";
    $result = mysqli_query($connect, $sql);
    header("Location: ../dashboard.php?info=ready");
}