@extends('layouts.app')


@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Edit Data Produk {{$produk->nama_barang}}
        </div>

        <div class="card-body">
            <a href="{{url('/produk')}}" class="btn btn-primary">Kembali</a>

            <br>
            <br>

            <form action="{{url('/')}}/produk/editproduk/{{$produk->id}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="{{$produk->nama_barang}}">

                    @if($errors->has('nama_barang'))
                        <div class="text-danger">
                            {{ $errors->first('nama_barang')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat">{{$produk->alamat}}</textarea>

                        @if($errors->has('alamat'))
                        <div class="text-danger">
                            {{ $errors->first('alamat')}}
                        </div>
                    @endif

                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" name="price" placeholder="Harga" class="form-control" value="{{$produk->price}}">

                        @if($errors->has('price'))
                        <div class="text-danger">
                            {{ $errors->first('price')}}
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