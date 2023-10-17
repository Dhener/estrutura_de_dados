<?php

define("NUM_MAX_ELEMENTOS", 12);

class Fila {

    //Propriedades
    public $elementos; //array de elementos da fila
    public $base;   //"ponteiro" para a base da fila
    public $topo;  //"ponteiro" para o topo da fila
    public $quant_elementos;  //quantidade de elementos na pilha

    //Métodos
    function inserir($elemento){
        // Método que inseri um elemento na fila
        //Complexidade O(1)

        if (($this->topo+1) % NUM_MAX_ELEMENTOS === $this->base){
            // Condição para verificar se a fila está cheia
            return "Overflow!\n";
        }

        //adiciona elemento na fila
        $this->elementos[$this->quant_elementos] = $elemento;

        //controla a quantidade de elementos adicionados na fila
        $this->quant_elementos = ($this->quant_elementos + 1)%NUM_MAX_ELEMENTOS;

        //controla o ponteiro para apontar sempre para o último elemento adicionado
        if($this->quant_elementos == 1){
            $this->topo = 0;
        }else{
            $this->topo = ($this->topo + 1)%NUM_MAX_ELEMENTOS;
        } 
    }

    function remover(){
        // Método que inseri um elemento na fila
        //Complexidade O(1)

        if($this->topo < $this->base){
            // Condição para verificar se a fila está vazia
            $this->topo = 0;
            $this->base = 0;
            return "Underflow!\n";
        }

        //remove elemento da fila
        $this->elementos[$this->base] = null;

        $this->quant_elementos = $this->quant_elementos-1;

        $this->base = ($this->base + 1) % NUM_MAX_ELEMENTOS;
    }

    function get_fila(){
        //Método que retorna a fila de elementos
        return $this->elementos;
    }

    function set_fila(){
        //Método que inicializa a fila de elementos
        $this->elementos = array_fill(0, NUM_MAX_ELEMENTOS, null);
        $this->base = 0;
        $this->topo = 0;
        $this->quant_elementos = 0;
    }
}
?>
