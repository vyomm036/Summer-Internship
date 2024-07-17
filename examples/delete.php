<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atul";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$formData = json_decode(file_get_contents('php://input'), true);
$formID = $formData['formID'];

// Delete options related to questions of the form
$stmt = $conn->prepare("DELETE Options FROM Options
                        JOIN Questions ON Options.QuestionID = Questions.QuestionID
                        WHERE Questions.FormID = ?");
$stmt->bind_param("i", $formID);
$stmt->execute();
$stmt->close();

// Delete questions related to the form
$stmt = $conn->prepare("DELETE FROM Questions WHERE FormID = ?");
$stmt->bind_param("i", $formID);
$stmt->execute();
$stmt->close();

// Delete the form
$stmt = $conn->prepare("DELETE FROM Forms WHERE FormID = ?");
$stmt->bind_param("i", $formID);
$stmt->execute();
$stmt->close();

$conn->close();
echo json_encode(["status" => "success", "message" => "Form deleted successfully"]);
