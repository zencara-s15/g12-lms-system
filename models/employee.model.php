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
