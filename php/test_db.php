<?php
include 'includes/db.php';

$db = new Database();
$conn = $db->connect();

// Test query
$stmt = $conn->query("SELECT 1");
if ($stmt) {
    echo "Database connection and query test successful!";
} else {
    echo "Database test failed.";
}
?>