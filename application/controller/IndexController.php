<?php


namespace App\controller;


class IndexController
{

    public function index()
    {
        return ['index', time()];
    }

    public function test()
    {
        return 'test action';
    }
}