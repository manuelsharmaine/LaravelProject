<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
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

//for demo purposes


Route::get('/intro', function() {
    return 'Hello World';
}); 


// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create']);
Route::post('/users', [App\Http\Controllers\UserController::class, 'store']);
Route::resource('/posts', App\Http\Controllers\PostController::class);
Route::get('/', [App\Http\Controllers\PageController::class, 'index']);
Route::get('/about', [App\Http\Controllers\PageController::class, 'about']);
Route::get('/check-request', [App\Http\Controllers\PageController::class, 'checkRequest']);
Route::get('/contact-us', [App\Http\Controllers\PageController::class, 'contactUs']);
Route::post('/contacts', [App\Http\Controllers\PageController::class, 'submitContact']);














// Route::redirect('/contact-us', '/');

// //uri, filename, data
// Route::view('/index','welcome', ['name' => 'John Doe']);


// //route params
// Route::get('/user/{id}', function($id){
//     return 'User Id: '.$id;
// });


// Route::get('/post/{post}/comments/{comment}', function($postID, $commentID){
//     return 'PostID: '.$postID. ' - Comment ID: '.$commentID;
// });


// //route params + DI
// Route::get('/user/{id}', function(Request $request, $id){
//     return 'User: '.$id. 'Request: ' .$request;
// });

// //optional params route + pattern
// Route::get('/username/{name?}', function($name = ''){
//     return $name;
// })->where('name', '[a-z]+');


// Route::get('/user/profile', function(){
//         return 'profile';
// })->name('profile');



// Route::prefix('/admin')->group(function(){
//     Route::get('/dashboard',function(){
//         return 'dashboard';
//     }); 
//     Route::get('/reports',function(){
//         return 'reports';
//     }); 
//     Route::get('/user-management',function(){
//         return 'user-manamgent';
//     }); 
// });


// Route::get('/users/{user}', function(User $user){
//     return $user;
// });

// //404
// Route::fallback(function(){
//     return 'No Page available';
// });
