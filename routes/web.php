<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Image_Controller;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/','image_uplode_section')->name('home');

Route::post('/',[Image_Controller::class,'uplode_image']);

Route::get('/view',[Image_Controller::class,'view'])->name('view');

Route::get('/edit_page/{id}',[Image_Controller::class,'edit_page'])->name('edit_page');
Route::put('/update_page{id}',[Image_Controller::class,'update'])->name('update');

Route::get('/delete{id}',[Image_Controller::class,'delete'])->name('delete');

