<?php

class Pilha {
    //Propriedades
    public $elementos;

    //Métodos
    function inserir($elemento){
        // Método que inseri um elemento na pilha
        //Complexidade O(1)
        array_push($this->elementos, $elemento);
    }

    function remover(){
        // Método que inseri um elemento na pilha
        //Complexidade O(1)
        if(count($this->elementos) == 0){
            return "Underflow\n";
        }else{
            unset($this->elementos[count($this->elementos)-1]);
        }
    }

    function get_pilha(){
        //Método que retorna a pilha de elementos
        return $this->elementos;
    }

    function set_pilha($arr){
        //Método que inicializa a pilha de elementos
        $this->elementos = $arr;
    }
}
?>
