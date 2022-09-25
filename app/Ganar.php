<?php
namespace App;

interface GanarInterfaz{
    public function ganar_horizontal(Tablero $tablero);
}

class Ganar{
    public function ganar_horizontal(Tablero $tablero){
        $color = $tablero->ult_ficha->get_color();
        $cont = 0;
        $x = $tablero->ult_x;
        $y = $tablero->ult_y;
        $flag = 1;
        while($flag != 0){
            if(is_object($tablero->get_ficha($x, $y)) && $color == $tablero->get_ficha($x, $y)->get_color()){
                $cont++;
                $x++; // TODO esto esta a medias
            }
        }
    }
}