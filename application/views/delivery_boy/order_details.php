<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>
    
    <!-- Display order details -->
    <p>Order ID: <?php echo $order->order_id; ?></p>
    <p>User ID: <?php echo $order->user_id; ?></p>
    <!-- Display additional details as needed -->

    <a href="<?php echo base_url('DeliveryBoy/orders'); ?>">Back to Orders</a>
</body>
</html>
