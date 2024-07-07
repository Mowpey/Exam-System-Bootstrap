<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "applicant-records";
$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sortIDOrder = isset($_GET['sortID']) && $_GET['sortID'] === 'oldest' ? 'ASC' : 'DESC'; 

$query = "SELECT * FROM applicantrecord";

if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
    $query .= " WHERE status LIKE '%$search%' 
                OR applicantID LIKE '%$search%' 
                OR name LIKE '%$search%' 
                OR province LIKE '%$search%'";
}

$orderByClause = [];

if (isset($_GET['sortName'])) {
    $sortNameOrder = $_GET['sortName'] === 'desc' ? 'DESC' : 'ASC';
    $orderByClause[] = "name $sortNameOrder";
}

if (isset($_GET['sortID']) && $_GET['sortID'] === 'oldest') {
    $orderByClause[] = "applicantID ASC";
} else {
    $orderByClause[] = "applicantID $sortIDOrder"; 
}

$query .= " ORDER BY " . implode(', ', $orderByClause);

$result = mysqli_query($connection, $query);

if ($result) {
    $applicant_record = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error: " . mysqli_error($connection);
}
mysqli_close($connection);



