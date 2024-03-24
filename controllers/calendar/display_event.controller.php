<?php 
 require_once '../../database/database.php';
 require_once '../../models/employee.model.php';
 try {
    // Fetch events
    $events = display_events();
    // Output JSON encoded events
    echo json_encode($events);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}