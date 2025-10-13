<?php
// this is like an if and else if('ROOTPATH exists then go, else exit)
defined('ROOTPATH') OR exit("Access denied!");

class Home {
    use Controller;
    public function index() {
        $user = new User;
        $arr['name'] = "Rebin";
        $arr['age'] = 19;
        
        // $result = $model->where($arr);
        // show($result);
        // show($model->first($arr));
        // $user->insert($arr);
        show($user->All());
        // $model->update('Amer', ['name'=>"Ameer"], 'name');
        
        echo "this is home controller";

        $this->view('home');
    }
    public function example() {
        // if 'example' is used in url after 'home/' this method will be called like 'host://app/home/example'
        echo "this is example method of home";
    }
}