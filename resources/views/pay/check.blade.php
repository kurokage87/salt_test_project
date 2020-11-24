@extends('layouts.app')


@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Top Up Balance
        </div>

        <div class="card-body">
            <a href="{{url('/topup/history')}}" class="btn btn-primary">Kembali</a>

            <br>
            <br>

            <form action="{{url('/')}}/pay/save/{{$order->id}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Pay Your Order</label>
                    <input type="text" name="no_order" class="form-control" placeholder="0812xxxxxx" value="{{$order->order_no}}">

                    @if($errors->has('no_order'))
                        <div class="text-danger">
                            {{ $errors->first('no_order')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection()