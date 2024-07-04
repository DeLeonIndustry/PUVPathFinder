<?php 
include('database.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $firstname = $conn->real_escape_string($_POST['name']);
    $middlename = $conn->real_escape_string($_POST['mname']);
    $surname = $conn->real_escape_string($_POST['surname']);
    $suffix = $conn->real_escape_string($_POST['suffix']);
    $address = $conn->real_escape_string($_POST['address']);
    $birthdate = $conn->real_escape_string($_POST['dob']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $idtype = $conn->real_escape_string($_POST['idtype']);
    $idno = $conn->real_escape_string($_POST['idno']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Password hashing (for security)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data into 'accounts' table
    $sql = "INSERT INTO accounts (name, mname, lname, suffix, address, dob, contact, idtype, idno, email, password, acctype, created_at)
            VALUES ('$firstname', '$middlename', '$surname', '$suffix', '$address', '$birthdate', '$contact', '$idtype', '$idno', '$email', '$hashed_password', 'Driver',NOW())";

    if ($conn->query($sql) === TRUE) {
        echo '<script>
        alert("Driver Account Created!");
        window.location.href = "../drivers.php";
    </script>';
    } else {
        echo '<script>
        alert("Error: ' . $conn->error . '");
        window.location.href = "../drivers.php";
    </script>';
    }
}

// Close connection
$conn->close();
?>