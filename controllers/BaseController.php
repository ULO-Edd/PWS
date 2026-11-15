<?php


class BaseController
{

    public function redirectToRoute($c, $a){
        header('Location: http://localhost/PW_S_2ano/Projeto_PWS_2ANO/router.php?c='. $c .'&a='. $a);
    }

    public function renderView($view, $params = []) {
        extract($params);

        require_once "views/layouts/header.php";
        require_once "views/". $view .".php";
    }

}