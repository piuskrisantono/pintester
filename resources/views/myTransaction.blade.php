@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($transactions as $transaction)
        <div style="background-color: lightgrey; margin: 10px;">
            Transaction ID: {{$transaction->id}} <br>
            Buyer: {{$transaction->user->name}} <br>
            Transaction Date: {{$transaction->transaction_date}} <br>
            @php($total = 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>

                @foreach($detailTransactions as $detailTransaction)
                    @if($detailTransaction->transaction_id == $transaction->id)
                        <tr>
                            <td><img style="width: 100px;height: 80px;" src="{{url('Aset/'.$detailTransaction->post->first()->image)}}" alt=""></td>
                            <td>{{$detailTransaction->post->first()->title}}</td>
                            <td>{{$detailTransaction->post->first()->price}}</td>
                        </tr>
                        @php($total += $detailTransaction->post->first()->price)
                    @endif
                @endforeach
                </tbody>
            </table>
            TotalPrice: <strong>Rp {{$total}}</strong>
        </div>
    @endforeach
</div>
@endsection
