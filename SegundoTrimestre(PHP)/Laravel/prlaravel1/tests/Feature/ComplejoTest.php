<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Complejo;

class ComplejoTest extends TestCase
{
    /**
     * A basic feature test example.
     *s
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_suma()
    {
        /**
         * @var Complejo $complejo1
         */

        $complejo1 = new Complejo();
      
        $complejo1->setReal(2)->setImg(3);
        $complejo2 = new Complejo();
        
        $complejo2->setReal(4)->setImg(5);
        $resultado = new Complejo();
        $resultado->setReal(6)->setImg(8);
        $this->assertEquals($complejo2->suma($complejo1), $resultado);
        $this->assertEquals($complejo1->suma($complejo2), $resultado);
    }
    public function test_opuesto()
    {
        $complejo1 = new Complejo();
        $complejo1->setReal(3)->setImg(4);
        $resultado = new Complejo();
        $resultado->setReal(-3)->setImg(-4);
        $this->assertEquals($complejo1->opuesto($complejo1), $resultado);
    }

    public function test_resta()
    {
        $complejo1 = new Complejo();
        $complejo1->setReal(3)->setImg(4);
    
        $complejo2 = new Complejo();
        $complejo2->setReal(4)->setImg(5);
        $resultado = new Complejo();
        $resultado->setReal(-1)->setImg(-1);
        $this->assertEquals($complejo1->resta($complejo2), $resultado);
    }
}
