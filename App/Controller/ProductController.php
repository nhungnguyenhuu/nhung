<?php
namespace App\Controller;
use App\Model\ProductModel;


class ProductController
{
    public $productModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
    }
    public function showAll()
    {
        $products = $this->productModel->showAll();
        include_once "App/View/list.php";
    }

    public function deleteProduct($id){
        $this->productModel->delete($id);
        header("location:index.php?page=product-list");
    }
    public function createProduct(){
        if ($_SERVER["REQUEST_METHOD"]== "GET"){
            include "App/View/create.php";
        }
        else {
            $this->productModel->create($_POST);
            header("location:index.php?page=product-list");
        }
    }

    public function updateProduct(){
        if ($_SERVER["REQUEST_METHOD"]== "GET"){
            $product = $this->productModel->showById($_REQUEST["id"]);

            include "App/View/update.php";
        }
        else {

            $this->productModel->update($_GET['id'],$_POST);
            header("location:index.php?page=product-list");
        }
    }

}