<?php

$conn = mysqli_connect("localhost","root","","hotel");

if(!$conn){
    die("Cannot connect to the database".mysqli_connect_error());
}

?> 