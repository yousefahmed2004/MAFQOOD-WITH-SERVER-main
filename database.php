<?php
require 'constants.php';

// Connect to the database
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>