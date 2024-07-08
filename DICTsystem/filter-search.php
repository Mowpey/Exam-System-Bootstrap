<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "applicant-records";
$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

<<<<<<< Updated upstream
$sortIDOrder = isset($_GET['sortID']) && $_GET['sortID'] === 'oldest' ? 'ASC' : 'DESC'; 

=======
$sortIDOrder = isset($_GET['sortID']) && $_GET['sortID'] === 'oldest' ? 'ASC' : 'DESC';
>>>>>>> Stashed changes
$query = "SELECT * FROM applicantrecord";
$conditions = [];

if (isset($_GET['start_date_examination']) && isset($_GET['end_date_examination'])) {
<<<<<<< Updated upstream
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
=======
    $start_date_examination = mysqli_real_escape_string($connection, $_GET['start_date_examination']);
    $end_date_examination = mysqli_real_escape_string($connection, $_GET['end_date_examination']);
    $conditions[] = "date_of_examination BETWEEN '$start_date_examination' AND '$end_date_examination'";
}

if (isset($_GET['start_date_notification']) && isset($_GET['end_date_notification'])) {
    $start_date_notification = mysqli_real_escape_string($connection, $_GET['start_date_notification']);
    $end_date_notification = mysqli_real_escape_string($connection, $_GET['end_date_notification']);
    $conditions[] = "date_of_notification BETWEEN '$start_date_notification' AND '$end_date_notification'";
}

if (isset($_GET['status']) && !empty($_GET['status'])) {
    $statuses = array_map(function($status) use ($connection) {
        return mysqli_real_escape_string($connection, $status);
    }, $_GET['status']);
    $statusCondition = "status IN ('" . implode("','", $statuses) . "')";
    $conditions[] = $statusCondition;
}

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($connection, trim($_GET['search']));
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
    $orderByClause[] = "applicantID $sortIDOrder"; 
=======
    $orderByClause[] = "applicantID $sortIDOrder";
>>>>>>> Stashed changes
}

$query .= " ORDER BY " . implode(', ', $orderByClause);

$result = mysqli_query($connection, $query);

if ($result) {
    $applicant_record = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
