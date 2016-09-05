<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    // message data (event and payload)
    $data = [
        'event' => 'userMessage',
        'data' => [
            'first_name' => 'Bob',
            'last_name' => 'SUN',
        ]
    ];

    // subscriber (socket.js) <--> publisher (routes/web.php)
    Redis::publish('test-channel', json_encode($data));

//    event(new \App\Events\NewUserEvent('Bob'));
    return view('welcome');
});
