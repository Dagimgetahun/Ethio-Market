<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    body {
        background-color: #f2f2f2; /* Background color */
    }
    .inner-nav {
        background-color: #ff6666; /* Red background color */
        color: #ffffff; /* White text color */
    }
    .user-page {
        margin-top: 50px;
    }
    .loginmodal-container {
        background-color: #ffffff; /* White background color */
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }
    .loginmodal-container h1 {
        color: #ff6666; /* Red text color */
        text-align: center;
    }
    .loginmodal-container input[type="text"],
    .loginmodal-container input[type="password"] {
        width: 100%;
        margin-bottom: 10px;
        padding: 15px;
        border: 1px solid #dddddd; /* Light gray border */
        border-radius: 3px;
    }
    .loginmodal-container input[type="submit"] {
        width: 100%;
        padding: 15px;
        background-color: #ff6666; /* Red background color */
        border: none;
        color: #ffffff; /* White text color */
        cursor: pointer;
        border-radius: 3px;
    }
    .loginmodal-container input[type="submit"]:hover {
        background-color: #e60000; /* Darker red color on hover */
    }
</style>
<div class="inner-nav">
    <div class="container">
        <a href="<?= LANG_URL ?>" style="color: #ffffff;"><?= lang('home') ?></a> <span class="active"> > <?= lang('user_login') ?></span>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <div class="container user-page">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="loginmodal-container">
                    <h1><?= lang('user_register') ?></h1><br>
                    <form id="registrationForm" method="POST" action="">
                    <input type="text" name="name" id="name" placeholder="User Full Name" pattern="[A-Za-z]+(\s[A-Za-z]+)*" style="border-color: #ff6666;">
                        <input type="text" name="phone" id="phone" placeholder="+251" pattern="\+251[0-9]{9}" maxlength="13" style="border-color: #ff6666;" oninput="autoFillCountryCode(this)">
                        <input type="text" name="email" id="email" placeholder="Email" style="border-color: #ff6666;">
                        <input type="password" name="pass" id="pass" placeholder="Password" style="border-color: #ff6666;">
                        <input type="password" name="pass_repeat" id="pass_repeat" placeholder="Password repeat" style="border-color: #ff6666;">
                        <input type="submit" name="signup" class="login loginmodal-submit" value="<?= lang('register_me') ?>" onclick="validateForm()">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function autoFillCountryCode(input) {
            // Check if input is empty or does not start with "+251"
            if (!input.value || !input.value.startsWith("+251")) {
                input.value = "+251"; // Prepend "+251" to the input value
            }
        }

        function validateForm() {
            var name = document.getElementById("name").value;
            var phone = document.getElementById("phone").value;
            var email = document.getElementById("email").value;
            var pass = document.getElementById("pass").value;
            var pass_repeat = document.getElementById("pass_repeat").value;

            if (name == "" || phone == "" || email == "" || pass == "" || pass_repeat == "") {
                alert("Please fill in all the fields.");
                return false; // Prevent form submission
            }
        }
    </script>
</body>
</html>


