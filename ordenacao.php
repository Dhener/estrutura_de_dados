<?php

class Ordenacao {

    //propriedades
    public $elementos;
    public $length;

    function __construct($elementos) {
        $this->elementos = $elementos;
        $this->length = count($elementos);
    }

    //Métodos
    function insertion(){
        //complexidade: O(n^2)

        //tamanho do subarray
        $length_subarray = 1;
        for($i = 0; $i < $this->length; $i++){

            //pivô é o número da vez que está sendo verificado
            $pivo = $this->elementos[$i];

            //posição do subarray
            $pos_subarray = $length_subarray - 2;

            while($pos_subarray >= 0){

                if($pivo < $this->elementos[$pos_subarray]){
                    //faz a troca de elementos na lista original caso o número da vez for menor
                    $aux = $this->elementos[$pos_subarray];
                    $this->elementos[$pos_subarray] = $pivo;
                    $this->elementos[$pos_subarray+1] = $aux;
                }
                $pos_subarray--;
            }
            $length_subarray++;
        }
        return $this->elementos;
    }

    function selection(){
        //complexidade: O(n^2)

        //posição do subarray
        $pos_subarray = 1;

        for($i = 0; $i < $this->length; $i++){

            //posição do suposto menor valor da lista 
            $pos_menor = $i;

            //menor valor da lista
            $menor = $this->elementos[$i];

            //variável de auxílio para não perder a posição do subarray
            $j = $pos_subarray;

            while($j < $this->length){

                if ($this->elementos[$j] < $menor){
                    //verifica se foi encontrado o menor valor que o anterior
                    $menor = $this->elementos[$j];
                    $pos_menor = $j;
                }
                $j++;
            }

            /*faz a troca de elementos da lista colocando os menores valores
            nas posições iniciais*/
            $aux =  $this->elementos[$i];
            $this->elementos[$i] = $menor;
            $this->elementos[$pos_menor] = $aux;
           
            //proxima subposição da lista
            $pos_subarray++;

        }
        return $this->elementos;
    }

    function bubble(){
        //complexidade: O(n^2)

        for($i = 0; $i < $this->length; $i++){
            for($j = 0; $j < $this->length-1; $j++){
                if ($this->elementos[$j+1] < $this->elementos[$j]){
                    $aux = $this->elementos[$j];
                    $this->elementos[$j] = $this->elementos[$j+1];
                    $this->elementos[$j+1] = $aux;
                }
            }
        }
        return $this->elementos;
    }
}
?>
