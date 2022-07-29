<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function home()
    {
        $data['page'] = 'home';

        return view('home', $data);
    }
}
