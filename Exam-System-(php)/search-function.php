<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "applicant-records";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$applicant_record = [];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
       $search = trim($_GET['search']);
    
    
    $sql = "SELECT * FROM applicantrecord WHERE status LIKE ? OR applicantID LIKE ? OR name LIKE ? OR province LIKE ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        
        $searchParam = "%$search%";
        $stmt->bind_param("ssss", $searchParam, $searchParam,$searchParam,$searchParam);
        
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            
            
            $applicant_record = $result->fetch_all(MYSQLI_ASSOC);
            
            
            $result->free();
        } else {
            echo "Error executing search query: " . $stmt->error;
        }
        
        
        $stmt->close();
    } else {
        echo "Error preparing search statement: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM applicantrecord";
    $result = $conn->query($sql);
    
    if ($result) {
        $applicant_record = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
    } else {
        echo "Error executing default query: " . $conn->error;
    }
}

$conn->close();
