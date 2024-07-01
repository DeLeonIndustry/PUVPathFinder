<?php
include("database.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userTypeDriver = isset($_POST['userTypeDriver']) ? $_POST['userTypeDriver'] : ''; // Check if Driver is selected
    $userTypeCommuter = isset($_POST['userTypeCommuter']) ? $_POST['userTypeCommuter'] : ''; // Check if Commuter is selected

    if (!empty($userTypeDriver)) {
        // Query accounts table for Driver
        $sql = "SELECT id, name, email, 'Driver' AS role, password FROM accounts WHERE email = ? AND acctype = ?";
        $role = 'Driver'; // Set role to Driver
    } elseif (!empty($userTypeCommuter)) {
        // Query accounts table for Commuter
        $sql = "SELECT id, name, email, 'Commuters' AS role, password FROM accounts WHERE email = ? AND acctype = ?";
        $role = 'Commuter'; // Set role to Commuter
    } else {
        // Default to admin if no userType selected
        $sql = "SELECT id, name, email, 'Admin' AS role, password FROM admin WHERE email = ?";
        $role = 'Admin';
    }

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        if (!empty($userTypeDriver)) {
            $stmt->bind_param("ss", $email, $userTypeDriver);
        } elseif (!empty($userTypeCommuter)) {
            $stmt->bind_param("ss", $email, $userTypeCommuter);
        } else {
            $stmt->bind_param("s", $email);
        }
        
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $name, $emailResult, $roleResult, $hashed_password);
        $stmt->fetch();

        if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
            $_SESSION['admin_id'] = $id;
            $_SESSION['admin_name'] = $name; // Store the name in session
            $_SESSION['role'] = $roleResult; // Use roleResult from query
            $_SESSION['email'] = $emailResult; // Use emailResult from query
            header("Location: ../index.php");
            exit();
        } else {
            echo '<script>alert("Invalid email or password.")</script>'; 
            header("Location: ../index.php");
        }

        $stmt->close();
    } else {
        echo '<script>alert("Error preparing statement: " . $conn->error)</script>'; 
        header("Location: ../index.php");
    }
}

$conn->close();
?>
