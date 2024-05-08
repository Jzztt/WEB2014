<?php

include "./models/Product.php";



class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index()
    {
        $products = $this->productModel->getAllProducts();
        include './views/products/product_list.php';
    }

    public function show($id)
    {
        $product = $this->productModel->getProductById($id);
        include './views/products/product_details.php';
    }

    public function create()
    {
        $categories = $this->productModel->getAllCategories();
        include './views/products/add_product_form.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            $categoryId = $_POST['category_id'];
            $image = $_FILES['image'];


            $errors = $this->validateProductData($name, $description, $price, $image, $categoryId);
            var_dump($errors);
            if (empty($errors)) {
                $folder = './public/assets/images/';
                $imageName = $_FILES['image']['name'];
                $dir = $folder . $imageName;
                move_uploaded_file($_FILES['image']['tmp_name'], $dir);
                $this->productModel->addProduct($name, $description, $price, $imageName, $categoryId);
            } else {
                header('Location: ?action=create');
            }
        }
    }

    public function edit($id)
    {
        // Hiển thị form chỉnh sửa sản phẩm
        $product = $this->productModel->getProductById($id);
        $categories = $this->productModel->getAllCategories();
        include './views/products/edit_product_form.php';
    }

    public function update($id)
    {
        // Xử lý cập nhật sản phẩm
        $product = $this->productModel->getProductById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $categoryId = $_POST['category_id'];
            if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $folder = './public/assets/images/';
                $imageName = $_FILES['image']['name'];
                $dir = $folder . $imageName;
                move_uploaded_file($_FILES['image']['tmp_name'], $dir);
                $this->productModel->updateProduct($id, $name, $description, $price, $imageName, $categoryId);
            } else {
                $imageName = null;
                $this->productModel->updateProduct($id, $name, $description, $price, $imageName, $categoryId);
            }
        }
    }

    public function destroy($id)
    {
        $this->productModel->deleteProduct($id);
    }

    private function validateProductData($name, $description, $price, $image, $category)
    {
        $errors = [];

        if (empty($name)) {
            $errors['name'] = "Tên sản phẩm không được để trống.";
        }

        if (empty($description)) {
            $errors['description'] = "Mô tả sản phẩm không được để trống.";
        }

        if (!is_numeric($price) || $price <= 0) {
            $errors['price'] = "Giá sản phẩm phải là số và lớn hơn 0.";
        }

        if (isset($categoryId)) {
            $errors['category'] = "Thể loại sản phẩm không hợp lệ.";
        }
        if (!isset($image) && $image['error'] != 0) {

            $errors['image'] = 'image is required';
        }

        return $errors;
    }
}