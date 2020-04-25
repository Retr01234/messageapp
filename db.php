<?php

// Connect to MySQL
$connection = mysqli_connect('localhost', 'root', 'bomba100', 'messageapp'); // Creating a Variable and setting our connection string

// Test Connection
if(mysqli_connect_errno()){
  echo 'DB Connection Error: '.mysqli_connect_error(); // If theres a connection error, then echo the error code
}