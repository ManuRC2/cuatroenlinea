<?php
namespace App;

interface InterfazTablero {
    public function poner_ficha(int $columna, Ficha $ficha);
    public function limpiar();
}

class Tablero implements InterfazTablero{
    
    protected int $x;           // columnas
    protected int $y;           // filas
    protected array $tablero;

    public function __construct(int $col = 6, int $fil = 6)
    {
        if($col <= 4)
        {
            print("Tamaño invalido");
            $this  -> x = 7;
        }
        if($fil <= 4)
        {
            print("Tamaño invalido");
            $this  -> y = 6;
        }
        $this->x = $col;
        $this->y = $fil;
        $this->limpiar();
    }
    
    public function poner_ficha(int $columna, Ficha $ficha)
    {
        $fila = $this->altura($columna);
        if ($fila != -1){
            $this->tablero[$columna][$fila] = $ficha->get_color();
        }
        else
        {
            print("No se puede colocar una ficha en esa columna.");
        }
    }

    public function limpiar()
    {
        for($x=0; $x<$this->x; $x++){
            for($y=0; $y<$this->y; $y++){
                $this->tablero[$x][$y] = NULL;
            }
        }
    }

    private function altura(int $col){
        $disponible = -1;
        $fila_actual = 0;
        while($disponible<0 && $fila_actual <= $this->altura){
            if($disponible = $this->tablero[$col][$fila_actual] == NULL){
                $disponible = $fila_actual;
            }
            $fila_actual++;
        }
        return $disponible;
    }
}