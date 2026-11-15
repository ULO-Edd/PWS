<?php


class Iva extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('descricao', 'message' => 'Campo obrigatório'),
        array('percentagem', 'message' => 'Campo obrigatório'),
        array('vigor', 'message' => 'Campo obrigatório'),
    );

    static $belongs_to = array(
        array('produto')
    );

}