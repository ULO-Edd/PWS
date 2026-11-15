<?php


class User extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username', 'message' => 'Campo obrigatório'),
        array('password', 'message' => 'Campo obrigatório'),
        array('email', 'message' => 'Campo obrigatório'),
        array('telefone', 'message' => 'Campo obrigatório'),
        array('nif', 'message' => 'Campo obrigatório'),
        array('morada', 'message' => 'Campo obrigatório'),
        array('localidade', 'message' => 'Campo obrigatório'),
        array('codpostal', 'message' => 'Campo obrigatório'),
        array('role', 'message' => 'Campo obrigatório'),
    );

    static $validates_size_of = array(
        array('username', 'maximum' => 36, 'too_long' => 'Username tem que ser menor'),
        array('password', 'maximum' => 36, 'too_long' => 'password tem que ser menor'),
        array('telefone', 'is' => 9, 'message' => 'Formato inválido'),
        array('nif', 'is' => 9, 'message' => 'Formato inválido'),
        array('morada', 'maximum' => 72, 'too_long' => 'Morada tem que ser menor'),
        array('codpostal', 'is' => 8, 'message' => 'Formato inválido'),
        array('localidade', 'maximum' => 72, 'too_long' => 'Localidade tem que ser menor'),
    );

    static $validates_format_of = array(
        array('email', 'with' =>
            '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', 'message' => 'Formato inválido'),
    );
}