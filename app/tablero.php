<?php
namespace App;

interface InterfazTablero {
    public function poner_ficha(int $columna, Ficha $ficha);
    public function get_ficha(int $columna, int $fila);
    public function limpiar();
}

class Tablero implements InterfazTablero{
    
    protected int $x;           // columnas
    protected int $y;           // filas
    protected array $tablero;
    public int $ult_x;
    public int $ult_y;
    public Ficha $ult_ficha;

    public function __construct(int $col = 6, int $fil = 6)
    {
        if($col < 4)
        {
            print("Tamaño invalido");
            $this  -> x = 7;
        }
        if($fil < 4)
        {
            print("Tamaño invalido");
            $this  -> y = 6;
        }
        $this->x = $col;
        $this->y = $fil;
        $this->limpiar();
    }
    
    # poner_ficha -> recibe una columna y una ficha y coloca la ficha en la posicion mas alta disponible de la columna dada
    public function poner_ficha(int $columna, Ficha $ficha)
    {
        $fila = $this->altura($columna);
        if ($fila != -1){
            $this->tablero[$columna][$fila] = $ficha;
            $this->ult_x = $columna;
            $this->ult_y = $fila;
            $this->ult_ficha = $ficha;
            return 0;
        }
        print("No se puede colocar una ficha en esa columna.");
        return 1;
    }
    
    #  get_ficha -> recibe una columna y (opcional) una fila y devuelve la ficha en esa celda
    #  si no recibe fila devuelve la ficha mas arriba de la columna
    #  si se recibe una posición invalida devuelve NULL
    public function get_ficha(int $columna, int $fila = -1)
    {
        if($fila == -1){
            $fila = $this->altura($columna)-1;
            return $this->tablero[$columna][$fila];
        }
        if(!($this->fila_valida($fila)) || !($this->columna_valida($columna))){
            return NULL;
        }
        return $this->tablero[$columna][$fila];

    }

    # limpiar -> recorre todas las casillas del tablero y reemplaza su valor por NULL
    public function limpiar()
    {
        for($x=0; $x<=$this->x; $x++){
            for($y=0; $y<=$this->y; $y++){
                $this->tablero[$x][$y] = NULL;
            }
        }
    }

    # altura -> recibe una columna y devuelve la primera fila vacia de la misma o -1 si está llena
    public function altura(int $col)
    {
        $disponible = -1;
        $fila_actual = 0;
        if($this->columna_valida($col)){
            while($disponible < 0 && $fila_actual <= $this->y){
                if(empty($this->tablero[$col][$fila_actual])){
                    $disponible = $fila_actual;
                }
                $fila_actual++;
            }
        }
        return $disponible;
    }

    #  fila_valida -> valida la existencia de una fila dada
    private function fila_valida($fila){
        return ($fila <= $this-> y && $fila >= 0);
    }

    #  columna_valida -> valida la existencia de una columna dada
    private function columna_valida($columna){
        return ($columna <= $this-> x && $columna >= 0);
    }
}