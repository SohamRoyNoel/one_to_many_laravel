<?php


use App\Post;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function (){
    $user = User::find(1);

    $post = new Post(['title'=>'Post4', 'body'=>'Post1 has little body4']);

    $user->posts()->save($post);

});

Route::get('/read', function(){
   $user = User::find(1);

    // dd($user); // returns COLLECTION instade of OBJECT

    // return $user->posts; // returns OBJECT

    foreach ($user->posts as $p){
        echo $p->title . "<br>";
    }
});

Route::get('/update', function (){
   $user = User::find(1);

   $user->posts()->where('id',1)->update(['title'=>'POSTER', 'body'=>'POSTER_2']);
});

Route::get('/delete', function (){
    $user = User::find(1);

    $user->posts()->where('id',2)->delete();
});

Route::get('/delete_multiple', function (){
    $user = User::find(1);

    $user->posts()->whereid([1,3])->delete();
});