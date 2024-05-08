<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>

<body>
    <h2>Product List</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><img src="./public/assets/images/<?php echo $product['image']; ?>" alt="Product Image" width="100" height="100"></td>

                <td>
                    <a href="?action=edit&id=<?php echo $product['productId']; ?>">Edit</a>| <a href="?action=show&id=<?php echo $product['productId']; ?>">View Detail</a> |
                    <a href="?action=destroy&id=<?php echo $product['productId']; ?>" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>