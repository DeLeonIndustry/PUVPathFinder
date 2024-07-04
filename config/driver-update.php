<?php
session_start();
require 'database.php'; // Ensure this points to your database connection script

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Output the entire $_POST array to see what's being sent

    // Get the form values
    $status = $_POST['status'] ?? ''; // Assuming 1 for active and 0 for inactive
    $curloc = $_POST['curloc'] ?? ''; // Use null coalescing operator for safety
    $route = $_POST['route'] ?? '';
    $qstat = $_POST['qstat'] ?? '';


    // Get the session ID (adjust as needed based on your session structure)
    $session_id = $_SESSION['admin_id'] ?? 0; // Ensure the session ID is set and valid


    // Validate inputs (add more validation as needed)
    if (!empty($curloc) && !empty($route) && !empty($qstat) && $session_id > 0) {
        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE accounts SET status = ?, curloc = ?, route = ?, qstat = ?, deptime = NOW() WHERE id = ?");
        $stmt->bind_param("ssssi", $status, $curloc, $route, $qstat, $session_id); // Assuming id is an integer

        // Execute the query
        if ($stmt->execute()) {
            echo '<script>
                    alert("Update Complete!");
                   window.location.href = "../index.php";
                </script>';
        } else {
            echo '<script>
                    alert("There was an error updating data.");
                   window.location.href = "../index.php";
                </script>';
        }

        // Close the statement
        $stmt->close();
    } else {
        echo '<script>
                alert("Please fill in all required fields.");
                window.location.href = "../index.php";
            </script>';
    }

    // Close the database connection
    $conn->close();
} else {
    echo '<script>
            alert("Form submission method not POST.");
          window.location.href = "../index.php";
        </script>';
}
