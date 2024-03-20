<?php

//  -------------------form login and reset password---------------------------------------------


//  ______________________________for login and reset password_________________________________________________________

// to check accound by email
function account_exist(string $email): array
{
    global $connection;
    $statement = $connection->prepare("SELECT users.email, users.password, users.role_id FROM users INNER JOIN roles ON users.role_id = roles.id WHERE users.email = :email");
    $statement->execute([
        ':email' => $email
    ]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}




//  reset password
function reset_password(string $email, string $password): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE users SET password = :password WHERE email = :email;");
    $statement->execute([
        ':password' => $password,
        ':email' => $email
    ]);
    return $statement->rowCount() > 0;
}


// ______________________end login and reset______________________________________________

//  for profile information
function account_infor(string $email): array
{
    global $connection;
    $statement = $connection->prepare("SELECT users.id, users.first_name, users.image_data, users.gender, 
    users.last_name, users.email, roles.role AS role_id,
    positions.position AS position_id  FROM users 
    INNER JOIN roles ON users.role_id = roles.id 
    INNER JOIN positions ON users.position_id = positions.id
    WHERE users.email = :email;");
    $statement->execute([
        ':email' => $email
    ]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}


//  for profile 
function profile_personals(string $email): array
{
    global $connection;
    $statement = $connection->prepare("SELECT users.id, users.first_name, users.image_data, users.image_name, users.gender, users.user_name,
    users.last_name, users.email, roles.role AS role_id, positions.position AS position_id
    FROM users INNER JOIN roles ON users.role_id = roles.id INNER JOIN positions ON users.position_id = positions.id WHERE users.email = :email");
    $statement->execute([
        ":email" => $email
    ]);

    if ($statement->rowCount() > 0) {
        return $statement->fetch(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}

function update_profile(string $email, string $firstName, string $lastName, string $gender): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE users 
        INNER JOIN departments ON users.department_id = departments.id
        SET users.first_name = :firstName, users.last_name = :lastName, users.gender = :gender
        WHERE users.email = :email");

    $statement->execute([
        ':email' => $email,
        ':firstName' => $firstName,
        ':lastName' => $lastName,
        ':gender' => $gender
    ]);

    return $statement->rowCount() > 0;
}



// -----------------function attesting to employee----------------------------------------

// create employee
function create_employee(string $first_name, string $last_name, string $password, string $gender, string $email, string $date_of_birth, int $role_id, int $position_id, string $image_name, string $image_data, $amount_leave): bool
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
    $statement = $connection->prepare("INSERT INTO users (first_name, last_name, password, gender, email, dob, role_id, position_id, image_name, image_data,amount_leave) VALUES (:first_name, :last_name, :password, :gender, :email, :date_of_birth, :role_id, :position_id, :image_name, :image_data,:amount_leave)");
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
        ':image_data' => $image_data,
        ':amount_leave' => $amount_leave
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
    $statement = $connection->prepare("select count(*) as total from users where role_id = 2");
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'];
}
//update employee
function update_employees(string $first_name, string $last_name, string $gender, string $email, string $date_of_birth, int $role_id, int $position_id, string $image_name, string $image_data, int $amount_leave, int $user_id): bool
{
    global $connection;
    // Check if email already exists for another user
    $existingEmailStatement = $connection->prepare("SELECT id FROM users WHERE email = :email AND id != :user_id");
    $existingEmailStatement->execute([
        ':email' => $email,
        ':user_id' => $user_id
    ]);
    $existingEmail = $existingEmailStatement->fetch(PDO::FETCH_ASSOC);
    if ($existingEmail) {
        // Notify the admin or handle the duplicate email situation as needed
        return false; // Return false if email already exists
    }

    // Proceed with the update operation
    $statement = $connection->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, gender = :gender, email = :email, dob = :date_of_birth, role_id = :role_id, position_id = :position_id, image_name = :image_name, image_data = :image_data, amount_leave = :amount_leave WHERE id = :user_id");
    $success = $statement->execute([
        ':user_id' => $user_id,
        ':first_name' => $first_name,
        ':last_name' => $last_name,
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

function update_employee(string $first_name, string $last_name, string $gender, string $email, string $date_of_birth, int $role_id, int $position_id, int $amount_leave, int $user_id): bool
{
    global $connection;
    // Check if email already exists for another user
    $existingEmailStatement = $connection->prepare("SELECT id FROM users WHERE email = :email AND id != :user_id");
    $existingEmailStatement->execute([
        ':email' => $email,
        ':user_id' => $user_id
    ]);
    $existingEmail = $existingEmailStatement->fetch(PDO::FETCH_ASSOC);
    if ($existingEmail) {
        // Notify the admin or handle the duplicate email situation as needed
        return false; // Return false if email already exists
    }

    // Proceed with the update operation
    $statement = $connection->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, gender = :gender, email = :email, dob = :date_of_birth, role_id = :role_id, position_id = :position_id, amount_leave = :amount_leave WHERE id = :user_id");
    $success = $statement->execute([
        ':user_id' => $user_id,
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':gender' => $gender,
        ':email' => $email,
        ':date_of_birth' => $date_of_birth,
        ':role_id' => $role_id,
        ':position_id' => $position_id,
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
    WHERE u.role_id = 2
    ORDER BY u.id DESC    
        ");
    $statement->execute();
    return $statement->fetchAll();
}

//------------------------------Fuction related to Position --------------------------------------------------------------

function count_users_by_position()
{
    global $connection;
    $query = "SELECT position_id, COUNT(*) AS user_count
              FROM users
              GROUP BY position_id";
    
    $statement = $connection->prepare($query);
    $statement->execute();
    
    $countByPosition = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $positionId = $row['position_id'];
        $userCount = $row['user_count'];
        $countByPosition[$positionId] = intval($userCount);
    }
    
    return $countByPosition;
}
function get_postion_to_chartPie(): array {
    global $connection;
    $statement = $connection->prepare("SELECT positions.position FROM users
    INNER JOIN positions ON users.position_id = positions.id
    GROUP BY users.position_id");
    $statement->execute();
    $positions = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
    return array_map('strval', $positions);
}
// get all positions
function get_positions(): array
{
    global $connection;
    $statement = $connection->prepare("select * from positions");
    $statement->execute();
    return $statement->fetchAll();
}

// get positions from department
function get_postion_from_department($id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT
    positions.id,
    positions.position,
    departments.department
    FROM positions 
    INNER JOIN departments ON departments.id = positions.department_id
    WHERE departments.id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetchAll();
}


// create position
function create_position(string $position, int $department_id): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO positions (position, department_id) VALUES (:position, :department_id)");
    $statement->execute([
        ':position' => $position,
        ':department_id' => $department_id,

    ]);
    return  $statement->rowCount() > 0;
}

// get position where id
function get_position(int $id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM positions where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

// delete position

function delete_position(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("DELETE from positions where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

// update positions
function update_position(string $position_name, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE positions set position = :position WHERE id = :id");

    $statement->execute([
        ':position' => $position_name,
        ':id' => $id,
    ]);
    return $statement->fetch();
}

// edit position
function edit_position(int $id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM positions WHERE id= :id");
    $statement->execute(
        [
            ':id' => $id,
        ]
    );
    return $statement->fetch();
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
    $statement = $connection->prepare("SELECT
	leave_requests.id,
    users.first_name,
    users.last_name,
    users.image_data,
    positions.position,
    leave_types.leave_type,
    leave_requests.status,
    leave_requests.description,
    leave_requests.start_date,
    leave_requests.end_date,
    users.email
    FROM leave_requests
    INNER JOIN leave_types ON leave_types.id = leave_requests.leave_type_id
    INNER JOIN users ON users.id = leave_requests.user_id
    INNER JOIN positions ON positions.id = users.position_id
    -- WHERE leave_requests.status ='Pending'
    ORDER BY leave_requests.id DESC");
    $statement->execute();
    return $statement->fetchAll();
}


//count request leave
function count_pending_requests(): int
{
    global $connection;
    $statement = $connection->prepare("SELECT count(*) as total FROM leave_requests WHERE leave_requests.status='Pending'");
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'];
}
function count_rejected_requests(): int
{
    global $connection;
    $statement = $connection->prepare("SELECT count(*) as total FROM leave_requests WHERE leave_requests.status='Rejected'");
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
    $statement = $connection->prepare("SELECT
	leave_requests.id,
    users.first_name,
    users.last_name,
    users.email,
    users.gender,
    positions.position,
    leave_types.leave_type,
    leave_requests.status,
    leave_requests.description,
    leave_requests.start_date,
    leave_requests.end_date
    FROM leave_requests
    INNER JOIN leave_types ON leave_types.id = leave_requests.leave_type_id
    INNER JOIN users ON users.id = leave_requests.user_id
    INNER JOIN positions ON positions.id = users.position_id
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
    $statement = $connection->prepare("SELECT leave_requests.id, users.first_name, users.last_name,users.image_data, positions.position, leave_requests.start_date, leave_requests.end_date, leave_requests.status
    FROM leave_requests
    INNER JOIN users ON users.id = leave_requests.user_id
    INNER JOIN positions ON positions.id = users.position_id
    WHERE leave_requests.status = 'Approved'
    ORDER BY leave_requests.id Desc ");
    $statement->execute();
    return $statement->fetchAll();
}
function count_approved_leave(): int
{
    global $connection;
    $statement = $connection->prepare("SELECT count(*) as total FROM leave_requests WHERE status ='Approved' ");
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'];
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
function create_department(string $name): bool
{
    global $connection;
    $statement = $connection->prepare("insert into departments (department) values (:department)");
    $statement->execute([
        "department" => $name
    ]);
    return $statement->rowCount() > 0;
}

// get all department to display 
function get_departments(): array
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
    return $statement->fetch();
}

// edit department
function get_department(int $id): array
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


// ------------------------Token Hash------------------------

function update_reset_token($gmail,$code){
    global $connection;
    $statement = $connection->prepare("UPDATE users SET verify_codes = :code WHERE email = :gmail");
    $statement->execute([
        ':gmail' => $gmail,
        ':code' => $code,
    ]);
    return $statement->rowCount() > 0;
}

function check_verify_code ($code): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE verify_codes = :code");
    $statement->execute([
        ':code' => $code
    ]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}