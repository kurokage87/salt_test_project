<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\TopUpBalance;
use App\Jobs\paycancel;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function produk()
    {   
        // $produk = Product::all();
        $uid = Auth::id();
        $order = Order::where('user_id', $uid)->paginate(20);
        // print_r($order->order);die;
        
        return view('product.produck',[
            'order' => $order
        ]);
    }

    public function search(Request $req)
    {
        $cari = $req->search;
        $uid = Auth::id();
        $order = Order::where('user_id', $uid)
        ->where('order_no','like', '%'.$cari.'%')->paginate(20);

        return view('product.produck',[
            'order' => $order
        ]);


    }

    public function tambah()
    {
        return view('product.tambah');
    }

    public function saveproduk(Request $req)
    {
        $this->validate($req, [
            'nama_barang' => 'required',
            'alamat' => 'required',
            'price' => 'required',
        ]);

       $a =  Product::create([
            'nama_barang' => $req->nama_barang,
            'alamat' => $req->alamat,
            'price' => $req->price
        ]);

        $uid= Auth::id();
        $max = Product::max('id');

        $order_no = "salt".($max + 1);
        $totalProd = ($a->price + 10000);
        $order = Order::create([
           'order_no' => $order_no,
           'user_id' => $uid,
           'product_id' => $a->id,
           'total_balance' => $a->price,
           'status' => 0
        ]);
       
        paycancel::dispatch($order)->delay(now()->addMinutes(5));
        return redirect('/produk');
    }
    

    public function edit($id){
        $produk = Product::find($id);
        return view('product.edit',[
            'produk' => $produk
        ]);
    }

    public function view($id){
        $order = Order::find($id);
        
        return view('product.view',[
            'order' => $order
        ]);
    }

    public function editproduk($id, Request $req){
        $this->validate($req, [
            'nama_barang' => 'required',
            'alamat' => 'required',
            'price' => 'required',
        ]);

        $produk = Product::find($id);
        $produk->nama_barang = $req->nama_barang;
        $produk->alamat = $req->alamat;
        $produk->price = $req->price;
        $produk->save();
        return redirect('/produk');
    }

    public function delete($id)
    {
        $prod = Product::find($id);
        $prod->delete();
        return redirect('produk');
    }

    public function topup(){
        return view('topup.tambah');
    }

    public function topupsave(Request $req){
        $uid = Auth::id();

        $this->validate($req, [
            'no_tlp' => 'required',
            'balance' => 'required',
        ]);

        $balance = ($req->balance * 0.05);
        $total = $balance + $req->balance;
        // print_r($balance);die;

        TopUpBalance::create([
            'user_id' => $uid,
            'no_telp' => $req->no_tlp,
            'top_up_value' => $total
        ]);
        
        return redirect('topup/history');
    }

    public function topuphistory()
    {
        $uid = Auth::id();
        $topup = TopUpBalance::where('user_id', $uid)->paginate(20);

        return view('topup.history',[
            'topup' => $topup
        ]);
    }

    public function pay($id)
    {
        $order = Order::find($id);

        return view('pay.check',[
            'order' => $order
        ]);
    }

    public function paysave($id, Request $req)
    {
        $this->validate($req, [
            'no_order' => 'required',
        ]);

        $ord = Order::find($id);
        $ord->status = 1;

        $str = 'abcdefghi1234567890';
        $suffle = str_shuffle($str);

        $ord->shipping_code = $suffle;
        $ord->updated_at = now();
        $ord->save();

        return redirect('produk');
    }
}
