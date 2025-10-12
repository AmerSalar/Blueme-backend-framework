<?php
defined('ROOTPATH') OR exit("Access denied!");
class _404 {
    use Controller;
    public function index() {
        echo "Not Found!";
    }
}