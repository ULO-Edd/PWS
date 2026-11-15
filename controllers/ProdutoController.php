<?php


class ProdutoController extends BaseController
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
                $produtos = Produto::all();
                $this->renderView('produto/index', ['produtos' => $produtos]);
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
                $ivas = Iva::find_all_by_vigor(1);
                $this->renderView('produto/create', ['ivas' => $ivas]);
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
                $produto = new Produto($_POST);
                if ($produto->is_valid()) {
                    $produto->save();
                    $this->index();
                } else {
                    $ivas = Iva::find_all_by_vigor(1);
                    $this->renderView("produto/create", ["criarProduto" => $produto, "ivas" => $ivas]);
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
                $produto = Produto::find_by_id($id);

                $this->renderView('produto/show', ['produto' => $produto]);
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
                $produto = Produto::find_by_id($id);
                $ivas = Iva::find_all_by_vigor(1);

                $this->renderView('produto/edit', ['produto' => $produto, 'ivas' => $ivas]);
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
                $produto = Produto::find([$id]);
                $produto->update_attributes($_POST);
                if ($produto->is_valid()) {
                    $produto->save();
                    $this->show($produto->id);
                } else {
                    $ivas = Iva::find_all_by_vigor(1);

                    $this->renderView("produto/edit", ["produto" => $produto, "ivas" => $ivas]);
                }
            }
        }
    }
}