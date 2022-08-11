<?php

use App\Models\Address;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user', function () {

     $user1 = User::factory()->create();
    // $user1->address()->create([
    //     'country' => 'Moscou',     
    // ]);

    // Address::create([
    //     'country' => 'Moscou',
    //     'uid' => $user1->id,
    // ]);

    $users = User::all();
    $addresses = array();
    foreach ($users as $user) {
        $addresses[$user->name] = $user->address;
    }

    return $addresses;
});

Route::get('/addresses', function () {

    // another way to associate owner with her address
    // $cuba = new Address([
    //     'country' => 'Cuba',
        
    // ]);

    // $john = User::create([
    //     'name' => 'John',
    //     'email' => 'john@gmail.com',
    //     'password' => '12345678',
    // ]);

    // $cuba->owner()->associate($john);
    // $cuba->save();

    // SELECT * FROM addresses
    // $addresses = Address::all();
    // $users = array();
    // foreach($addresses as $address) {
    //     // SELECT * FROM users WHERE users.user_id = $address->uid
    //     $users[$address->country] = $address->owner;
    // }
    // return view('addresses.index', ['users' => $users]);
    //! first method use n Queries (one for get addresses and n for users)
        
        
    //? This methos with owner get only two queries
    // SELECT * FROM addresses
    // select * from `users` where `users`.`user_id` in (1, 2, 3, 4)
    $addresses = Address::with('owner')->get();
    return view('addresses.address_owner',[ 'addresses' => $addresses]);
});