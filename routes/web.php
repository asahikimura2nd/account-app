<?php

use App\Http\Controllers\UserController;
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


/**
 * @param App\Http\Kernel
 */
//ログイン前 guest
Route::group(['middleware'=>['guest']],function(){
    //ログイン管理画面
    Route::get('/',[UserController::class,'showLogin'])->name('showLogin');
    //ログイン認証
    Route::post('/login',[UserController::class,'login'])->name('login');
    //管理者登録画面
    Route::get('/show/register',[UserController::class,'showRegister'])->name('showRegister');
    //管理者認証
    Route::post('/register',[UserController::class,'register'])->name('register');
/**
 * 
 * 
 * お問い合わせ側（user）
 */
    //お問い合わせ
    Route::get('/contact',[UserController::class,'form'])->name('form');
    //確認ページ
    Route::post('/contact/form/confirm',[UserController::class,'confirm'])->name('confirm');
    //送信完了ページ
    Route::get('/contact/form/send',[UserController::class,'send'])->name('send');
});



//ログイン後 auth karnel.php参照
Route::group(['middleware'=>['auth']],function(){
    //ホーム画面
    Route::get('/home',[UserController::class,'home'])->name('home');
    //ログアウト
    Route::post('/logout',[UserController::class,'logout'])->name('logout');
    //会員登録一覧
    Route::get('/users',[UserController::class,'users'])->name('users');
    //新規会員作成
    Route::get('/show/user',[UserController::class,'showUser'])->name('showUser');
    //登録処理
    Route::post('/user',[UserController::class,'user'])->name('user');
    //会員編集
    Route::get('/show/edit/{member_id?}',[UserController::class,'showEdit'])->name('showEdit');
     //再登録処理
     Route::post('/user/edit/{member_id}',[UserController::class,'editUser'])->name('editUser');
     //お問い合わせ一覧
     Route::get('/show/contacts',[UserController::class,'showContacts'])->name('showContacts');
    //お問い合わせ編集画面
    Route::get('/show/edit/contact/{user_random_id?}',[UserController::class,'showEditContact'])->name('showEditContact');
    });
    //編集処理
    Route::post('contact/edit',[UserController::class,'contactEdit'])->name('contactEdit');
    
