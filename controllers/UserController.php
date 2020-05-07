<?php

namespace App\controllers;

use App\entities\User;
use App\repositories\UserRepository;

class UserController extends Controller
{
    public function oneAction()
    {
        $id = 0;
        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
        }
        $user = (new UserRepository()) -> getOne($id);
        return $this->render('userOne',
            [
                'user' => $user,
                'menu' => $this->getMenu(),
            ]);
    }

    public function allAction()
    {
        $users = (new UserRepository()) -> getAll();
        return $this->render('userAll',
            [
                'users' => $users,
                'menu' => $this->getMenu(),
            ]);
    }

    public function insertAction()
    {

    }
}