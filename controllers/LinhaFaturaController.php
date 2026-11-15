<?php


class LinhaFaturaController extends BaseController
{

    public function store($fatura_id)
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {

            $user = User::find_by_id($_SESSION['userID']);

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else {

                $produto = Produto::find_by_referencia($_POST['produto_id']);
                $linhafatura = new Linhafatura();
                if ($produto != null) {
                    $linhafatura->produto_id = $produto->id;
                }
                $linhafatura->quantidade = $_POST['quantidade'];
                if ($linhafatura->is_valid()) {
                    $linhafatura->fatura_id = $fatura_id;
                    $linhafatura->valoruni = $produto->preco;
                    $iva = Iva::find_by_id($produto->iva_id);
                    $linhafatura->valoriva = round($produto->preco * ($iva->percentagem / 100), 2);
                    $linhafatura->save();
                    $produto->update_attributes(['stock' => $produto->stock -= $linhafatura->quantidade]);
                    $produto->save();
                    $fatura = Fatura::find_by_id($fatura_id);
                    $cliente = User::find_by_id($fatura->cliente_id);
                    $empresa = Empresa::find_by_id(1);
                    $funcionario = User::find_by_id($fatura->funcionario_id);
                    $linhasFatura = Linhafatura::find_all_by_fatura_id($fatura->id);
                    $this->renderView("fatura/edit", ['produto' => $produto, 'fatura' => $fatura, 'cliente' => $cliente, 'empresa' => $empresa, 'funcionario' => $funcionario, 'linhasFatura' => $linhasFatura]);
                } else {
                    $fatura = Fatura::find_by_id($fatura_id);
                    $cliente = User::find_by_id($fatura->cliente_id);
                    $empresa = Empresa::find_by_id(1);
                    $funcionario = User::find_by_id($fatura->funcionario_id);
                    $linhasFatura = Linhafatura::find_all_by_fatura_id($fatura->id);
                    $this->renderView("fatura/edit", ['produto' => $produto, 'fatura' => $fatura, 'cliente' => $cliente, 'empresa' => $empresa, 'funcionario' => $funcionario, 'linhasFatura' => $linhasFatura, "linhaFatura" => $linhafatura]);
                }
            }
        }
    }
}