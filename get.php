<?php
// upload_smtps.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'smtps' POST variable is set
    if (isset($_POST['smtps'])) {
        $smtpData = $_POST['smtps'];
        // Define the file path where the SMTP details will be saved
        $file = 'smtps.txt';

        // Write the SMTP data to the file. This example overwrites the existing file.
        // If you want to append instead, you can use FILE_APPEND.
        if (file_put_contents($file, $smtpData) !== false) {
            echo "SMTP details saved successfully.";
        } else {
            http_response_code(500);
            echo "Failed to save SMTP details.";
        }
    } else {
        http_response_code(400);
        echo "No SMTP data provided.";
    }
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
