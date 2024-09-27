<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    body {
        background-color: #ffffff; /* White background color */
    }
    .inner-nav {
        background-color: #ff0000; /* Red background color */
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
        color: #ff0000; /* Red text color */
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
    .loginmodal-container input[type="submit"],
    .loginmodal-container a {
        width: 100%;
        padding: 15px;
        background-color: #ff0000; /* Red background color */
        border: none;
        color: #ffffff; /* White text color */
        cursor: pointer;
        border-radius: 3px;
        text-decoration: none; /* Remove underline from links */
        display: inline-block; /* Make links behave like buttons */
        text-align: center; /* Center text in links */
        margin-bottom: 10px; /* Add space between buttons */
    }
    .loginmodal-container input[type="submit"]:hover,
    .loginmodal-container a:hover {
        background-color: #e60000; /* Darker red color on hover */
    }
</style>
<div class="inner-nav">
    <div class="container">
        <a href="<?= LANG_URL ?>" style="color: #ffffff;"><?= lang('home') ?></a> <span class="active"> > <?= lang('user_login') ?></span>
    </div>
</div>
<div class="container user-page">
    <div class="row">
        <div class="col-sm-4">
            <div class="loginmodal-container">
                <h1><?= lang('my_acc') ?></h1><br>
                <form method="POST" action="">
                    <input type="text" name="name" value="<?= $userInfo['name'] ?>" placeholder="Name"><br>
                    <input type="text" name="phone" value="<?= $userInfo['phone'] ?>" placeholder="Phone">
                    <input type="text" name="email" value="<?= $userInfo['email'] ?>" placeholder="Email">
                    <input type="password" name="pass" placeholder="Password (leave blank if no change)"> <br>
                    <input type="submit" name="update" class="login loginmodal-submit" value="<?= lang('update') ?>">
                    <a href="<?= LANG_URL . '/logout' ?>" class="login loginmodal-submit text-center"><?= lang('logout') ?></a>
                </form>
            </div>
        </div>
        <div class="col-sm-8">
            <?= lang('user_order_history') ?>
            <div class="table-responsive">
                <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><?= lang('usr_order_id') ?></th>
                            <th><?= lang('usr_order_date') ?></th>
                            <th><?= lang('usr_order_address') ?></th>
                            <th><?= lang('usr_order_phone') ?></th>
                            <th><?= lang('user_order_products') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($orders_history)) {
                            foreach ($orders_history as $order) { ?>
                                <tr>
                                    <td><?= $order['order_id'] ?></td>
                                    <td><?= date('d.m.Y', $order['date']) ?></td>
                                    <td><?= $order['address'] ?></td>
                                    <td><?= $order['phone'] ?></td>
                                    <td>
                                        <?php $arr_products = unserialize($order['products']);
                                        foreach ($arr_products as $product) { ?>
                                            <div style="word-break: break-all;">
                                                <div>
                                                    <img src="<?= base_url('attachments/shop_images/' . $product['product_info']['image']) ?>" alt="Product" style="width:100px; margin-right:10px;" class="img-responsive">
                                                </div>
                                                <a target="_blank" href="<?= base_url($product['product_info']['url']) ?>">
                                                    <?= base_url($product['product_info']['url']) ?>
                                                </a>
                                                <div style=" background-color: #f1f1f1; border-radius: 2px; padding: 2px 5px;"><b><?= lang('user_order_quantity') ?></b> <?= $product['product_quantity']; ?></div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <hr>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="5"><?= lang('usr_no_orders') ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?= $links_pagination ?>
            </div>
        </div>
    </div>
</div>
