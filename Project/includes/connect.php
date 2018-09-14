<?php

$connect = mysqli_connect('localhost','root','','user');

if(!$connect){
    die('Database connection failed!');
}