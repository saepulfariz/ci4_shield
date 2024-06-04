<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        // echo "LOGIN APP - " . auth()->user()->username;

        // d(auth());

        // // get user login
        // d(auth()->user());
        // d(auth()->user()->username);

        // d(auth()->id());
        // // or
        // d(user_id());

        // // get the User Provider (UserModel by default)
        // d(auth()->getProvider());

        // https://novawebbusiness.com/2023/05/22/codeigniter-4-shield-with-multi-role/

        return view('dashboard/index');
    }
}
