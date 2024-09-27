<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$resultSend = ""; // Initialize the result variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Perform validation on the input fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $resultSend = "Please fill in all the required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $resultSend = "Invalid email address.";
    } else {
        $to = 'dagimmgetahu@gmail.com';
        $headers = "From: $email\r\n";

        // Add additional headers as needed

        if (mail($to, $subject, $message, $headers)) {
            $resultSend = "Email sent successfully!";
        } else {
            $resultSend = "Failed to send email.";
        }
    }
}

?>

<div id="contacts">
    <div id="map"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if (!empty($resultSend)) { ?>
                    <hr>
                    <div class="alert alert-info"><?= $resultSend ?></div>
                    <hr>
                <?php } ?>
                <div class="contact-form">
                    <legend><?= lang('contact_details') ?></legend>
                    <?php if (isset($resultSend) && $resultSend === "Email sent successfully!") { ?>
                        <div class="alert alert-success"><?= $resultSend ?></div>
                    <?php } elseif (isset($resultSend) && $resultSend !== "Email not sent successfully!") { ?>
                        <div class="alert alert-danger"><?= $resultSend ?></div>
                    <?php } ?>
                    <form method="POST" action=""> 
                        <div class="form-group">
                            <label for="name"><?= lang('name') ?></label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email"><?= lang('email_address') ?></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="subject"><?= lang('subject') ?></label>
                            <input type="text" name="subject" class="form-control">
                        </div> 
                        <div class="form-group">
                            <label for="message"><?= lang('message') ?></label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="<?= lang('message') ?>"></textarea>
                        </div>  
                        <button type="submit" class="btn btn-black" id="btnContactUs"><?= lang('send_message') ?></button> 
                    </form> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-details">
                    <legend><?= lang('contact_details') ?></legend>
                    <address>
                        <?= html_entity_decode($contactspage) ?>
                    </address>
                </div>
            </div>
        </div>
    </div>
</div>