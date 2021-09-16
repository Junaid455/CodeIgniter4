<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index($page = '')
    {
        if (!is_file(APPPATH.'/views/pages/'.$page.'.php')) {
            throw new \CodeIgniter\Exception\PageNotFoundException($page);
        }
        return view("pages/{$page}");
    }
}