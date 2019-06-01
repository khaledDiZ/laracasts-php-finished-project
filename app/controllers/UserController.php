<?php

namespace App\Controllers;

use App\Core\App;

class UserController
{
    public function index()
    {
        $users = App::get('database')->selectAll('users');

        return view('users', compact('users'));
    }

    public function store()
    {
        App::get('database')->insert('users', [
            'name' => $_POST['name']
        ]);

        redirect('users');
    }
}
