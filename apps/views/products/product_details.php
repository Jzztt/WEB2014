<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1,
        h2 {
            margin-bottom: 10px;
        }

        .product-detail {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }

        .product-detail img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .product-detail p {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Product Detail</h1>
        <div class="product-detail">
            <img src="./public/assets/images/<?php echo $product['image']; ?>" alt="Product Image">
            <h2><?php echo $product['name']; ?></h2>
            <p>Description: <?php echo $product['description']; ?></p>
            <p>Price: $<?php echo $product['price']; ?></p>
        </div>
    </div>
</body>

</html>