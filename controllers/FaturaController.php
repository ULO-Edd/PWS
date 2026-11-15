<?php

use Carbon\Carbon;

class FaturaController extends BaseController
{

    public function index()
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {

            $user = User::find_by_id($_SESSION['userID']);
            $faturas = null;

            if ($user->role == "cliente") {
                $faturas = Fatura::find_all_by_cliente_id_and_estado($user->id, 'emitido');
            } else {
                if (isset($_POST['filter'])) {
                    switch ($_POST['filter']) {
                        case '' :
                            $faturas = Fatura::all();
                            break;
                        case 'emitidas' :
                            $faturas = Fatura::find_all_by_estado('emitido');
                            break;
                        case 'por emitir' :
                            $faturas = Fatura::find_all_by_estado('por emitir');
                            break;
                        case 'anuladas' :
                            $faturas = Fatura::find_all_by_estado('anulado');
                            break;
                    }
                } else {
                    $faturas = Fatura::all();
                }
            }
            $this->renderView('fatura/index', ["faturas" => $faturas]);
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
                $fatura = new Fatura($_POST);
                if ($fatura->is_valid()) {
                    $fatura->save();
                    $this->index();
                } else {
                    $this->renderView("fatura/create", ["fatura" => $fatura]);
                }
            }
        }
    }

    public function show($id)
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {
            $fatura = Fatura::find_by_id($id);
            $cliente = User::find_by_id($fatura->cliente_id);
            $empresa = Empresa::find_by_id(1);
            $funcionario = User::find_by_id($fatura->funcionario_id);
            $linhasFatura = Linhafatura::find_all_by_fatura_id($fatura->id);

            $this->renderView('fatura/show', ['fatura' => $fatura, 'cliente' => $cliente, 'empresa' => $empresa, 'funcionario' => $funcionario, 'linhasFatura' => $linhasFatura]);

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
                $fatura = Fatura::find_by_id($id);
                if ($fatura->estado == 'por emitir') {
                    $cliente = User::find_by_id($fatura->cliente_id);
                    $empresa = Empresa::find_by_id(1);
                    $funcionario = User::find_by_id($fatura->funcionario_id);
                    $linhasFatura = Linhafatura::find_all_by_fatura_id($fatura->id);

                    if (!isset($_GET['produto_id'])) {
                        $this->renderView('fatura/edit', ['fatura' => $fatura, 'cliente' => $cliente, 'empresa' => $empresa, 'funcionario' => $funcionario, 'linhasFatura' => $linhasFatura]);
                    } else {
                        $produto = Produto::find_by_id($_GET['produto_id']);
                        $this->renderView('fatura/edit', ['fatura' => $fatura, 'cliente' => $cliente, 'empresa' => $empresa, 'funcionario' => $funcionario, 'linhasFatura' => $linhasFatura, 'produto' => $produto]);
                    }
                } else {
                    $this->show($fatura->id);
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
                $fatura = Fatura::find([$id]);
                if ($fatura->estado != "emitido") {
                    if (isset($_POST['estado'])) {
                        switch ($_POST['estado']) {
                            case 'anular':
                                $fatura->update_attributes(['estado' => 'anulado']);
                                $linhasFatura = Linhafatura::find_all_by_fatura_id($fatura->id);
                                if ($linhasFatura != null) {
                                    foreach ($linhasFatura as $linhaFatura) {
                                        $produto = Produto::find_by_id($linhaFatura->produto_id);
                                        $produto->stock += $linhaFatura->quantidade;
                                        $produto->save();
                                    }
                                }
                                $fatura->save();
                                $this->show($fatura->id);
                                break;
                            case 'por emitir':
                                $fatura->update_attributes(['estado' => 'por emitir']);
                                $fatura->save();
                                $this->show($fatura->id);
                                break;
                            case 'emitir':
                                $fatura->update_attributes(['estado' => 'emitido']);
                                $linhasFatura = Linhafatura::find_all_by_fatura_id($fatura->id);
                                foreach ($linhasFatura as $linhaFatura) {
                                    $fatura->ivatotal += $linhaFatura->quantidade * $linhaFatura->valoriva;
                                    $fatura->valortotal += $linhaFatura->quantidade * $linhaFatura->valoruni;
                                }
                                $fatura->valortotal = $fatura->valortotal + $fatura->ivatotal;
                                $fatura->save();
                                $this->show($fatura->id);
                        }
                    } else {
                        $this->edit($fatura->id);
                    }
                } else {
                    $this->show($fatura->id);
                }
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
                if (!isset($_GET['cliente_id'])) {
                    $this->getuser();
                } else {
                    $newCliente = User::find_by_id($_GET['cliente_id']);

                    $fatura = new Fatura();
                    $fatura->data = date_format(Carbon::now(), "Y-m-d");
                    $fatura->valortotal = 0;
                    $fatura->ivatotal = 0;
                    $fatura->estado = "por emitir";
                    $fatura->cliente_id = $newCliente->id;
                    $fatura->funcionario_id = $_SESSION['userID'];

                    if ($fatura->save()) {
                        $this->show($fatura->id);
                    } else {
                        $this->index();
                    }
                }
            }
        }
    }

    public function getuser()
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {

            $user = User::find_by_id($_SESSION['userID']);

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else {
                $connect = mysqli_connect("localhost", "root", "", "proj_pws");

                $output = "";

                if (isset($_POST['cliente'])) {
                    $input = $_POST['cliente'];

                    $query = "SELECT * FROM users WHERE username LIKE '%$input%' AND role = 'cliente'";

                    $res = mysqli_query($connect, $query);


                    $output .= '<table id="info-table">
                                    <thead style="align-content: center">
                                        <th>
                                            <h3>Nome</h3>
                                         </th>
                                         <th>
                                            <h3>Email</h3>
                                         </th>
                                         <th>
                                            <h3>Localidade</h3>
                                         <th>
                                            <h3>Role</h3>
                                         </th>
                                    </thead>';

                    if ($res->num_rows < 1) {
                        $output = '<a style="font-size: 20px;">NÂO EXISTE CLIENTES COM ESSE NOME</a>';
                    } else {
                        foreach ($res as $result) {

                            $output .= '<tr>
                                <td>' . $result['username'] . '</td>
                                <td>' . $result['email'] . '</td>
                                <td>' . $result['localidade'] . '</td>
                                <td>' . $result['role'] . '</td>
                                <td>
                                    <a href="router.php?c=fatura&a=create&cliente_id=' . $result['id'] . '"
                                       class="btn-styled">Escolher</a>
                                </td>
                            </tr>';
                        }
                    }
                    $this->renderView('fatura/getuser', ['output' => $output]);
                } else {
                    $this->renderView('fatura/getuser', ['output' => $output]);
                }

            }
        }
    }

    public function getproduct()
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {

            $user = User::find_by_id($_SESSION['userID']);

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else {
                $connect = mysqli_connect("localhost", "root", "", "proj_pws");

                $output = "";

                if (isset($_GET['fatura_id'])) {
                    $fatura = Fatura::find_by_id($_GET['fatura_id']);
                }

                if (isset($_POST['produto'])) {
                    $input = $_POST['produto'];

                    $query = "SELECT * FROM produtos WHERE descricao LIKE '%$input%'";

                    $res = mysqli_query($connect, $query);


                    $output .= '<table id="info-table">
                                    <thead style="align-content: center">
                                        <th>
                                            <h3>Referençia</h3>
                                         </th>
                                         <th>
                                            <h3>Descricao</h3>
                                         </th>
                                         <th>
                                            <h3>Preço</h3>
                                         <th>
                                            <h3>Stock</h3>
                                         </th>
                                    </thead>';

                    if ($res->num_rows < 1) {
                        $output = '<a style="font-size: 20px;">NÂO EXISTE PRODUTOS COM ESSE NOME</a>';
                    } else {
                        foreach ($res as $result) {

                            $output .= '<tr>
                                <td>' . $result['referencia'] . '</td>
                                <td>' . $result['descricao'] . '</td>
                                <td>' . $result['preco'] . ' €' . '</td>
                                <td>' . $result['stock'] . '</td>
                                <td>
                                    <a href="router.php?c=fatura&a=edit&id=' . $fatura->id . '&produto_id=' . $result['id'] . '"
                                       class="btn-styled">Escolher</a>
                                </td>
                            </tr>';
                        }
                    }
                    $this->renderView('fatura/getproduct', ['output' => $output, 'fatura' => $fatura]);
                } else {
                    $this->renderView('fatura/getproduct', ['output' => $output, 'fatura' => $fatura]);
                }
            }
        }
    }
}