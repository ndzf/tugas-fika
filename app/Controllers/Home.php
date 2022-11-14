<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $studentModel = new StudentModel();

        $data = [
            "user"		=> $userModel->find(session("userId")),
            "student"	=> $studentModel->getTotal(),
        ];

        return view('welcome_message', $data);
    }
}
