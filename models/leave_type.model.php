<?php
function createleave_type(string $leave_type): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO leave_types (leave_type) VALUES (:leave_type)");
    $statement->execute([
        ':leave_type' => $leave_type,

    ]);

    return  $statement->rowCount() > 0;
}


function getleave_types(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM leave_types");
    $statement->execute();
    return $statement->fetchAll();
}

function get_leave_type(int $id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM leave_types WHERE id = :id");
    $statement->execute(
        [
            ':id' => $id,
        ]
    );
    return $statement->fetch();
}


function updateleave_type(string $leave_type, int $id): bool
{
    global $connection;
    $statement = $connection->prepare(" UPDATE leave_types SET leave_type = :leave_type, id =:id  where id = :id");
    $statement->execute([
        ':leave_type' => $leave_type,
        ':id' => $id,

    ]);

    return $statement->rowCount() > 0;
}

function deleteleave_type(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("DELETE FROM leave_types WHERE id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}
