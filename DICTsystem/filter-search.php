<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "applicant-records";
// $connection = mysqli_connect($servername, $username, $password, $database);

// if (!$connection) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// $sortOrder = isset($_GET['sortName']) ? $_GET['sortName'] : 'asc';
// $sortOrder = ($sortOrder === 'desc') ? 'DESC' : 'ASC';
// $query = "SELECT * FROM applicantrecord ORDER BY name $sortOrder";

// if (isset($_GET['search'])) {
//     $search = trim($_GET['search']);
//     $query = "SELECT * FROM applicantrecord 
//               WHERE status LIKE '%$search%' 
//               OR applicantID LIKE '%$search%' 
//               OR name LIKE '%$search%' 
//               OR province LIKE '%$search%'
//               ORDER BY name $sortOrder";
// }

// $result = mysqli_query($connection, $query);
// $applicant_record = mysqli_fetch_all($result, MYSQLI_ASSOC);

// mysqli_close($connection);

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

if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
    $query = "SELECT * FROM applicantrecord 
              WHERE status LIKE '%$search%' 
              OR applicantID LIKE '%$search%' 
              OR name LIKE '%$search%' 
              OR province LIKE '%$search%'
              ORDER BY name $sortOrder";
}

$result = mysqli_query($connection, $query);
$applicant_record = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($connection);