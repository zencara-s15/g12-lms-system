<?php
// alter when it error on form signin
// session_start();
if (isset($_SESSION['error'])) :
?>
    <div class="alert alert-danger alert-dismissible fade show">
        <small type="text" class="close" data-dismiss="alert"></small>
        <?= $_SESSION['error'] ?>
    </div>
<?php
    session_destroy();
endif;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    .input-group-append {
        position: relative;
    }

    .password-toggle-icon {
        position: absolute;
        height: 47px;
        top: -24px;
        right: -1px;
        border-radius: 0px 10px 10px 0px;
        transform: translateY(-50%);
        font-size: 24px;
        cursor: pointer;
    }
</style>

<!-- ------------------form sign In------------------------------------------------------ -->
<section class="vh-100 d-flex align-items-center justify-content-center ">
    <div class="card w-75 shadow p-1 mt-2 bg-white rounded">
        <div class="row g-0">
            <div class="col-md-6 col-lg-5 col-xl-5 bg-light ">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid h-100" alt="Phone image">
            </div>
            <div class="col-md-6 col-lg-7 col-xl-7">
                <div class="card-body p-5">
                    <h3 class="card-title mb-4">Sign In</h3>
                    <form action="../../controllers/signin/signin.check.controller.php" method="post">
                        <!-- email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" class="form-control form-control-lg" name='email' />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" class="form-control form-control-lg" name='password' />
                            <div class="input-group-append">
                                <span class="input-group-text password-toggle-icon" onclick="togglePasswordVisibility('password')">
                                    <i class="fas fa-eye" id="passwordToggleIcon"></i>
                                </span>
                            </div>
                        </div>
                        <!-- for reset password -->
                        <div class="d-flex justify-content-end align-items-center mb-4">
                            <a href="/reset">Forget Password?</a>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function togglePasswordVisibility(inputId) {
        let passwordInput = document.getElementById(inputId);
        let passwordToggleIcon = document.getElementById(inputId + 'ToggleIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggleIcon.classList.remove('fa-eye');
            passwordToggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordToggleIcon.classList.remove('fa-eye-slash');
            passwordToggleIcon.classList.add('fa-eye');
        }
    }
</script>