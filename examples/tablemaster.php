<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atul"; // Replace with your actual database name
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Get JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Insert form data
if ($_SERVER["REQUEST_METHOD"] == "POST" && $data) {
    $title = $conn->real_escape_string($data['formName']);
    $description = $conn->real_escape_string($data['formDescription']);

    // Insert into Forms table
    $sql = "INSERT INTO Forms (Title, Description) VALUES ('$title', '$description')";
    if ($conn->query($sql) === TRUE) {
        $form_id = $conn->insert_id;
        // Insert questions
        foreach ($data['questions'] as $question) {
            $questionText = $conn->real_escape_string($question['text']);
            $fieldType = $conn->real_escape_string($question['type']);
            $sql = "INSERT INTO Questions (FormID, QuestionText, FieldType) VALUES ('$form_id', '$questionText', '$fieldType')";
            if ($conn->query($sql) === TRUE) {
                $question_id = $conn->insert_id;

                if (isset($question['options'])) {
                    foreach ($question['options'] as $option) {
                        $optionText = $conn->real_escape_string($option);

                        $sql = "INSERT INTO Options (QuestionID, OptionText) VALUES ('$question_id', '$optionText')";
                        $conn->query($sql);
                    }
                }
            }
        }
        echo "Form saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>