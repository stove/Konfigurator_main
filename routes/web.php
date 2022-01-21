<?php

    use App\Http\Controllers\HomeController;
    use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::post('/send-mail', [\App\Http\Controllers\OrderMailController::class, 'mailSend',]);

   /* Route::get('send-mail', function () {

        $details = [
            'title' => 'Email från Konstruktor',
            'body' => 'Test att skicka order med smtp'
        ];

        \Mail::to('bjorn.stove@gmail.com')->send(new \App\Mail\OrderMail($details));

        dd("Email is Sent.");
    });*/

    Route::get('/', function () {
        return view('welcome');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('home', [HomeController::class, 'index']);
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');


});
require __DIR__.'/auth.php';
