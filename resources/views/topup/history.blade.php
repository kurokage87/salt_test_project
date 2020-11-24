@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Produk</div>

                <div class="card-body">
                    <a href="{{url('topup')}}" class="btn btn-primary">Top Up Balance</a>
                    <br>
                    <br>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No Telphone</th>
                                <th>Top Up Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach($topup as $p)
                            <tr>
                                <td>{{$p->no_telp}}</td>
                                <td>{{$p->top_up_value}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$topup->links()}}
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection