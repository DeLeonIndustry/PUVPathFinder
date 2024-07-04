<?php
include('database.php');

// Query to fetch route coordinates with municipal and terminal attributes
$sql = "SELECT id, latitude, longitude, municipal, terminal FROM routes";
$result = $conn->query($sql);

$routes = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $routes[] = [
            'id' => $row['id'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
            'municipal' => $row['municipal'],
            'terminal' => $row['terminal']
        ];
    }
}

$conn->close();
?>