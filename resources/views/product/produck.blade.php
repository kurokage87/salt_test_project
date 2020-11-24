@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Produk</div>

                <div class="card-body">
                    <a href="{{url('produk/tambah')}}" class="btn btn-primary">Input Produk</a>
                    <br>
                    <br>
                    <form action="{{url('/produk/cari')}}" method="get">
                        <div class="row col-md-6 form-group">
                            <label>Cari Order</label>
                            <input type="text" name="search" class="form-control" value="{{old('search')}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="CARI" class="btn btn-info">
                        </div>
                    </form>
  
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Nama Produk</th>
                                <th>Total Belanja</th>
                                <th>No Resi</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach($order as $p)
                            <tr>
                                <td>{{$p->order_no}}</td>
                                <td>{{$p->product['nama_barang']}}</td>
                                <td>{{$p->total_balance}}</td>
                                <th>{{$p->shipping_code}}</th>
                                @if($p->status == 0)
                                <th>Unpaid</th>
                                @elseif($p->status == 1)
                                <th>Paid</th>
                                @else
                                <th>Cancel</th>
                                @endif
                                <td>
                                    @if($p->status == 0)
                                    <a href="{{url('/')}}/pay/{{ $p->id }}" class="btn btn-danger">Pay</a> 
                                    <a href="{{url('/')}}/produk/view/{{ $p->id }}" class="btn btn-primary">View</a>
                                    @else
                                    <a href="{{url('/')}}/produk/view/{{ $p->id }}" class="btn btn-primary">View</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$order->links()}}
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection