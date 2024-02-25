<?php

function create_account(string $fristname, string $lastname, string $password, string $gender, string $email, string $role, string $image_data): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO users (first_name, last_name, password,gender, email, role_id,image_data) VALUES (:first_name,:last_name, :password,:gender, :email, :role_id, :image_data)");
    $statement->execute([
        ':first_name' => $fristname,
        ':last_name' => $lastname,
        ':password' => $password,
        ':gender' => $gender,
        ':email' => $email,
        ':role_id' => $role,
        ':image_data' => $image_data,
    ]);

    return $statement->rowCount() > 0;
}


function account_exist(string $email): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE email = :email");
    $statement->execute([
        ':email' => $email
    ]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}


// function updatePost(string $title, string $description, int $id) : bool
// {
//     global $connection;
//     $statement = $connection->prepare("update posts set title = :title, description = :description where id = :id");
//     $statement->execute([
//         ':title' => $title,
//         ':description' => $description,
//         ':id' => $id

//     ]);

//     return $statement->rowCount() > 0;
// }

// function deletePost(int $id) : bool
// {
//     global $connection;
//     $statement = $connection->prepare("delete from posts where id = :id");
//     $statement->execute([':id' => $id]);
//     return $statement->rowCount() > 0;
// }