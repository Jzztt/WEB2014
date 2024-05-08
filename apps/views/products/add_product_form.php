<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<body>
    <h2>Add New Product</h2>
    <form action="?action=store" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price"><br>
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br>
        <label for="category_id">Category:</label><br>
        <select id="category_id" name="category_id">
            <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['categoryId']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit">Add Product</button>
    </form>
</body>

</html>