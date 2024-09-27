<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="inner-nav">
    <div class="container">
        <?= lang('home') ?> <span class="active"> > <?= lang('user_login') ?></span>
    </div>
</div>
<div class="container user-page">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="loginmodal-container" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px;">
                <h1 style="color: #007bff;"><?= lang('login_to_acc') ?></h1><br>
                <form method="POST" action="" onsubmit="return validateForm()">
                    <input type="text" name="email" placeholder="Email" style="padding: 10px; margin-bottom: 10px; width: 100%; border: 1px solid #ced4da; border-radius: 5px;" required>
                    <input type="password" name="pass" placeholder="Password" style="padding: 10px; margin-bottom: 10px; width: 100%; border: 1px solid #ced4da; border-radius: 5px;" required>
                    <input type="submit" name="login" class="login loginmodal-submit" value="Login" style="background-color: #dc3545; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                </form>
                <div class="login-help" style="margin-top: 20px;">
                    <a href="<?= LANG_URL . '/register' ?>" style="color: #007bff;"><?= lang('register') ?></a>
                    <a href="#" style="color: #007bff; margin-left: 10px;" onclick="showForgotPasswordForm()"><?= lang('forgot_password') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Forgot Password Modal -->
<div id="forgotPasswordModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= lang('forgot_password') ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="forgot_password.php" onsubmit="return validateForgotPasswordForm()">
                    <div class="form-group">
                        <label for="forgot_email"><?= lang('email') ?>:</label>
                        <input type="email" class="form-control" id="forgot_email" name="forgot_email" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><?= lang('submit') ?></button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var email = document.forms[0]["email"].value;
        var pass = document.forms[0]["pass"].value;
        if (email == "" || pass == "") {
            alert("Both email and password must be filled out");
            return false;
        }
        return true;
    }

    function showForgotPasswordForm() {
        $('#forgotPasswordModal').modal('show');
    }

    function validateForgotPasswordForm() {
        var forgot_email = document.getElementById("forgot_email").value;
        if (forgot_email == "") {
            alert("Please enter your email address.");
            return false;
        }
        // You can add further validation if needed
        return true;
    }
</script>
