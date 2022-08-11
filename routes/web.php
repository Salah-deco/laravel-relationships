<?php

use App\Models\Address;
use App\Models\Post;
use App\Models\Tag;
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


Route::get('/users', function () {
    // $users = User::all();
    // $users = User::has('posts')->with('posts')->get(); // has posts for users has at least one post
    $users = User::has('posts', '>=', 2)->with('posts')->get(); // has posts for users has more than two posts
    return view('users.posts', ['users' => $users]);
});

Route::get('/posts', function () {
    $posts = Post::with(['tags', 'user'])->get();
    return view('posts.index', ['posts' => $posts]);
}
);

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

Route::get('/post', function () {
    $post = Post::first();

    // attach tag with additional pivot column data.
    $post->tags()->attach(6, ['status' => 'active']);
    return $post;
});

Route::get('/tags', function () {
    $tags = Tag::with('posts')->get();
    return $tags;
});