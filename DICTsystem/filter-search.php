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
$conditions = [];

if (isset($_GET['start_date_examination']) && isset($_GET['end_date_examination'])) {
    $start_date_examination = $_GET['start_date_examination'];
    $end_date_examination = $_GET['end_date_examination'];
    $conditions[] = "date_of_examination BETWEEN '$start_date_examination' AND '$end_date_examination'";
}
elseif (isset($_GET['start_date_notification']) && isset($_GET['end_date_notification'])) {
    $start_date_notification = $_GET['start_date_notification'];
    $end_date_notification = $_GET['end_date_notification'];
    $conditions[] = "date_of_notification BETWEEN '$start_date_notification' AND '$end_date_notification'";
}

if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
    $conditions[] = "(status LIKE '%$search%' OR applicantID LIKE '%$search%' OR name LIKE '%$search%' OR province LIKE '%$search%')";
}

if (!empty($conditions)) {
    $query .= " WHERE " . implode(' AND ', $conditions);
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

