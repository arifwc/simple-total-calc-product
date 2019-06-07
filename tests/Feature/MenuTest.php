<?php

namespace Tests\Feature;

use App\Menu;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\TestResponse;

class MenuTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tampil_menu()
    {
        $this->withoutMiddleware();
        $response = $this->get('/menu');
        $response->assertSee('Menu Kantin');
        $menu = Menu::all();
        $this->assertEquals(count($menu), 10);
    }
}
