<?php
defined('ROOTPATH') OR exit("Access denied!");
class User {
    use Model;
    protected $table = 'users';
    protected $allowedCols = [
        'name',
        'age'
    ];
}