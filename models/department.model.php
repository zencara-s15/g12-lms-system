<?php
function add_department(string $name) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into departments (department) values (:department)");
    $statement->execute([
        "department" => $name
    ]);
    return $statement->rowCount() > 0;
}

function get_departments() : array 
{
    global $connection;
    $statement = $connection->prepare("select * from departments");
    $statement->execute();
    return $statement->fetchAll();
}

//------------------delete department
function delete_department(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("DELETE FROM departments where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}



function update_department_name(string $department_name, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE departments set department = :department 
    where id = :id");
    $statement->execute([
        ':department' => $department_name,
        ':id' => $id,
    ]);
    return $statement-> fetch();
}

// edit department
function edit_departments(int $id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM departments WHERE id= :id");
    $statement->execute(
        [
            ':id' => $id,
        ]
    );
    return $statement->fetch();
}
