<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "applicant-records";
$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sortOrder = isset($_GET['sortName']) ? $_GET['sortName'] : 'asc';
$sortOrder = ($sortOrder === 'desc') ? 'DESC' : 'ASC';

$query = "SELECT * FROM applicantrecord ORDER BY name $sortOrder";
$result = mysqli_query($connection, $query);
$applicant_record = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($connection);