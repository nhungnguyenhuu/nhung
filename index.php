<?php
require __DIR__ . "/vendor/autoload.php";
use App\Controller\ProductController;
$productController = new ProductController();
$page = $_GET["page"] ??"";

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <a href="index.php?page=product-list">Product</a>
    <?php
    switch ($page) {

        case "product-list":

            $productController->showAll();
            break;
        case "product-delete":
            $productController->deleteProduct($_GET["id"]);
            break;
        case "product-create":
            $productController->createProduct();
            break;
        case "product-update":
            $productController->updateProduct();
            break;
    }
    ?>

    </body>
    </html>
<?php
