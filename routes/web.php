<?php

use Illuminate\Support\Facades\Route;
//use App\Models\Image;

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
    /*$images = Image::all();
    foreach ($images as $image) {
        echo $image->image_path."<br>";
        echo $image->description."<br>";
        echo $image->user->name.' '.$image->user->surname."<br><br>";
        
        if (count($image->comments) >= 1) {
            echo '<strong>Comentarios</strong><br>';
            foreach ($image->comments as $comment) {
                echo "<strong>".$comment->user->name.' '.$comment->user->surname.':</strong> '.$comment->content."<br>";
            }
        }

        echo "Likes: ".count($image->likes);
        echo "<hr>";
    }
    die();*/
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/configuracion', [App\Http\Controllers\UserController::class, 'config'])->name('config');

// ============================== Routes hidden ==============================
//User Controller
Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/user/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImage'])->name('user.avatar');
