<?php

use Model\PostModel;

class Post extends Controller
{
    private $objModel;

    public function __construct()
    {
        $this->objModel = new PostModel();
    }

    public function get() {
        return $this->objModel->getPosts();
    }

    public function add() {
        if (!$this->isLogined()) {
            exit;
        }
        return $this->objModel->addPost();
    }

    public function del() {
        if (!$this->isLogined()) {
            exit;
        }
        $this->objModel->delPost();
    }

    public function edit() {
        if (!$this->isLogined()) {
            exit;
        }
        return $this->objModel->editPost();
    }
}