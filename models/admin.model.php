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
        // Email already exists
        return false;
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
    $statement = $connection->prepare("select * from users where id = :id");
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

//------------------------------Fuction related to Position --------------------------------------------------------------

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

// -------------------------Leave Request-------------------------------------------------------------

// get all leave request to display
function get_leave_requests(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT  leave_requests.id , users.first_name, users.last_name, departments.department, leave_types.leave_type, leave_requests.start_date, leave_requests.end_date, leave_requests.description, leave_requests.status 
    FROM departments 
    INNER JOIN leave_requests on departments.id = leave_requests.department_id 
    INNER JOIN leave_types ON leave_types.id = leave_requests.leave_type_id 
    INNER JOIN users on users.id = leave_requests.user_id");
    $statement->execute();
    return $statement->fetchAll();
}

//count request leave
function count_leave_requests(): int
{
    global $connection;
    $statement = $connection->prepare("select count(*) as total from leave_requests");
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'];
}

// update leave status
function update_leave_status(string $status, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE leave_requests SET status = :status WHERE id = :id");
    $statement->execute([
        ':status' => $status,
        ':id' => $id
    ]);
    return $statement->rowCount() > 0;
}

// leave detail
function get_leave_request_detail(int $id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT users.first_name, users.last_name, departments.department, leave_types.leave_type ,leave_requests.description , leave_requests.start_date, leave_requests.end_date 
    FROM leave_requests 
    INNER JOIN departments on departments.id = leave_requests.department_id
    INNER JOIN leave_types ON leave_types.id = leave_requests.leave_type_id
    INNER JOIN users on users.id = leave_requests.user_id
    WHERE leave_requests.id = :id");
    $statement->execute([
        ':id' => $id
    ]);
    return $statement->fetch();
}

// all approve leave display in report page
function get_aprroved_leave(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT leave_requests.id, users.first_name, users.last_name, departments.department, leave_requests.start_date, leave_requests.end_date, leave_requests.status
    FROM leave_requests
    INNER JOIN users ON users.id = leave_requests.user_id
    INNER JOIN departments ON departments.id = users.department_id
    WHERE leave_requests.status = 'Approved'");
    
    $statement->execute();
    return $statement->fetchAll();
}

//----------------------leave-type-----------------------------------------------------------

//create leave type 
function create_leave_type(string $leave_type): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO leave_types (leave_type) VALUES (:leave_type)");
    $statement->execute([
        ':leave_type' => $leave_type,

    ]);
    return  $statement->rowCount() > 0;
}

//display leave type
function get_leave_types(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM leave_types");
    $statement->execute();
    return $statement->fetchAll();
}


//display leave type by ID
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

//update leave type
function update_leave_type(string $leave_type, int $id): bool
{
    global $connection;
    $statement = $connection->prepare(" UPDATE leave_types SET leave_type = :leave_type, id =:id  where id = :id");
    $statement->execute([
        ':leave_type' => $leave_type,
        ':id' => $id,
    ]);
    return $statement->rowCount() > 0;
}

// delete leave type 
function delete_leave_type(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("DELETE FROM leave_types WHERE id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}


//------------------------------Department-------------------------------------------------------

// create department 
function create_department(string $name) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into departments (department) values (:department)");
    $statement->execute([
        "department" => $name
    ]);
    return $statement->rowCount() > 0;
}

// get all department to display 
function get_departments() : array 
{
    global $connection;
    $statement = $connection->prepare("select * from departments");
    $statement->execute();
    return $statement->fetchAll();
}

//delete department
function delete_department(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("DELETE FROM departments WHERE id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

//update department
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
