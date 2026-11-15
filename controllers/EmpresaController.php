<?php
require_once "BaseController.php";

class EmpresaController extends BaseController
{

    public function show($id)
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {

            $user = User::find_by_id($_SESSION['userID']);

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else {
                $empresa = Empresa::find_by_id($id);
                if (is_null($empresa)) {
                    $this->redirectToRoute('mainView', 'index');
                } else {
                    $this->renderView("empresa/show", ["empresa" => $empresa]);
                }
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
                $empresa = Empresa::find_by_id($id);
                if (is_null($empresa)) {
                    $this->redirectToRoute('mainView', 'index');
                } else {
                    $this->renderView("empresa/edit", ["empresa" => $empresa]);
                }
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
                $empresa = Empresa::find([$id]);
                $empresa->update_attributes($_POST);
                if ($empresa->is_valid()) {
                    $empresa->save();
                    $this->show($id);
                } else {
                    $this->renderView("empresa/edit", ["empresa" => $empresa]);
                }
            }
        }
    }
}