<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=applicant-records", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $sql = "SELECT * FROM applicantrecord";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $applicant_detail = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}




error_reporting(E_ALL);
ini_set('display_errors', 1);

$records_per_page = 10;

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

$offset = ($page - 1) * $records_per_page;

try {
    
    $conn = new PDO("mysql:host=localhost;dbname=applicant-records", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $sql = "SELECT * FROM applicantrecord ORDER BY applicantID DESC LIMIT :limit OFFSET :offset";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $applicant_detail = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    $total_sql = "SELECT COUNT(*) FROM applicantrecord";
    $total_stmt = $conn->prepare($total_sql);
    $total_stmt->execute();
    $total_records = $total_stmt->fetchColumn();
    $total_pages = ceil($total_records / $records_per_page);
} catch (PDOException $e) {

    echo "Connection failed: " . $e->getMessage();
}


