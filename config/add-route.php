<?php 
include('database.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $municipal = $conn->real_escape_string($_POST['municipal']);
    $terminal = $conn->real_escape_string($_POST['terminal']);
    $latitude = $conn->real_escape_string($_POST['latitude']);
    $longitude = $conn->real_escape_string($_POST['longitude']);

    // SQL query to insert data into 'routes' table
    $sql = "INSERT INTO routes (municipal, terminal, latitude, longitude, created_at)
            VALUES ('$municipal', '$terminal', '$latitude', '$longitude', NOW())";

    if ($conn->query($sql) === TRUE) {

        echo '<script>
        alert("Route Created!");
        window.location.href = "../index.php";
    </script>';

    } else {
        echo '<script>
        alert("Error: ' . $conn->error . '");
        window.location.href = "../index.php";
    </script>';
     
    }
}

// Close connection
$conn->close();
?>