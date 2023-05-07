<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

// Route::get('/',function(){
//     return view('articles.index');
// });

Route::get('/', [ArticlesController::class, 'index'])->name('home');
Route::get('/softland/blog-post', [ArticlesController::class, 'blog_post'])->name('blog-post');
Route::post('/softland/authentification', [ArticlesController::class, 'authent'])->name('auth');

Route::post('/upload_image', function(Request $request) {
    $path = $request->file('imageC')->store('public/images');
    $url = Storage::url($path);
    echo $url;
    return response()->json(['url' => $url]);
});

Route::post('/softland', [ArticlesController::class, 'store'])->name('articles.store');
Route::get('/softland/create', [ArticlesController::class, 'create'])->name('create');
Route::get('/softland/{url}/{article}', [ArticlesController::class, 'show'])->name('show');
Route::get('/softland/{article}', [ArticlesController::class, 'edit'])->name('edit');
Route::put('/softland/{article}', [ArticlesController::class, 'update'])->name('update');
Route::delete('/softland/{article}', [ArticlesController::class, 'destroy'])->name('delete');
