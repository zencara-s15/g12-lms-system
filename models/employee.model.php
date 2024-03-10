<?php

//--------------------------------------------------------
function get_user_info(int $id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE id = :id");
    $statement->execute(
        [
            ':id' => $id
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
