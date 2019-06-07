<?php

namespace Tests\Feature;

use App\Pesanan;
use App\Menu;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class PesananTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_tampil_keranjang()
    {
        $this->withoutMiddleware();
        $response = $this->get('/keranjang');
        $response->assertSee('Keranjang Belanja');
    }

    public function test_pesanan()
    {
        $pesanan = Pesanan::create([
            'user_id' => '1',
            'pesanan' => 'impedit',
            'jumlah' => '5',
            'totalharga' => '65245'
        ]);
        
        $this->assertDatabaseHas('pesanans',[
            'user_id' => '1',
            'pesanan' => 'impedit',
            'jumlah' => '5',
            'totalharga' => '65245'
        ]);
        
        //ngetes apakah harganya sama dengan yang di menu
        $menu = Menu::where('menu','impedit')->first();
        $pesan = Pesanan::where('pesanan', 'impedit')->first();
        $this->assertEquals($menu->harga,($pesan->totalharga/$pesan->jumlah));
        
    }

}
