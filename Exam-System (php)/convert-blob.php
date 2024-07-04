<?php
try {
    
    $conn = new PDO("mysql:host=localhost;dbname=applicant-records", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $stmt = $conn->prepare("SELECT id, name FROM applicantrecord");
    $stmt->execute();
    $applicants = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $dataFromDatabase = [];


    foreach ($applicants as $applicant) {
     
        $filename = "{$applicant['id']}_{$applicant['name']}_form.pdf";

        $dataFromDatabase[] = [
            'id' => $applicant['id'],
            'name' => $applicant['name'],
            'applicant_form_filename' => $filename
        ];
    }

    echo json_encode($dataFromDatabase);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
