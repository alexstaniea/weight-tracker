<?php
session_start();
require 'connect.php';

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){

        $email = strtolower($_POST['email']);
        $password = strtolower($_POST['password']);

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($connect, $sql);
        $row = $result->fetch_assoc();
        $hash = $row['password'];

        $check = password_verify($password, $hash);

        if($check == 0)
        {
            header("Location: ../index.php?info=wrong");
            die();
        }else
        {
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$hash'";
            $result = mysqli_query($connect, $sql);

            if(!$row = $result->fetch_assoc())
            {
                echo 'Wrong username or password';
            }else
            {
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['username'] = $row['username'];
                header("Location: ../dashboard.php");
            }

            
        }
}else{
    header("Location: ../index.php?info=missing");
}