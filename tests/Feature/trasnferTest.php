<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Wallet;
use App\Transfer;

class trasnferTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostTransfer()
    {
        $wallets =factory(Wallet :: class)->create();
        $transfer = factory(Transfer::class)->make();

        $response = $this->json('POST','/api/transfer', [
            'description' =>$transfer->description,
            'monto'=>$transfer->monto,
            'wallet_id' =>$wallets->id
        ]);

        $response->assertJsonStructure([
            'id','description','monto','wallet_id'
        ])->assertStatus(201);

        $this->assertDatabaseHas('transfers',[
            'description'=>$transfer->description,
            'monto' =>$transfer->monto,
            'wallet_id'=>$wallets->id
        ]);
        $this->assertDataBaseHas('wallets',[
            'id'=>$wallets->id,
            'money' => $wallets->money + $transfer->monto

        ]);
    }
}
