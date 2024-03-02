<?php

//--------------------------------------------------------


function create_leave_request(int $user_id, int $leave_type_id, string $start_date, string $end_date, string $status, string $description): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO users (user_id, leave_type_id, start_date,end_date, status, description) VALUES (:user_id,:leave_type_id, :start_date,:end_date, :status, :description)");
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