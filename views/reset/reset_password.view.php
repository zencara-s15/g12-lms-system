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
<div class="container d-flex justify-content-center p-5">
    <div class="card p-5 col-8">
        <form action="../../controllers/reset/reset_password_mail.controller.php" method="post" name="signupForm" id="signupForm">
            <!-- <img src="" id="signupLogo" class="img-fluid"> -->
            <h2 class="form-title text-center mb-3">ENTER YOUR G-MAIL</h2>
            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control " required>
            </div>
            <div class="button-wrapper text-center mt-3 d-flex justify-content-end">
                <button type="submit" id="submitButton" onclick="validateSignupForm()" class="btn btn-primary " href='/'>Send<span id="loader"></span>
                </button>
            </div>
        </form>
    </div>
</div>