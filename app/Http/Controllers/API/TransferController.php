<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    public function transfer(Request $request){
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'amount'      =>    'required|numeric|min:1'
        ]);
        $sender = Auth::user();
        if($sender->id == $request->receiver_id){
            return response()->json(['message'=>'Cannot transfer to yourself'],400);
        }
        DB::beginTransaction();
        try{
            $senderWallet = Wallet::where('user_id',$sender->id)->lockForUpdate()->first();
            $receiverWallet = Wallet::where('user_id',$request->receiver_id)->lockForUpdate()->first();
            if($senderWallet->balance < $request->amount){
                return response()->json(['message'=>'Insufficient balance'],400);
            }
            $senderWallet->balance -= $request->amount;
            $receiverWallet->balance += $request->amount;
            $senderWallet->save();
            $receiverWallet->save();
            Transaction::create([
                'sender_id' => $sender->id,
                'receiver_id' => $request->receiver_id,
                'amount' => $request->amount
            ]);
            DB::commit();
            return response()->json([
                'message'=>'Amount Transfer successful'
            ]);

        }catch(\Exception $e){

        DB::rollBack();

            return response()->json([
                'message'=>'Transfer failed'
            ],500);
        }
    }
}
