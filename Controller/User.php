<?php

use Model\UserModel;

class User extends Controller
{
    private $objModel;

    public function __construct()
    {
        $this->objModel = new UserModel();
    }

    public function login() {
        if ($this->isLogined()) {
            exit;
        }
        $this->objModel->auth();
    }

    public function reg() {
        if ($this->isLogined()) {
            exit;
        }
        $this->objModel->register();
    }
}