<?php

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



Auth::routes();

Route::post('/doRegister','Auth\RegisterController@register');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/search_result','HomeController@searchResult');
Route::get('/detail/{id}', 'HomeController@detailPost');
Route::get('/myPost/{id}', 'PostController@myPost')->middleware('check-login');;

Route::get('/addPost', 'PostController@categoryPost')->middleware('check-login');;
Route::post('/doAddPost', 'PostController@doAddPost')->middleware('check-login');;

Route::get('/followedPost/{id}', 'PostController@followedPost')->middleware('check-login');;
Route::post('/addComment', 'PostController@addComment')->middleware('check-login');;
Route::get('/deletePost/{id}', 'PostController@deletePost')->middleware('check-login');;



Route::get('/cart', 'PostController@getCart')->middleware('check-login');;
Route::get('/addToCart/{id}','PostController@addToCart')->middleware('check-login');;
Route::get('/removeFromCart/{id}','PostController@removeFromCart')->middleware('check-login');;
Route::get('/checkOut/{id}','TransactionController@checkOut')->middleware('check-login');;


Route::post('/doUpdate','ProfileController@updateProfile')->middleware('check-login');;
Route::get('/profile','ProfileController@show')->middleware('check-login');
Route::get('/categories/{id}','ProfileController@followedCategory')->middleware('check-login');
Route::get('/doFollow/{category_id}/{user_id}','ProfileController@followUnfollow')->middleware('check-login');;

Route::get('/myTransaction/{id}','TransactionController@myTransaction')->middleware('check-login');;
Route::get('/allTransaction','TransactionController@allTransaction')->middleware('check-login');;



Route::get('/manage_user','AdminController@show')->middleware('check-role');
Route::get('/manage_category','AdminController@showCategory')->middleware('check-role');
Route::get('/updateCategory/{id}','AdminController@updateCategory')->middleware('check-role');;
Route::post('/doUpdateCategory','AdminController@doUpdateCategory')->middleware('check-role');;
Route::get('/doDeleteCategory/{id}','AdminController@doDeleteCategory')->middleware('check-role');;
Route::get('/addCategory',function (){
    return view('addCategory');
})->middleware('check-role');;
Route::post('/doAddCategory','AdminController@doAddCategory')->middleware('check-role');;

Route::get('/editProfile/{id}','AdminController@editProfile')->middleware('check-role');
Route::post('/doEdit','AdminController@saveEdit')->middleware('check-role');;
Route::get('/doDelete/{id}','AdminController@doDelete')->middleware('check-role');;
