<?php

//--------------------------------------------------------
function get_user_info(string $email): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE email = :email");
    $statement->execute(
        [
            ':email' => $email
        ]
    );
    return $statement->fetch();
}

function create_leave_request(int $user_id, int $leave_type_id, string $start_date, string $end_date, string $status, string $description): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO leave_requests (user_id, leave_type_id, start_date,end_date, status, description) VALUES (:user_id,:leave_type_id, :start_date,:end_date, :status, :description)");
    $statement->execute([
        ':user_id' => $user_id,
        ':leave_type_id' => $leave_type_id,
        ':start_date' => $start_date,
        ':end_date' => $end_date,
        ':status' => $status,
        ':description' => $description,
    ]);

    return $statement->rowCount() > 0;
}

function calculate_leave_amount(string $amount, int $id): bool
{
    global $connection;
    $statement = $connection->prepare(" UPDATE users SET amount_leave = :amount WHERE id = :id");
    $statement->execute([
        ':amount' => $amount,
        ':id' => $id,
    ]);
    return $statement->rowCount() > 0;
}

function getHistory(int $user_id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT leave_requests.id,leave_types.leave_type,leave_requests.description ,leave_requests.start_date,leave_requests.end_date,leave_requests.user_id,leave_requests.status from leave_requests INNER JOIN leave_types ON leave_requests.leave_type_id = leave_types.id INNER JOIN users ON users.id = leave_requests.user_id WHERE leave_requests.user_id = :user_id AND leave_requests.status = 'Approved';");
    $statement->execute([
        ':user_id' => $user_id
    ]);
    return $statement->fetchAll();
}

function detailHistory($id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT leave_requests.id, leave_types.leave_type, leave_requests.description, leave_requests.start_date, leave_requests.end_date, leave_requests.user_id, leave_requests.status
    FROM leave_requests
    INNER JOIN leave_types ON leave_requests.leave_type_id = leave_types.id
    INNER JOIN users ON leave_requests.user_id = users.id
    WHERE leave_requests.id = :id");

    $statement->execute(
        [
            'id' => $id
        ]
    );

    return $statement->fetch();
}

// functions' calendar-----------------------------------------------------------

// display events
function display_events() {
    global $connection;
    $stmt = $connection->prepare("SELECT lr.id, lt.leave_type, lr.description, lr.start_date, lr.end_date FROM leave_requests lr JOIN leave_types lt ON lr.leave_type_id = lt.id");
    $stmt->execute();

    $events = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $events[] = array(
            'id' => $row['id'],
            'title' => $row['leave_type'],
            'start' => $row['start_date'],
            'end' => $row['end_date'],
            'description' => $row['description']
        );
    }

    return $events;
}

// insert leave request
function insert_leave_request($leave_type_id, $description, $start_date, $end_date, $user_id, $status) {
    global $connection;
    $stmt = $connection->prepare("INSERT INTO leave_requests (leave_type_id, description, start_date, end_date, user_id, status) VALUES (:leave_type_id, :description, :start_date, :end_date, :user_id, :status)");
    $stmt->execute(array(
        ':leave_type_id' => $leave_type_id,
        ':description' => $description,
        ':start_date' => $start_date,
        ':end_date' => $end_date,
        ':user_id' => $user_id,
        ':status' => $status,
    ));

    return "New record created successfully";
}


// update the leave request
function update_leave_request($id, $leave_type_update, $start_update, $end_update, $description_update) {
    global $connection;
    $stmt = $connection->prepare("UPDATE leave_requests SET leave_type_id = :leave_type_update, start_date = :start_update, end_date = :end_update, description = :description_update WHERE id = :id");

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':leave_type_update', $leave_type_update);
    $stmt->bindParam(':start_update', $start_update);
    $stmt->bindParam(':end_update', $end_update);
    $stmt->bindParam(':description_update', $description_update);

    $stmt->execute();

    return "Event updated successfully";
}

// delete the leave request
function delete_leave_request($id) {
    global $connection;
    $stmt = $connection->prepare("DELETE FROM leave_requests WHERE id = :id");

    $stmt->bindParam(':id', $id);

    $stmt->execute();

    return "Event deleted successfully";
}


function get_applied_leave(int $user_id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT leave_requests.id,leave_types.leave_type,leave_requests.description ,leave_requests.start_date,leave_requests.end_date,leave_requests.user_id,leave_requests.status 
    FROM leave_requests 
    INNER JOIN leave_types ON leave_requests.leave_type_id = leave_types.id 
    INNER JOIN users ON users.id = leave_requests.user_id 
    WHERE leave_requests.user_id = :user_id AND leave_requests.status = 'Pending'");
    $statement->execute([
        ':user_id' => $user_id
    ]);
    return $statement->fetchAll();
}

function get_applied_leave_detail($id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT leave_requests.id, leave_types.leave_type, leave_requests.description, leave_requests.start_date, leave_requests.end_date, leave_requests.user_id, leave_requests.status
    FROM leave_requests
    INNER JOIN leave_types ON leave_requests.leave_type_id = leave_types.id
    INNER JOIN users ON leave_requests.user_id = users.id
    WHERE leave_requests.id = :id");

    $statement->execute(
        [
            'id' => $id
        ]
    );
    return $statement->fetch();
}