<?php

use Stripe\Stripe;
use Illuminate\Support\Facades\Cache;

Route::get('/', function () {
    if(Cache::has("welcome")){
        return Cache::get("welcome");
    }
    return view('welcome');
})->middleware('cache.welcome');

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
