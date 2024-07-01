<?php
session_start();

// Check session ID
$sessionId = session_id();
echo "Session ID: $sessionId<br>";

// Check session contents
echo "Session Contents:<br>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>