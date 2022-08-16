<?php

namespace App\Http\Controllers\admin\urun;

use App\Http\Controllers\Controller;
use App\Models\AltKategori;
use App\Models\Kategori;
use App\Models\Urun;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data = Urun::paginate(10);
        return view('admin.urun.index',['data'=>$data]);
    }
    public function create(){
        $kategori = Kategori::all();
        $altkategori = AltKategori::all();
        return view('admin.urun.create',['kategori'=>$kategori,'altkategori'=>$altkategori]);
    }

    public function store(Request $request){
        $all = $request->except('_token');
        $insert = Urun::create($all);
        if($insert){
            return redirect()->back()->with('status','Ürün Eklendi');
        }
        else{
            return redirect()->back()->with('status','Ürün Eklenemedi');
        }
    }
    public function edit($id){
        $kategori = Kategori::all();
        $altkategori = AltKategori::all();
        $data = Urun::where('UrunID','=',$id)->get();
        return view('admin.urun.edit',['data'=>$data,'kategori'=>$kategori,'altkategori'=>$altkategori]);
    }
    public function delete($id){
        $delete = Urun::where('UrunID','=',$id)->delete();
        if($delete){
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
    public function update(Request $request){
        $id = $request->route('id');
        $all = $request->except('_token');
        $update = Urun::where('UrunID','=',$id)->update($all);
        if($update){
            return redirect()->back()->with('status','Ürün Düzenlendi');
        }
        else{
            return redirect()->back()->with('status','Ürün Düzenlenemedi');
        }
    }
}
