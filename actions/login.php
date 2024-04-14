<?php
session_start();
include('connect.php');

$username = $_POST['username'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$std = $_POST['std'];

// Fetch hashed password from database
$sql = "SELECT * FROM `userdata` WHERE username ='$username' AND mobile ='$mobile' AND standard = '$std'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result);
    $hashed_password = $data['password'];

    // Verify the password
    if (password_verify($password, $hashed_password)) {
        $_SESSION['id'] = $data['id'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['data'] = $data;
        $_SESSION['standard'] = $data['standard'];

        if ($std == "poll creator") {
            echo '<script>
                window.location = "../partials/createpolldashboard.php";
            </script>';
            exit; // Exit to prevent further execution
        }

        // Check if the user is a group or single voter
        if ($std == "group" || $std == "single voter") {
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Engage Dialog</title>
                <style>
                    /* Modal styles */
                    .modal {
                        display: none;
                        position: fixed;
                        z-index: 1000;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.5);
                    }
                    .modal-content {
                        background-color: white;
                        margin: 25% auto;
                        padding: 20px;
                        border: 1px solid #888;
                        width: 50%;
                        text-align: center;
                    }
                    .button {
                        margin: 10px;
                        padding: 10px 20px;
                        cursor: pointer;
                    }
                </style>
            </head>
            <body>
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <p>Do you want to engage in Elections or Polls?</p>
                        <button class="button" id="electionsButton">Elections</button>
                        <button class="button" id="pollsButton">Polls</button>
                    </div>
                </div>

                <script>
                    // Get the modal
                    var modal = document.getElementById("modal");

                    // Get the buttons
                    var electionsButton = document.getElementById("electionsButton");
                    var pollsButton = document.getElementById("pollsButton");

                    // When the user clicks the Elections button, redirect to dashboard.php
                    electionsButton.onclick = function() {
                        window.location = "../partials/dashboard.php";
                    }

                    // When the user clicks the Polls button, redirect to pollsvoting.php
                    pollsButton.onclick = function() {
                        window.location = "pollsvoting.php";
                    }

                    // Display the modal
                    modal.style.display = "block";
                </script>
            </body>
            </html>';
            exit; // Exit to prevent further execution
        }
    } else {
        echo '<script>
            alert("Invalid credentials");
            window.location = "../";
        </script>';
    }
} else {
    echo '<script>
        alert("Invalid credentials");
        window.location = "../";
    </script>';
}
?>
