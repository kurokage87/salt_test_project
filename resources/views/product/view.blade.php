@extends('layouts.app')


@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            View Detail Order
        </div>

        <div class="card-body">
            @if($order->status == 0)
            <a href="{{url('/produk')}}" class="btn btn-primary">Kembali</a>
            <a href="{{url('/')}}/pay/{{$order->id}}" class="btn btn-success">pay</a>
            @else
            <a href="{{url('/produk')}}" class="btn btn-primary">Kembali</a>
            @endif
            <br>
            <br>

            @if($order->status == 0)
                <h1>Unpaid</h1>
            @elseif($order->status == 1)
                <h1>Success Paid!!</h1>
            @else
                <h1>Cancel Order!!</h1>
            @endif

            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Order No</td>
                        <td>{{$order->order_no}}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>{{$order->total_balance}}</td>
                    </tr>
                </thead>
            </table>

            <p>
                {{$order->product->nama_barang}} that cost {{$order->product->price}} will be shipped to <br>
                {{$order->product->alamat}}
                <br><br>
                Only after you pay
            </p>
        </div>
    </div>
</div>
@endsection()