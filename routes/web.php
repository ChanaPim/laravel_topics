<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/topicform', function () {
    return view('topicform');
})->name('topicform');


Route::fallback(function(){
    return "<h1>ไม่พบหน้าเว็บ</h1>";
});


Route::get('create',[Admincontroller::class,'create']);
Route::get('/',[Admincontroller::class,'index']);
Route::get('/topiclist',[Admincontroller::class,'index']);
Route::get('/topicinfo', [Admincontroller::class, 'show']);
Route::post('/insert', [Admincontroller::class, 'insert']);

Route::get('/topic/{id}', [Admincontroller::class, 'show'])->name('show');
Route::post('/topic/{id}/comment', [Admincontroller::class, 'addComment'])->name('comment');