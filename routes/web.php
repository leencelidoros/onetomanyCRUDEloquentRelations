<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});
//Inserting Dataa
Route::get('/create',function (){
    $user =User::findorFail(1);
    $post=new Post(['title'=>'PHP laravellllll is interesting','body'=>'i enjoy coding in laravel']);
     $user->posts()->save($post);

});
Route::get('/read',function (){
    $user= User::findorFail(1);

    //dd($user->posts);
    foreach($user->posts as $post)
    {
        echo $user->posts->title;
    }
});
//Updating
Route::get('/update',function (){
    $user=User::find(1);
    //$user->posts()->whereId(1)->update(['title'=>'i love laravel','body'=>'i like this thank yo coding faculty']);
    $user->posts()->where('id',2)->update(['title'=>'i love laravel','body'=>'i like this thank yo coding faculty']);
});
//Deleting
Route::get('/delete',function (){
    $user=User::find(1);
    $user->posts()->whereId(1)->delete();
});
