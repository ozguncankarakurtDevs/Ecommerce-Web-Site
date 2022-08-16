<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home',[\App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::group(['namespace'=>'admin','prefix'=>'admin','as'=>'admin.'],function (){

    Route::get('/',[\App\Http\Controllers\admin\indexController::class,'index'])->name('index');
    Route::group(['namespace'=>'kategori','prefix'=>'kategori','as'=>'kategori.'],function (){
        Route::get('/',[\App\Http\Controllers\admin\kategori\indexController::class,'index'])->name('index');
        Route::get('/ekle',[\App\Http\Controllers\admin\kategori\indexController::class,'create'])->name('create');
        Route::post('/ekle',[\App\Http\Controllers\admin\kategori\indexController::class,'store'])->name('create.post');
        Route::get('/duzenle/{id}',[\App\Http\Controllers\admin\kategori\indexController::class,'edit'])->name('edit');
        Route::post('/duzenle/{id}',[\App\Http\Controllers\admin\kategori\indexController::class,'update'])->name('edit.post');
        Route::get('/sil/{id}',[\App\Http\Controllers\admin\kategori\indexController::class,'delete'])->name('delete');
    });
    Route::group(['namespace'=>'altkategori','prefix'=>'altkategori','as'=>'altkategori.'],function (){
        Route::get('/',[\App\Http\Controllers\admin\altkategori\indexController::class,'index'])->name('index');
        Route::get('/ekle',[\App\Http\Controllers\admin\altkategori\indexController::class,'create'])->name('create');
        Route::post('/ekle',[\App\Http\Controllers\admin\altkategori\indexController::class,'store'])->name('create.post');
        Route::get('/duzenle/{id}',[\App\Http\Controllers\admin\altkategori\indexController::class,'edit'])->name('edit');
        Route::post('/duzenle/{id}',[\App\Http\Controllers\admin\altkategori\indexController::class,'update'])->name('edit.post');
        Route::get('/sil/{id}',[\App\Http\Controllers\admin\altkategori\indexController::class,'delete'])->name('delete');
    });
    Route::group(['namespace'=>'urun','prefix'=>'urun','as'=>'urun.'],function (){
        Route::get('/',[\App\Http\Controllers\admin\urun\indexController::class,'index'])->name('index');
        Route::get('/ekle',[\App\Http\Controllers\admin\urun\indexController::class,'create'])->name('create');
        Route::post('/ekle',[\App\Http\Controllers\admin\urun\indexController::class,'store'])->name('create.post');
        Route::get('/duzenle/{id}',[\App\Http\Controllers\admin\urun\indexController::class,'edit'])->name('edit');
        Route::post('/duzenle/{id}',[\App\Http\Controllers\admin\urun\indexController::class,'update'])->name('edit.post');
        Route::get('/sil/{id}',[\App\Http\Controllers\admin\urun\indexController::class,'delete'])->name('delete');
    });
    Route::group(['namespace'=>'resim','prefix'=>'resim','as'=>'resim.'],function (){
        Route::get('/',[\App\Http\Controllers\admin\resim\indexController::class,'index'])->name('index');
        Route::get('/ekle',[\App\Http\Controllers\admin\resim\indexController::class,'create'])->name('create');
        Route::post('/ekle',[\App\Http\Controllers\admin\resim\indexController::class,'store'])->name('create.post');
        Route::get('/duzenle/{id}',[\App\Http\Controllers\admin\resim\indexController::class,'edit'])->name('edit');
        Route::post('/duzenle/{id}',[\App\Http\Controllers\admin\resim\indexController::class,'update'])->name('edit.post');
        Route::get('/sil/{id}',[\App\Http\Controllers\admin\resim\indexController::class,'delete'])->name('delete');
    });

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
