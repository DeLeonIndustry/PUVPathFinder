<?php
$locations_query = "SELECT municipal, terminal, latitude, longitude FROM routes";
$locations_result = $conn->query($locations_query);

$routes_query = "SELECT municipal, terminal, latitude, longitude FROM routes";
$routes_result = $conn->query($routes_query);

$locations_count_query = "SELECT COUNT(DISTINCT municipal, terminal) as count FROM routes";
$locations_count_result = $conn->query($locations_count_query);

// Fetch the count result
$locations_count = 0;
if ($locations_count_result) {
    $row = $locations_count_result->fetch_assoc();
    $locations_count = $row['count'];
}

$locations_driver_query = "SELECT COUNT(DISTINCT name) as count FROM accounts WHERE acctype = 'Driver'";
$locations_driver_result = $conn->query($locations_driver_query);

// Fetch the count result for Drivers
$driver_count = 0;
if ($locations_driver_result) {
    $row = $locations_driver_result->fetch_assoc();
    $driver_count = $row['count'];
}

// Fetch the count of unique municipal and terminal combinations for Commuters
$locations_commuter_query = "SELECT COUNT(DISTINCT name) as count FROM accounts WHERE acctype = 'Commuters'";
$locations_commuter_result = $conn->query($locations_commuter_query);

// Fetch the count result for Commuters
$commuter_count = 0;
if ($locations_commuter_result) {
    $row = $locations_commuter_result->fetch_assoc();
    $commuter_count = $row['count'];
}

$drivers_in_route_query = "SELECT COUNT(DISTINCT name) as count FROM accounts WHERE acctype = 'Driver' AND status = 1";
$drivers_in_route_result = $conn->query($drivers_in_route_query);

// Fetch the count result for Drivers in route with acctype = 'Driver' and status = 1
$drivers_in_route_count = 0;
if ($drivers_in_route_result) {
    $row = $drivers_in_route_result->fetch_assoc();
    $drivers_in_route_count = $row['count'];
}
?>