<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
/* Style for the inner navigation */
.inner-nav {
    background-color: #d9534f; /* Red background */
    padding: 10px 0; /* Add padding */
    color: white; /* White text */
}

/* Style for the home span */
.inner-nav .home {
    color: white; /* White text */
}

/* Style for the active span */
.inner-nav .active {
    color: white; /* White text */
    font-weight: bold; /* Bold font */
}

/* Style for the login form container */
.loginmodal-container {
    background-color: white; /* White background */
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

/* Style for the login form heading */
.loginmodal-container h1 {
    text-align: center;
    font-size: 24px;
    color: #d9534f; /* Red color */
}

/* Style for the input fields */
.loginmodal-container input[type="text"],
.loginmodal-container input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #d9534f; /* Red border */
    border-radius: 3px;
    box-sizing: border-box;
}

/* Style for the login button */
.loginmodal-container input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #d9534f; /* Red background */
    color: white; /* White text */
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

/* Hover effect for the login button */
.loginmodal-container input[type="submit"]:hover {
    background-color: #c9302c; /* Darker red on hover */
}

/* Style for the login help link */
.login-help {
    text-align: center;
    color: #d9534f; /* Red color */
}

/* Style for the register link */
.login-help a {
    color: #d9534f; /* Red color */
    text-decoration: none;
}

/* Style for the login input fields */
.login-input {
    background-color: #f2dede; /* Light red background */
}
</style>

<div class="inner-nav">
    <div class="container">
        <?= lang('home') ?> <span class="active"> > <?= lang('user_login') ?></span>
    </div>
</div>
<div class="container user-page">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="loginmodal-container">
                <h1><?= lang('login_to_acc') ?></h1><br>
                <form method="POST" action="">
                    <input type="text" name="email" placeholder="Email" class="login-input">
                    <input type="password" name="pass" placeholder="Password" class="login-input">
                    <input type="submit" name="login" class="login loginmodal-submit" value="<?= lang('login') ?>">
                </form> 
                <div class="login-help">
                    <a href="<?= LANG_URL . '/register' ?>"><?= lang('register') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
