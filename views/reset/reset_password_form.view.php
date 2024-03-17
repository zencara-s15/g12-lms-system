<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    .input-group-append {
        position: relative;
    }

    .password-toggle-icon {
        position: absolute;
        top: -19px;
        right: -1px;
        border-radius: 0px 10px 10px 0px;
        transform: translateY(-50%);
        font-size: 24px;
        cursor: pointer;
    }
</style>
<div class="container d-flex justify-content-center p-5">
    <div class="card p-5 col-8">
        <form action="../../controllers/reset/reset_password_process.controller.php" method="post" name="signupForm" id="form_reset" onsubmit="return validateForm()">
            <h2 class="form-title text-center mb-3">Change Password</h2>

            <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" required hidden>
            <input type="number" class="form-control" id="code" name="verify_codes" value="<?= $verify_codes ?>" required hidden>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>

                <input type="password" class="form-control" id="password" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%*])[A-Za-z\d!@#$%*]{8,20}$" required>
                <div class="input-group-append">
                    <span class="input-group-text password-toggle-icon" onclick="togglePasswordVisibility('password')">
                        <i class="fas fa-eye" id="passwordToggleIcon"></i>
                    </span>
                </div>
                <small id="passwordHelpBlock" class="form-text text-muted">Enter a password (8-20 characters) with at least one letter, one number, and one special character (!@#$%*), and without spaces or emojis</small>
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>

                <input type="password" class="form-control" id="confirmPassword" name="cf_password" required>
                <div class="input-group-append">
                    <span class="input-group-text password-toggle-icon" onclick="toggleConfirmPasswordVisibility('confirmPassword')">
                        <i class="fas fa-eye" id="confirmPasswordToggleIcon"></i>
                    </span>
                </div>
                <div class="invalid-feedback" id="confirmPasswordError">
                    Passwords do not match.
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Change</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></script>
<script>
    function validateForm() {
        let passwordInput = document.getElementById('password');
        let confirmPasswordInput = document.getElementById('confirmPassword');
        let confirmPasswordError = document.getElementById('confirmPasswordError');

        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordError.style.display = 'block';
            return false;
        } else {
            confirmPasswordError.style.display = 'none';
            return true;
        }
    }

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

    function toggleConfirmPasswordVisibility(inputId) {
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