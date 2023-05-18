<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-jobs', function (){
    \App\Jobs\TestJobs::dispatch();
});


Route::get('send-batch', function (){
    \Illuminate\Support\Facades\Bus::batch([
        new \App\Jobs\OneJob(),
        new \App\Jobs\SecondJob(),
        new \App\Jobs\BatchJob()
    ])
        ->name('Run Batch Example '. rand(1,100))
        ->dispatch();

    return redirect('/');
});
