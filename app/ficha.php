<?php
namespace App;

interface InterfazFicha {
    public function get_color();
}

class Ficha implements InterfazFicha {
    
    // 0 = Rojo
    // 1 = Azul
    protected int $color;

    public function __construct(int $color = 0)
    {
        $this->color = $color;
    }
    
    public function get_color(){
        return $this->color;
    }
}