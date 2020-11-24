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

            <form action="{{url('/topup/save')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>No Handphone</label>
                    <input type="text" name="no_tlp" class="form-control" placeholder="0812xxxxxx">

                    @if($errors->has('no_tlp'))
                        <div class="text-danger">
                            {{ $errors->first('no_tlp')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Balance</label>
                    <input type="number" name="balance" name="price" placeholder="" class="form-control">

                        @if($errors->has('balance'))
                        <div class="text-danger">
                            {{ $errors->first('balance')}}
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