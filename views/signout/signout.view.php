<?php

if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
}
?>

<div class="container d-flex justify-content-center mt-3">
    <div class="col-lg-5">
        <div class="card shadow-lg p-4 bg-white rounded">
            <h2 class="text-uppercase text-center mb-4">Create an account</h2>
            <form action="../../controllers/sigout/signout.create.controller.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <!-- first name -->
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" class="form-control" name="first_name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- last name -->
                        <div class="form-group ">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" class="form-control" name="last_name" required>
                        </div>
                    </div>
                </div>
                <!-- email -->
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" required>
                </div>
                <!-- password -->
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- gender -->
                        <div class="form-group mt-3">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" required>
                                <option value="" selected disabled>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- role -->
                        <div class="form-group mt-3">
                            <label for="role">Role</label>
                            <select class="form-control" name="role" required>
                                <option value="" selected disabled>Select Role</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- imge -->
                <div class="form-group mt-3">
                    <label for="img">Profile Image</label>
                    <input type="file" id="img" class="form-control" name="img">
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-success btn-lg">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>