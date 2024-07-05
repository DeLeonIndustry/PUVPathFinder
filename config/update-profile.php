<?php
session_start();
include('database.php'); // Make sure you include your DB connection file

$admin_id = $_SESSION['admin_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch form data
    $plateno = isset($_POST['plateno']) ? $_POST['plateno'] : '';
    $tovehicle = isset($_POST['tovehicle']) ? $_POST['tovehicle'] : '';
    $name = $_POST['name'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $suffix = $_POST['suffix'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];



    // Prepare and execute the update query
    if ($_SESSION['role'] === 'Driver') {
        $query = "UPDATE accounts SET plateno = ?, tovehicle = ?, name = ?, mname = ?, lname = ?, suffix = ?, email = ?, address = ?, dob = ?, contact = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssssssssi', $plateno, $tovehicle, $name, $mname, $lname, $suffix, $email, $address, $dob, $contact, $admin_id);
    } else {
        $query = "UPDATE accounts SET name = ?, mname = ?, lname = ?, suffix = ?, email = ?, address = ?, dob = ?, contact = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssssssi', $name, $mname, $lname, $suffix, $email, $address, $dob, $contact, $admin_id);
    }

    if ($stmt->execute()) {
        echo '<script>
        alert("Profile updated successfully");
       window.location.href = "../profile.php";
    </script>';
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
