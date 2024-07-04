<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('database.php'); // Ensure this file contains your database connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPass = isset($_POST['currentPass']) ? $_POST['currentPass'] : '';
    $newPass = isset($_POST['newPass']) ? $_POST['newPass'] : '';
    $confirmPass = isset($_POST['confirmPass']) ? $_POST['confirmPass'] : '';

    // Trim input values to remove whitespace
    $newPass = trim($newPass);
    $confirmPass = trim($confirmPass);

    // Log input values to debug
    error_log("newPass: $newPass, confirmPass: $confirmPass");

    if ($newPass !== $confirmPass) {
        echo '<script>alert("New password and confirm password do not match.")</script>'; 
        header("Location: ../profile-edit.php");
        exit();
    } else {
        // Retrieve email and role from session
        if (!isset($_SESSION['email']) || !isset($_SESSION['role'])) {
            echo '<script>alert("Session error: User not logged in.")</script>'; 
            header("Location: ../profile-edit.php");
            exit();
        }
        $email = $_SESSION['email'];
        $role = $_SESSION['role'];

        // Fetch current password hash from the appropriate table
        if ($role === 'Admin') {
            $table = 'admin';
        } elseif ($role === 'Driver' || $role === 'Commuters') {
            $table = 'accounts';
        } else {
            echo '<script>alert("Invalid user role.")</script>'; 
            header("Location: ../profile-edit.php");
            exit();
        }

        $sql = "SELECT password FROM $table WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($dbCurrentPass);
        $stmt->fetch();
        $stmt->close();

        // Verify current password and update if correct
        if (password_verify($currentPass, $dbCurrentPass)) {
            $hashedNewPass = password_hash($newPass, PASSWORD_DEFAULT);
            $sql = "UPDATE $table SET password = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $hashedNewPass, $email);

            if ($stmt->execute()) {
                echo '<script>
                alert("Password successfully updated.");
                window.location.href = "../profile-edit.php";
            </script>';
            } else {
                echo '<script>
                alert("Error updating password.");
                window.location.href = "../profile-edit.php";
            </script>';
            }
            $stmt->close();
        } else {
            echo '<script>
                alert("Current password is incorrect.");
                window.location.href = "../profile-edit.php";
            </script>';
        }
    }
}

$conn->close();
?>
