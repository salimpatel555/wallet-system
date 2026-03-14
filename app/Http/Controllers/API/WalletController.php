<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function wallet(){
        $wallet = Auth::user()->wallet;
        return response()->json([
            'status' => "success",
            'balance'=>$wallet->balance
        ]);

    }
}
