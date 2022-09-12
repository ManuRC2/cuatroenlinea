<?php

namespace Tests\Feature;
namespace App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class TestFicha extends TestCase
{
    /**
     * Test para las variantes de color de la clase Ficha
     *
     * @return void
     */

    public function test_color()
    {
        for($i = 0; $i < 15; $i++){
            $color = rand(1,2);
            $ficha = new Ficha($color);
            $this->assertEquals($ficha->get_color(), $color);
        }
    }   
}