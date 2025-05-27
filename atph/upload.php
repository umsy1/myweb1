<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES['image']['name']);
    $targetFilePath = $targetDir . $fileName;
    $caption = $_POST['caption'];

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
        // Insert image path and caption into the database
        $sql = "INSERT INTO images (image_path, caption) VALUES ('$targetFilePath', '$caption')";
        if ($conn->query($sql) === TRUE) {
            echo "File uploaded successfully.";
        } else {
            echo "Database error: " . $conn->error;
        }
    } else {
        echo "Failed to upload file.";
    }
}
?>