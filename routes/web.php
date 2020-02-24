<?php

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
use Stripe\Stripe;
Route::get('/', function () {
    return view('welcome');
});
Route::get('buy',function (){
   return View::make('buy');
});

Route::get('email', 'EmailController@sendEmail');

Route::post('buy',function (){
    return \Stripe\Charge::create([
        'amount' => 2000,
        'currency' => 'usd',
        'source' => request('stripeToken'),
        'description' => 'My First Test Charge (created for API docs)',
    ],['api_key' => config('stripe.secret_key')]);
});
