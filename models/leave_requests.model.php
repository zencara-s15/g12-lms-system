<?php

function get_leave_requests(): array
{
    global $connection;
    $statement = $connection->prepare("select * from request");
    $statement->execute();
    return $statement->fetchAll();
}

function update_leave_status(string $status, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE request SET status = :status WHERE id = :id");
    $statement->execute([
        ':status' => $status,
        ':id' => $id
    ]);
    return $statement->rowCount() > 0;

}