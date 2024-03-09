<?php

function createPost(string $title, string $description): bool
{
    global $connection;
    $statement = $connection->prepare("insert into posts (title, description) values (:title, :description)");
    $statement->execute([
        ':title' => $title,
        ':description' => $description

    ]);

    return $statement->rowCount() > 0;
}

function getPost(int $id): array
{
    global $connection;
    $statement = $connection->prepare("select * from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}


function getPosts(): array
{
    global $connection;
    $statement = $connection->prepare("select * from posts");
    $statement->execute();
    return $statement->fetchAll();
}

function updatePost(string $title, string $description, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("update posts set title = :title, description = :description where id = :id");
    $statement->execute([
        ':title' => $title,
        ':description' => $description,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}

function deletePost(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from posts where id = :id");
    $statement->execute([':id' => $id]);
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
