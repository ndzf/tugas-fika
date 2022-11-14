<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $validation = service("validation");

        $data = [
            "title"				=> "Login",
            "validation"		=> $validation->getErrors()
        ];

        return view("auth/login", $data);
    }

    public function attemptLogin()
    {
        $inputs = esc($this->request->getPost());

        $user = $this->userModel->getByUsername($inputs["username"]);
        $hash = $user->password ?? "";
        $passwordVerify =  password_verify($inputs["password"], $hash);

        if (empty($user) || !$passwordVerify) {
            return redirect()->back()->with("errorMessage", "Email Atau password salah");
        }

        $payload = [
            "userId"		=> $user->id,
            "loggedIn"		=> true,
        ];

        session()->set($payload);
        return redirect()->to("/");
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to("/login");
    }
}
