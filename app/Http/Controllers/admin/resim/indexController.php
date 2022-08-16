<?php

namespace App\Http\Controllers\admin\resim;
use App\Helper\imageUpload;

use App\Http\Controllers\Controller;
use App\Models\Resim;
use App\Models\Urun;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data = Resim::paginate(10);
        return view('admin.resim.index',['data'=>$data]);
    }
    public function create(){
        $urun = Urun::all();
        return view('admin.resim.create',['urun'=>$urun]);
    }

    public function store(Request $request){
        $all = $request->except('_token');
        $all['Resim1'] = imageUpload::singleUpload(rand(1,9000),'resim',$request->file('Resim1'));
        $all['Resim2'] = imageUpload::singleUpload(rand(1,9000),'resim',$request->file('Resim2'));
        $all['Resim3'] = imageUpload::singleUpload(rand(1,9000),'resim',$request->file('Resim3'));
        $all['Resim4'] = imageUpload::singleUpload(rand(1,9000),'resim',$request->file('Resim4'));
        $all['Resim5'] = imageUpload::singleUpload(rand(1,9000),'resim',$request->file('Resim5'));

        $insert = Resim::create($all);
        if($insert){
            return redirect()->back()->with('status','Resimler Başarı ile Eklendi');
        }
        else{
            return redirect()->back()->with('status','Resimler Eklenemedi');

        }
    }
    public function edit($id){

        $data = Resim::where('ResimID','=',$id)->get();
        $urunid = $data[0]['UrunID'];
        $urun = Urun::where('UrunID','=',$urunid)->get();
        return view('admin.resim.edit',['data'=>$data,'urun'=>$urun]);
    }
    public function update(Request $request){
        $id = $request->route('id');
        $data = Resim::where('ResimID','=',$id)->get();
        $all = $request->except('_token');
        $all['Resim1'] = imageUpload::singleUploadUpdate(rand(1,900),'resim','Resim1',$data,'Resim1');
        $all['Resim2'] = imageUpload::singleUploadUpdate(rand(1,900),'resim','Resim2',$data,'Resim2');
        $all['Resim3'] = imageUpload::singleUploadUpdate(rand(1,900),'resim','Resim3',$data,'Resim3');
        $all['Resim4'] = imageUpload::singleUploadUpdate(rand(1,900),'resim','Resim4',$data,'Resim4');
        $all['Resim5'] = imageUpload::singleUploadUpdate(rand(1,900),'resim','Resim5',$data,'Resim5');
        $update = Resim::where('ResimID','=',$id)->update($all);
    }
    public function delete($id){
        $w = Resim::where('ResimID','=',$id)->get();
        File::delete('public/'.$w[0]['Resim1']);
        File::delete('public/'.$w[0]['Resim2']);
        File::delete('public/'.$w[0]['Resim3']);
        File::delete('public/'.$w[0]['Resim4']);
        File::delete('public/'.$w[0]['Resim5']);
        Resim::where('ResimID','=',$id)->delete();
        return redirect()->back();
    }
}
