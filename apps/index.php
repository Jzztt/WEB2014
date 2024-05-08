<?php
include './controllers/ProductController.php';


$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$productController = new ProductController();

switch ($action) {
    case 'index':
        $productController->index();
        break;
    case 'show':
        $productController->show($_GET['id']);
        break;
    case 'create':
        $productController->create();
        break;
    case 'store':
        $productController->store();

        break;
    case 'edit':
        $productController->edit($_GET['id']);
        break;
    case 'update':
        $productController->update($_GET['id']);
        break;
    case 'destroy':
        $productController->destroy($_GET['id']);
        break;
    default:
        echo "Action not found!";
}