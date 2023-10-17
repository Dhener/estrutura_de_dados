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

    //Método usado no quicksort
    function particao($inicio,$final){

        //barra que separa os elementos menores e maiores que o pivô
        $bastao_amarelo = $inicio;

        //armazena sempre o último elemento de cada lista da vez que está sendo ordenada
        $pivo = $this->elementos[$final];

        //O "bastao_roxo é a variável que vai percorrendo todos os elementos da lista
        for($bastao_roxo = $inicio; $bastao_roxo < $final; $bastao_roxo++){

            if($this->elementos[$bastao_roxo] <= $pivo){
                /*
                    Se a condição for satisfeita é porque encontramos um elemento menor que o pivô e 
                    ele será colocado "antes do bastao_amarelo"
                */
                $aux = $this->elementos[$bastao_roxo];
                $this->elementos[$bastao_roxo] = $this->elementos[$bastao_amarelo];
                $this->elementos[$bastao_amarelo] = $aux;
                $bastao_amarelo++;
            }
        }

        //coloca o pivô entre os elementos menores e maiores do que ele
        $aux = $this->elementos[$bastao_amarelo];
        $this->elementos[$bastao_amarelo] = $this->elementos[$final];
        $this->elementos[$final] = $aux;
        return $bastao_amarelo;
    }

    function quick($inicio,$final){
        //complexidade melhor e médio caso: O(n.log(n))
        //complexidade no pior caso: O(n^2)
        
        if($inicio < $final){
            $bastao_amarelo = $this->particao($inicio,$final);
            $this->quick(0,$bastao_amarelo-1);
            $this->quick($bastao_amarelo+1,$final);
        }
    }
}
?>
