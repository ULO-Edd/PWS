<?php


class Linhafatura extends \ActiveRecord\Model
{
    public function validate()
    {
        if($this->produto_id != null) {
            $produto = Produto::find_by_id($this->produto_id);

            if ($this->quantidade > $produto->stock) {
                $this->errors->add('quantidade', "Quantidade maior do que há em stock");
            }
        }
    }

    static $validates_presence_of = array(
        array('produto_id', 'message' => 'Campo obrigatório'),
        array('quantidade', 'message' => 'Campo obrigatório'),
    );

    static $has_one = array(
        array('produto')
    );

    static $belongs_to = array(
        array('fatura')
    );
}