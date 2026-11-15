<?php


class Fatura extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('cliente_id', 'message' => 'Campo obrigatório'),
        array('funcionario_id', 'message' => 'Campo obrigatório'),
        array('estado', 'message' => 'Campo obrigatório'),
        array('ivatotal', 'message' => 'Campo obrigatório'),
        array('valortotal', 'message' => 'Campo obrigatório'),
        array('data', 'message' => 'Campo obrigatório'),
    );

    static $has_many = array(
        array('linhafatura')
    );

    static $belongs_to = array(
        array('user')
    );
}