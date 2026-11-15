<?php


class Produto extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia', 'message' => 'Campo obrigatório'),
        array('descricao', 'message' => 'Campo obrigatório'),
        array('preco', 'message' => 'Campo obrigatório'),
        array('stock', 'message' => 'Campo obrigatório'),
        array('iva_id', 'message' => 'Campo obrigatório'),
    );

    static $has_one = array(
        array('iva')
    );

    static $belongs_to = array(
        array('linhafatura')
    );
}