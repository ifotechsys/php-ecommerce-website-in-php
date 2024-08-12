<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .thank-you-card {
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            text-align: center;
        }
        .thank-you-card img {
            width: 100px;
            margin-bottom: 20px;
        }
        .thank-you-card h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .thank-you-card p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .thank-you-card .btn {
            padding: 10px 20px;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="thank-you-card">
        <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" alt="Thank You Icon">
        <h1>Thank You for Your Purchase!</h1>
        <p>Your order has been successfully processed. We appreciate your business!</p>
        <a href="product.php" class="btn btn-primary">Continue Shopping</a>
        <a href="index.php" class="btn btn-secondary">Back to Home</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
