<?php 
defined('ROOTPATH') OR exit("Access denied!");
class Products { 
    use Controller;
    public function index() {
        echo "this is products controller";

        $this->view('products/product');
    }
}