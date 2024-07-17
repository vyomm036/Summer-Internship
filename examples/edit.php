<?php
if (isset($_GET['formID'])) {
    include 'db.php';
    $formID = $_GET['formID'];
    // Fetch form details from the database based on the formID
    $sql = "SELECT * FROM forms WHERE FormID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $formID);
    $stmt->execute();
    $result = $stmt->get_result();
    // Check if the query was successful
    if ($result && $formData = $result->fetch_assoc()) {
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Form</title>
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
            <!-- CSS Files -->
            <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
            <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
            <!-- CSS Just for demo purpose, don't include it in your project -->
            <link href="../assets/demo/demo.css" rel="stylesheet" />
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f3ef;
                    padding: 20px;
                }

                h1 {
                    text-align: center;
                    margin-bottom: 20px;
                }

                form {
                    max-width: 800px;
                    margin: 0 auto;
                    background: #fff;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                label {
                    display: block;
                    margin-bottom: 5px;
                }

                input[type="text"],
                textarea {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 10px;
                    border: 1px solid #ccc;
                    border-radius: 15px;
                    box-sizing: border-box;
                }

                textarea {
                    height: 50px;
                    /* Set the height of the textarea */
                }

                input[type="submit"] {
                    background-color: #51cbce;
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 25px;
                    cursor: pointer;
                    font-size: 16px;
                }

                input[type="submit"]:hover {
                    background-color: #259ab4;
                }
            </style>
        </head>

        <body>
            <div class="wrapper">
                <div class="sidebar" data-color="white" data-active-color="danger">
                    <div class="logo">
                        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
                            <div class="logo-image-small">
                                <img src="../assets/img/logo-small.png">
                            </div>
                            <!-- <p>CT</p> -->
                        </a>
                        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
                            Form Creation
                            <!-- <div class="logo-image-big">
                         <img src="../assets/img/logo-big.png">
                           </div> -->
                        </a>
                    </div>
                    <div class="sidebar-wrapper">
                        <ul class="nav">
                            <li>
                                <a href="./dashboard.html">
                                    <i class="nc-icon nc-bank"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="active">
                                <a href="./new_form.html">
                                    <i class="nc-icon nc-single-copy-04"></i>
                                    <p>Create new form</p>
                                </a>
                            </li>
                            <li>
                            <li>
                                <a href="./preview.html">
                                    <i class="nc-icon nc-paper"></i>
                                    <p>Preview form</p>
                                </a>
                            </li>
                            <li>
                            <li>
                                <a href="./user.html">
                                    <i class="nc-icon nc-single-02"></i>
                                    <p>User Profile</p>
                                </a>
                            </li>
                            <li>
                                <a href="./tables.php">
                                    <i class="nc-icon nc-tile-56"></i>
                                    <p>Table List</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <h3>Edit Form</h3>
                <form action="update.php" method="post">
                    <input type="hidden" name="formID" value="<?= $formData['FormID'] ?>">
                    <h3><label for="title">Title:</label></h3>
                    <input type="text" id="title" name="title" value="<?= $formData['Title'] ?>">
                    <h3><label for="description">Description:</label></h3>
                    <textarea id="description" name="description"><?= $formData['Description'] ?></textarea>
                    <input type="submit" value="Save changes">
                </form>
            </div>
        </body>

        </html>
<?php
    } else {
        // Handle the case where the formID is invalid or not found in the database
        echo "Error: Form not found";
    }
    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Handle the case where formID parameter is missing in the URL
    echo "Error: Missing formID parameter";
}
?>