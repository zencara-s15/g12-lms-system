<?php
// alter when it error on form signin
// session_start();
if (isset($_SESSION['error'])) :
?>
<div class="alert alert-danger alert-dismissible fade show">
    <?= $_SESSION['error'] ?>
</div>
<?php
    // session_destroy();
endif;
?>

<div class="container d-flex justify-content-center p-5">
    <div class="card p-5 col-8">
        <form action="../../controllers/reset/reset_password_condition.controller.php" method="post" name="signupForm"
            id="signupForm">
            <!-- <img src="" id="signupLogo" class="img-fluid"> -->
            <h class="form-title text-center mb-3">Change Password </h>
            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control " required>
            </div>

            <div class="form-group mt-3">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" class="form-control " required>
            </div>

            <div class="form-group mt-3">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control">
            </div>

            <div class="button-wrapper text-center mt-3 d-flex justify-content-end">
                <button type="submit" id="submitButton" onclick="validateSignupForm()" class="btn btn-primary "
                    href='/reset'>Change<span id="loader"></span>
                </button>
            </div>
        </form>
    </div>
</div>