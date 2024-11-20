<?php

use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\Comment;
use App\Models\Category;

//Route::get('/insert_comments', function (){
//
//    $comment = Comment::create(['the_comment'=>'This is a trial comment','post_id'=>1,'user_id'=>1]);
//});
//Route::get('/comments', function () {
//
//    $comments = Comment::all();
//    dd($comments);
//});

Route::get('/createpost', function (){
    $post = Post::create([
        'title' => 'This is post title',
        'excerpt' => 'This is  excerpt ',
        'slug' =>Str::uuid(),
        'body' => 'This is  content ',
        'user_id' => 1,
        'category_id' => Category::find(1)->id
    ]);

    $post->image()->create([
        'name'=>'random file',
        'extension'=>'jpg',
        'path'=> '/image/random_file.jpg'
    ]);
});







Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/post', function () {
    return view('post');
})->name('post');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
