<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Boy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff; /* Black background */
            color: #fff; /* White text color */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }

        h1 {
            color: #007bff; /* Blue header color */
        }

        p {
            color: #6c757d; /* Gray text color */
            margin-bottom: 30px;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col-md-6 {
            margin: 0 10px;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            font-size: 18px;
            text-decoration: none;
            color: #fff; /* White text color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #007bff; /* Blue button color */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .btn-success {
            background-color: #28a745; /* Green button color */
        }

        .btn-success:hover {
            background-color: #218838; /* Darker green on hover */
        }

        .logo {
            margin-top: 50px;
            width: 150px;
            height: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, Delivery Boy!</h1>
        <p>You can register using the buttons below:</p>
        <div class="row">
            <div class="col-md-6">
                <a href="<?php echo base_url('DeliveryBoy/register'); ?>" class="btn btn-primary">Register</a>
            </div>
          <!--  <div class="col-md-6">
                <a href="<?php echo base_url('DeliveryBoy/Login'); ?>" class="btn btn-success">Login</a>
            </div> -->
        </div>
    </div>
</body>
</html>
