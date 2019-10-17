<?php


class Controller
{
    public function CreateView($viewName) {
        require "View/" . $viewName . ".php";
    }

    public function isLogined() {
        return !empty($_SESSION['id']);
    }
}