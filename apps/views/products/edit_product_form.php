<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>

<body>
    <h2>Edit Product</h2>
    <form action="?action=update&id=<?php echo $product['productId']; ?>" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"><?php echo $product['description']; ?></textarea><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>"><br>
        <label for="category_id">Category:</label><br>
        <select id="category_id" name="category_id">
            <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['categoryId']; ?>"
                <?php if ($category['categoryId'] == $product['categoryId']) echo "selected"; ?>>
                <?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br>
        <img src="./public/assets/images/<?php echo $product['image']; ?>" alt="Product Image"><br>
        <button type="submit">Update Product</button>
    </form>
</body>

</html>