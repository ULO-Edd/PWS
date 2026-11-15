<?php


class MainViewController extends BaseController
{

    public function index()
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {
            $user = User::find_by_id($_SESSION['userID']);

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else {
                $this->renderView('mainView/index');
            }
        }
    }

    public function login()
    {
        $this->renderView('mainView/login');
    }
}