<?php
 require_once '../../database/database.php';
 require_once '../../models/employee.model.php';
try {
    // Check if the ID parameter is set
    if(isset($_POST['id'])) {
        // Delete leave request
        $result = delete_leave_request($_POST['id']);
        echo $result;
    } else {
        echo "Event ID not provided";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
