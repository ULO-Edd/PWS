<?php
require_once "startup/boot.php";
require_once "controllers/EmpresaController.php";
require_once "controllers/FaturaController.php";
require_once "controllers/IvaController.php";
require_once "controllers/LinhaFaturaController.php";
require_once "controllers/MainViewController.php";
require_once "controllers/ProdutoController.php";
require_once "controllers/UserController.php";


$empresaController = new EmpresaController();
$faturaController = new FaturaController();
$ivaController = new IvaController();
$linhaFaturaController = new LinhaFaturaController();
$mainViewController = new MainViewController();
$produtoController = new ProdutoController();
$userController = new UserController();


if (isset($_GET['c']) == false && isset($_GET['a']) == false) {
    $mainViewController->login();
} else {
    $controller = $_GET['c'];
    $action = $_GET['a'];

    switch ($controller) {
        case 'empresa':
            switch ($action) {
                case 'show':
                    $empresaController->show($_GET['id']);
                    break;
                case 'edit':
                    $empresaController->edit($_GET['id']);
                    break;
                case 'update':
                    $empresaController->update($_GET['id']);
                    break;
            }
            break;
        case 'fatura':
            switch ($action) {
                case 'index':
                    $faturaController->index();
                    break;
                case 'create':
                    $faturaController->create();
                    break;
                case 'store':
                    $faturaController->store();
                    break;
                case 'show':
                    $faturaController->show($_GET['id']);
                    break;
                case 'edit':
                    $faturaController->edit($_GET['id']);
                    break;
                case 'update':
                    $faturaController->update($_GET['id']);
                    break;
                case 'getuser':
                    $faturaController->getuser();
                    break;
                case 'getproduct':
                    $faturaController->getproduct();
                    break;

            }
            break;
        case 'iva':
            switch ($action) {
                case 'index':
                    $ivaController->index();
                    break;
                case 'create':
                    $ivaController->create();
                    break;
                case 'show':
                    $ivaController->show($_GET['id']);
                    break;
                case 'edit':
                    $ivaController->edit($_GET['id']);
                    break;
                case 'store':
                    $ivaController->store();
                    break;
                case 'update':
                    $ivaController->update($_GET['id']);
                    break;
            }
            break;
        case 'linhaFatura':
            switch ($action) {
                case 'store':
                    $linhaFaturaController->store($_GET['id']);
                    break;
            }
            break;
        case 'mainView':
            switch ($action) {
                case 'index':
                    $mainViewController->index();
                    break;
                case 'login':
                    $mainViewController->login();
                    break;
            }
            break;
        case 'produto':
            switch ($action) {
                case 'index':
                    $produtoController->index();
                    break;
                case 'create':
                    $produtoController->create();
                    break;
                case 'show':
                    $produtoController->show($_GET['id']);
                    break;
                case 'edit':
                    $produtoController->edit($_GET['id']);
                    break;
                case 'store':
                    $produtoController->store();
                    break;
                case 'update':
                    $produtoController->update($_GET['id']);
                    break;
            }
            break;
        case 'user':
            switch ($action) {
                case 'index':
                    $userController->index();
                    break;
                case 'register':
                    $userController->register();
                    break;
                case 'show':
                    $userController->show($_GET['id']);
                    break;
                case 'edit':
                    $userController->edit($_GET['id']);
                    break;
                case 'auth':
                    $userController->auth($_POST['username'], $_POST['password']);
                    break;
                case 'logout':
                    $userController->logout();
                    break;
                case 'store':
                    $userController->store();
                    break;
                case 'update':
                    $userController->update($_GET['id']);
                    break;
            }
            break;
    }
}
?>