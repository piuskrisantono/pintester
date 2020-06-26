<?php

namespace App\Http\Controllers;

use App\DetailTransaction;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function checkOut($id)
    {

        $transaction = new Transaction();
        $transaction->transaction_date = Carbon::now();
        $transaction->buyer_id = $id;
        $transaction->save();

        $posts = Session::get('cart')->posts;
        foreach ($posts as $post){
            $detail = new DetailTransaction();
            $detail->transaction_id = $transaction->id;
            $detail->post_id = $post['post']['id'];
            $detail->save();
        }

        Session::forget('cart');
        return redirect(url('/myTransaction/'.$id));
    }

    public function myTransaction($id)
    {
        $transactions = Transaction::where('buyer_id', '=', $id)->with('user')->get();
        $detailTransactions = DetailTransaction::with('post')->get();
        return view('myTransaction', compact('transactions','detailTransactions'));
    }

    public function allTransaction()
    {
        $transactions = Transaction::with('user')->get();
        $detailTransactions = DetailTransaction::with('post')->get();
        return view('myTransaction', compact('transactions','detailTransactions'));
    }
}
