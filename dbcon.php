<?php
$con = mysqli_connect("host", "user_name", "password", "database");

if (!$con) {
    die('Internal Server Error'.mysqli_connect_error());
}
?>