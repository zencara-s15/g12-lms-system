<?php
// -----------------function attesting to employee----------------------------------------
// create employee
function create_employee(string $first_name, string $last_name, string $password, string $gender, string $email, string $date_of_birth, int $role_id, int $position_id, string $image_name, string $image_data): bool
{
    global $connection;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists in the database
    $existing_email_statement = $connection->prepare("SELECT password FROM users WHERE email = :email");
    $existing_email_statement->execute([':email' => $email]);
    $existing_email_result = $existing_email_statement->fetch();

    if ($existing_email_result) {
        // Email exists, check if the password matches
        if (password_verify($password, $existing_email_result['password'])) {
            // Password matches, so the employee already exists
            echo '<div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="alert alert-danger" role="alert">
                <div class="d-flex justify-content-center align-items-center">
                    <h3><i class="fa fa-exclamation-triangle" style="font-size:66px"></i></h3>
                    <p>Email and password combination already exists.</p>
                </div>
            </div>
        </div>';
            return false;
        } else {
            // Password doesn't match
            echo '
            <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="alert alert-danger" role="alert" style="max-width: 500px;">
                <div class="d-flex justify-content-center align-items-center">
                    <h3><i class="fa fa-exclamation-triangle" style="font-size:66px"></i></h3>
                </div>
                <p class="lead text-center">Email already exists but with a different password.</p>
            </div>
        </div>';
            return false;
        }
    }

    // Prepare the SQL statement to insert the new employee record
    $statement = $connection->prepare("INSERT INTO users (first_name, last_name, password, gender, email, dob, role_id, position_id, image_name, image_data) VALUES (:first_name, :last_name, :password, :gender, :email, :date_of_birth, :role_id, :position_id, :image_name, :image_data)");
    $success = $statement->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':password' => $hashed_password,
        ':gender' => $gender,
        ':email' => $email,
        ':date_of_birth' => $date_of_birth,
        ':role_id' => $role_id,
        ':position_id' => $position_id,
        ':image_name' => $image_name,
        ':image_data' => $image_data
    ]);

    // Return true if at least one row was affected (i.e., the insertion was successful)
    return $success;
}


//get all employees
function get_employees(): array
{
    global $connection;
    $statement = $connection->prepare("select * from users");
    $statement->execute();
    return $statement->fetchAll();
}

//get all employee by id 
function get_employee(int $id): array
{
    global $connection;
    $statement = $connection->prepare("select * from staffs where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

//count all employee
function count_users(): int
{
    global $connection;
    $statement = $connection->prepare("select count(*) as total from users");
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'];
}
//update employee
function update_employee(string $first_name, string $last_name, string $password, string $gender, string $email, string $date_of_birth, int $role_id, int $position_id, string $image_name, string $image_data, int $amount_leave, int $user_id): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, password = :password, gender = :gender, email = :email, dob = :date_of_birth, role_id = :role_id, position_id = :position_id, image_name = :image_name, image_data = :image_data,amount_leave = :amount_leave WHERE id = :user_id");
    $success = $statement->execute([
        ':user_id' => $user_id,
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':password' => $password,
        ':gender' => $gender,
        ':email' => $email,
        ':date_of_birth' => $date_of_birth,
        ':role_id' => $role_id,
        ':position_id' => $position_id,
        ':image_name' => $image_name,
        ':image_data' => $image_data,
        ':amount_leave' => $amount_leave

    ]);

    // Return true if the update was successful
    return $success;
}

// delete employee
function delete_employee(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from users where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

// get the employee with positions
function get_employees_with_positions(): array
{
    global $connection;
    $statement = $connection->prepare("
    SELECT u.id, u.image_data, u.first_name, u.last_name, u.email, p.position
    FROM users u
    JOIN positions p ON u.position_id = p.id
    ORDER BY u.id DESC    
        ");
    $statement->execute();
    return $statement->fetchAll();
}

// get all positions
function get_positions(): array
{
    global $connection;
    $statement = $connection->prepare("select * from positions");
    $statement->execute();
    return $statement->fetchAll();
}

// get all roles
function get_roles(): array
{
    global $connection;
    $statement = $connection->prepare("select * from roles");
    $statement->execute();
    return $statement->fetchAll();
}

// --------------------------------------------------------------------------------------
// function deletePost(int $id) : bool
// {
//     global $connection;
//     $statement = $connection->prepare("delete from posts where id = :id");
//     $statement->execute([':id' => $id]);
//     return $statement->rowCount() > 0;
// }

