<div id="users">
    <h1><img src="<?= base_url('assets/imgs/admin-user.png') ?>" class="header-img" style="margin-top:-3px;"> Admin Delivery List</h1> 
    <hr>
    <div class="clearfix"></div>
    <?php if ($delivery_boys->result()): ?>
        <!-- Form to submit message -->
        <form action="http://localhost/chat/login/login.php" method="post" enctype="multipart/form-data">
            <button type="submit" class="btn btn-primary send-message-btn">
                Contact All Delivery Personnel
            </button>
        </form>
        <div class="table-responsive">
            <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($delivery_boys->result() as $delivery_boy): ?>
                        <tr>
                            <td><?= $delivery_boy->id ?></td>
                            <td><?= isset($delivery_boy->username) ? $delivery_boy->username : 'Username not available' ?></td>
                            <td><?= $delivery_boy->email ?></td>
                            <td><?= $delivery_boy->created_at ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="clearfix"></div><hr>
        <div class="alert alert-info">No delivery person found!</div>
    <?php endif; ?>
</div>
