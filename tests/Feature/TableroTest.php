<?php

namespace Tests\Feature;
namespace App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestTablero extends TestCase
{
    /**
     * Test para las funciones de la clase Tablero
     *
     * @return void
     */

    public function test_poner_ficha_tablero()
    {
        $x = rand(4, 10);
        $y = rand(4, 10);
        $color = rand(1,2);
        $columna = rand(0, $x);
        $ficha =  new Ficha($color);
        $tablero = new Tablero($x, $y);
        $tablero->poner_ficha($columna, $ficha);
        $this->assertEquals($ficha, $tablero->get_ficha($columna));
    }

    public function test_poner_ficha_invalida()
    {
        $x = rand(4, 10);
        $y = rand(4, 10);
        $color = rand(1,2);
        $columna = rand(-10, -1);
        $ficha =  new Ficha($color);
        $tablero = new Tablero($x, $y);
        $this->assertEquals(1, $tablero->poner_ficha($columna, $ficha));
    }

    public function test_limpiar_tablero(){
        $x = rand(4, 10);
        $y = rand(4, 10);
        $color = rand(1,2);
        $columna = rand(0, $x);
        $fila = rand(0, $y);
        $ficha =  new Ficha($color);
        $tablero = new Tablero($x, $y);
        for($i = 0; $i<=$x; $i++){
            for($j = 0; $j<=$y; $j++){
                $tablero->poner_ficha($i, $ficha);
            }
        }
        $tablero->limpiar();
        $this->assertEquals(NULL, $tablero->get_ficha($columna, $fila));
    }
}