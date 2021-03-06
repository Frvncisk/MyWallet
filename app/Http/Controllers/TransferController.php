<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;
use App\Wallet;

class TransferController extends Controller
{
    public function store(Request $request){
        $wallet = Wallet::find($request ->wallet_id);
        $wallet->money = $wallet->money + $request->monto;
        $wallet->update();

        $transfer = new Transfer();
        $transfer->description = $request->description;
        $transfer->monto = $request->monto;
        $transfer->wallet_id = $request->wallet_id;
        $transfer->save();

        return response()->json($transfer , 201);
    }
}
