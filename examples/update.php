<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atul";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$formID = $_POST['formID'];
$title = $_POST['title'];
$description = $_POST['description'];

// Update form in Forms table
$stmt = $conn->prepare("UPDATE Forms SET Title = ?, Description = ? WHERE FormID = ?");
$stmt->bind_param("ssi", $title, $description, $formID);
$stmt->execute();
$stmt->close();
$conn->close();

// Redirect back to the main page or show a success message
header("Location: tables.php");
exit;
?>