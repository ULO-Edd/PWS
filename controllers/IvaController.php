<?php


class IvaController extends BaseController
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
                $ivas = Iva::all();

                $this->renderView('iva/index', ['ivas' => $ivas]);
            }
        }
    }

    public function create()
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {

            $user = User::find_by_id($_SESSION['userID']);

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else {
                $this->renderView('iva/create');
            }
        }
    }

    public function store()
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {
            $user = User::find_by_id($_SESSION['userID']);

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else {
                $iva = new Iva($_POST);
                $iva->vigor = 0;
                if ($iva->is_valid()) {
                    $iva->save();
                    $this->index();
                } else {
                    $this->renderView("iva/create", ["iva" => $iva]);
                }
            }
        }
    }

    public function show($id)
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {
            $user = User::find_by_id($_SESSION['userID']);

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else {
                $iva = Iva::find_by_id($id);

                $this->renderView('iva/show', ['iva' => $iva]);
            }
        }
    }

    public function edit($id)
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {

            $user = User::find_by_id($_SESSION['userID']);

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else {
                $iva = Iva::find_by_id($id);

                $this->renderView('iva/edit', ['iva' => $iva]);
            }
        }
    }

    public function update($id)
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {
            $user = User::find_by_id($_SESSION['userID']);

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else {
                $iva = Iva::find([$id]);
                $iva->update_attributes($_POST);
                if ($iva->is_valid()) {
                    $iva->save();
                    $this->show($iva->id);
                } else {
                    $this->renderView("iva/edit", ["iva" => $iva]);
                }
            }
        }
    }
}