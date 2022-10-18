<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
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


    //ログイン管理画面
    Route::get('/show/login',[LoginController::class,'showLogin'])->name('showLogin');
    //ログイン認証
    Route::post('/login',[LoginController::class,'login'])->name('login');
    Route::get('/show/first/create',[UserController::class,'showFirstCreate'])->name('showFirstCreate');
    Route::post('/first/create',[UserController::class,'firstCreate'])->name('firstCreate');

    //ログイン後
    Route::group(['middleware'=>['auth']],function(){
        //ホーム画面
        Route::get('/',[HomeController::class,'home'])->name('home');
        //ログアウト
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');
        //会員登録一覧
        Route::get('/users',[UserController::class,'users'])->name('users');
        //新規会員作成
        Route::get('/show/user/{user?}',[UserController::class,'showUser'])->name('showUser');
        //会員削除
        Route::get('/show/user/delete/{user}',[UserController::class,'accountDelete'])->name('accountDelete');
        //登録処理
        Route::post('/user/edit/{user?}',[UserController::class,'editUser'])->name('editUser');
        //お問い合わせ一覧
        Route::get('/show/contacts',[ContactController::class,'showContacts'])->name('showContacts');
        //お問い合わせ編集画面
        Route::get('/show/contact/edit/{contact}',[ContactController::class,'showEditContact'])->name('showEditContact');
        //お問い合わせ削除
        Route::get('/contact/delete/{contact}',[ContactController::class,'contactDelete'])->name('contactDelete');
        //お問い合わせ編集処理
        Route::post('/contact/edit/{contact}',[ContactController::class,'contactEdit'])->name('contactEdit');
    });

    //お問い合わせ
    Route::get('/contact',[ContactController::class,'form'])->name('form');
    //確認ページ
    Route::post('/contact/form/confirm',[ContactController::class,'confirm'])->name('confirm');
    //送信完了ページ
    Route::post('/contact/form/send',[ContactController::class,'send'])->name('send');