<?php

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
<!-- alert notification -->
<div class="alert alert-success d-none" id="alert_message" role="alert">Please wait for a few seconds...</div>
<div class="alert alert-danger  d-none" id="alert_input" role="alert">Please enter your email</div>

<div class="container d-flex justify-content-center p-5">
    <div class="card p-5 col-8">
        <form action="../../controllers/reset/reset_password_mail.controller.php" method="post" name="signupForm" id="signupForm">
            <!-- <img src="" id="signupLogo" class="img-fluid"> -->
            <h2 class="form-title text-center mb-3">ENTER YOUR G-MAIL</h2>
            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control " pattern="[a-z]{2}[a-z0-9.@]*@gmail\.(com|org)"  required>
                <small class="text-danger d-none" id="valid_message">Please enter a valid Gmail address (e.g., john@gmail.com).</small>            </div>
            <div class="button-wrapper text-center mt-3 d-flex justify-content-end">
                <button type="submit" id="submitButton" onclick="submitForm()" class="btn btn-primary " href='/'>Send<span id="loader"></span>
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function submitForm() {
        var emailInput = document.getElementById('email').value.trim();
        var emailPattern = /^[a-z]{2}[a-z0-9.@]*@gmail\.(com|org)$/i; // Define email pattern
        
        if (emailInput === '') {
            document.getElementById('alert_input').classList.remove('d-none');
            document.getElementById('valid_message').classList.remove('d-none');
        } else if (!emailPattern.test(emailInput)) {
            document.getElementById('alert_input').classList.remove('d-none');
            document.getElementById('valid_message').classList.remove('d-none'); 
            
        } else {
            document.getElementById('alert_input').classList.add('d-none');
            document.getElementById('alert_message').classList.remove('d-none');
            document.getElementById('valid_message').classList.add('d-none'); 
        }
    }
</script>

