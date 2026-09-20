<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        // Destroy CodeIgniter session
        session()->destroy();

        // Redirect to home page
        return redirect()->to('/');
    }
}