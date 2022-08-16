@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @if(session('status'))
                        <div class="alert alert-primary" role="alert">
                            {{session('status')}}
                        </div>
                    @endif


                    <div class="card mt-1 mr-1">
                        <div class="card-header" style="background-color: purple; color: white;">
                            <h4 class="title" style="color: white; opacity: 0.8;">Resim Düzenle</h4>
                            <p class="category">{{$urun[0]['UrunAdi']}}</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action="{{route('admin.resim.edit.post',['id'=> $data[0]['ResimID']])}}" method="POST">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="urunLabel" name="UrunID">
                                                @foreach($urun as $key => $value)
                                                    <option value="{{$value['UrunID']}}">{{$value['UrunAdi']}}</option>

                                                @endforeach
                                            </select>
                                            <label for="urunLabel">Ürün Seç</label>
                                            <span class="metarial-input"></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            @if($data[0]['Resim1']!="")
                                                <img class="mt-2" src="{{asset($data[0]['Resim1'])}}" style="width: 120px;height: 120px;">
                                            @endif
                                            <input type="file" name="Resim1" class="form-control" placeholder="Kategori" id="resim1Label" >
                                            <label for="resim1Label">Resim 1</label>
                                            <span class="metarial-input"></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            @if($data[0]['Resim2']!="")
                                                <img class="mt-2" src="{{asset($data[0]['Resim2'])}}" style="width: 120px;height: 120px;">
                                            @endif
                                            <input type="file" name="Resim2" class="form-control" placeholder="Kategori" id="resim2Label" >
                                            <label for="resim2Label">Resim 2</label>
                                            <span class="metarial-input"></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            @if($data[0]['Resim3']!="")
                                                <img class="mt-2" src="{{asset($data[0]['Resim3'])}}" style="width: 120px;height: 120px;">
                                            @endif
                                            <input type="file" name="Resim3" class="form-control" placeholder="Kategori" id="resim3Label" >
                                            <label for="resim3Label">Resim 3</label>
                                            <span class="metarial-input"></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            @if($data[0]['Resim4']!="")
                                                <img class="mt-2" src="{{asset($data[0]['Resim4'])}}" style="width: 120px;height: 120px;">
                                            @endif
                                            <input type="file" name="Resim4" class="form-control" placeholder="Kategori" id="resim4Label" >
                                            <label for="resim4Label">Resim 4</label>
                                            <span class="metarial-input"></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            @if($data[0]['Resim5']!="")
                                                <img class="mt-2" src="{{asset($data[0]['Resim5'])}}" style="width: 120px;height: 120px;">
                                            @endif
                                            <input type="file" name="Resim5" class="form-control" placeholder="Kategori" id="resim5Label" >
                                            <label for="resim5Label">Resim 5</label>
                                            <span class="metarial-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Resim Düzenle</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
