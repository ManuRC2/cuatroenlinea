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
        $this->assertEquals($ficha, $tablero->get_ficha($columna, $tablero->altura($columna)-1));
    }

}