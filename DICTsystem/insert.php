<?php
// Establish database connection
try {
    $conn = new PDO("mysql:host=localhost;dbname=applicant-records", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs (optional, depending on your validation needs)
    $name = htmlspecialchars($_POST['name']);
    $sex = htmlspecialchars($_POST['sex']);
    $province = htmlspecialchars($_POST['province']);
    $exam_venue = htmlspecialchars($_POST['exam_venue']);
    $date_of_examination = htmlspecialchars($_POST['date_of_examination']);
    $date_of_notification = htmlspecialchars($_POST['date_of_notification']);
    $proctor = htmlspecialchars($_POST['proctor']);
    $status = htmlspecialchars($_POST['status']);
    $applicant_form = file_get_contents($_FILES['applicant_form']['tmp_name']); // Read file content
    $contact_number = htmlspecialchars($_POST['contact_number']);
    $email_address = htmlspecialchars($_POST['email_address']);
    
    // Prepare SQL statement for insertion
    $sql = "INSERT INTO applicantrecord (name, sex, province, exam_venue, date_of_examination, date_of_notification, proctor, status, applicant_form, contact_number, email_address)
            VALUES (:name, :sex, :province, :exam_venue, :date_of_examination, :date_of_notification, :proctor, :status, :applicant_form, :contact_number, :email_address)";
    
    // Bind parameters and execute SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':province', $province);
    $stmt->bindParam(':exam_venue', $exam_venue);
    $stmt->bindParam(':date_of_examination', $date_of_examination);
    $stmt->bindParam(':date_of_notification', $date_of_notification);
    $stmt->bindParam(':proctor', $proctor);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':applicant_form', $applicant_form, PDO::PARAM_LOB); // Bind file content as LOB
    $stmt->bindParam(':contact_number', $contact_number);
    $stmt->bindParam(':email_address', $email_address);
    $stmt->execute();
}
$last_applicant_ID = $conn->lastInsertId();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs (optional, depending on your validation needs)
    $applicant_score_part1 = htmlspecialchars($_POST['exam1Score']);
    $applicant_score_part2 = htmlspecialchars($_POST['exam2Score']);
    $applicant_score_part3 = htmlspecialchars($_POST['exam3Score']);
    $total_score = htmlspecialchars($_POST['totalScore']);

    // Prepare SQL statement for insertion
    $sql = "INSERT INTO applicantscore (applicantID, applicant_score_part1, applicant_score_part2, applicant_score_part3, total_score)
            VALUES (:applicant_ID, :applicant_score_part1, :applicant_score_part2, :applicant_score_part3, :total_score)";
    
    // Bind parameters and execute SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':applicant_ID', $last_applicant_ID);
    $stmt->bindParam(':applicant_score_part1', $applicant_score_part1);
    $stmt->bindParam(':applicant_score_part2', $applicant_score_part2);
    $stmt->bindParam(':applicant_score_part3', $applicant_score_part3);
    $sum = $applicant_score_part1+$applicant_score_part2+$applicant_score_part3;
    $stmt->bindParam(':total_score', $sum);
    
    if ($stmt->execute()) {
        header("Location: table-records.php");
        exit(); // Ensure that script execution stops after redirection
    } else {
        echo "Error adding scores: " . $stmt->errorInfo()[2];
    }
}
?>
