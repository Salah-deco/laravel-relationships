<?php

use App\Models\Address;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Hash;
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

Route::get('/projects', function () {
    // $projects = Project::with('users')->get();

    // $user = User::create([
    //     'name' => 'John',
    //     'email' => 'john.doe@gmail.com',
    //     'password' => Hash::make('12345678'),
    //     'project_id' => $projects[0]->id,
    // ]);

    // $user2 = User::find(2);
    // $user2->project()->associate($projects[1]);
    // $user2->save();
    

    // return $projects[1]->users[0]->tasks;
    //! after creating method tasks() in Project model we can use it like this:
    // return $projects[0]->task;

    //? Many to many relationship through pivot table
    $projects = Project::with('users')->get();
    // $user1 = User::find(1);
    // $user2 = User::find(2);
    // $user3 = User::find(3);

    // $projects[0]->users()->attach($user1);
    // $projects[0]->users()->attach($user2);

    // $projects[1]->users()->attach($user2);
    // $projects[1]->users()->attach($user3);

    // $projects[2]->users()->attach($user3);

    return $projects;
    // return view('projects.index', ['projects' => $projects]);
});

Route::get('/user_project', function () {
    $user = User::find(1);

    return $user->projects;
});

Route::get('/project_user', function () {
    $project = Project::find(1);
    return $project->users;
});

Route::get('/project_task', function () {
    $project = Project::find(1);

    // Task::create([
    //     'title' => 'Task 1',
    //     'user_id' => 1,
    // ]);
    // Task::create([
    //     'title' => 'Task 2',
    //     'user_id' => 1,
    // ]);
    // Task::create([
    //     'title' => 'Task 3',
    //     'user_id' => 2,
    // ]);

    return $project->task;
});

// Polymorphic one to many 
Route::get('/poly', function () {
    // $user = User::create([
    //     'name' => 'John',
    //     'email' => 'john@gmail.com',
    //     'password' => Hash::make('12345678'),
    // ]);

    // $post = Post::create([
    //     'user_id' => $user->user_id,
    //     'title' => 'Example post title',
    // ]);

    // $post->comments()->create([
    //     'user_id' => $user->user_id,
    //     'body' => 'Example comment body',
    // ]);
    // $post->comments()->create([
    //     'user_id' => 2,
    //     'body' => 'Example comment body 2',
    // ]);

    // $video = Video::create([
    //     'title' => 'Example video title',
    //     'user_id' => $user->user_id,
    // ]);
    // $video->comments()->create([
    //     'user_id' => $user->user_id,
    //     'body' => 'Example comment body',
    // ]);

    // $post = Post::find(7);
    // return $post->comments;

    // $comments = Comment::with('commentable')->get();
    // $comment = Comment::find(1);

    // return $comment->subject;

    $post = Post::find(7);
    return $post->comment;

});