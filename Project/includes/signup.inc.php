<?php
session_start();
require 'connect.php';

if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['username']) && isset($_POST['email']) &&  isset($_POST['username']) && isset($_POST['password']))
{
    $email = strtolower($_POST['email']);
    $password = strtolower($_POST['password']);
    $username = strtolower($_POST['username']);

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($connect, $sql);
    $check = mysqli_num_rows($result);

    if($check > 0){
        header("Location: ../signup.php?info=exist");
        die();
    }else{

    $sql = "INSERT INTO users (email, password, username) VALUES ('$email', '$password_hashed', '$username')";
    $result = mysqli_query($connect, $sql);
    header("Location: ../dashboard.php");
    }
}else{

    header("Location: ../signup.php?info=error");
}

