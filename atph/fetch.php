<?php
include 'db.php';

$sql = "SELECT * FROM images ORDER BY id DESC";
$result = $conn->query($sql);

$images = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = $row;
    }
}
header('Content-Type: application/json');
echo json_encode($images);
?>