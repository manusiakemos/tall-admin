<?php

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

/*
| uncomment line below if you use next or nuxt frontend
| auth with laravel breeze cookie based auth
 */

//require __DIR__ . '/auth-spa.php';

require __DIR__ . '/auth.php';

require __DIR__ . '/crud.php';

Route::view('/privacy', 'privacy')->name('privacy');

Route::middleware(['auth', 'role:admin|super-admin'])->group(function () {
    Route::get('/home', App\Http\Livewire\Admin\Home::class)->name('home');
    Route::get('/profile', App\Http\Livewire\Admin\ProfilePage::class)->name('profile');
});

Route::middleware(['auth', 'role:super-admin'])->group(function () {

    Route::get('/user', App\Http\Livewire\User\UserPage::class)->name('user');
    Route::get('/user/form/{user_id?}', App\Http\Livewire\User\UserForm::class)->name('user.form');

    Route::get("/setting", App\Http\Livewire\Setting\SettingPage::class)->name("setting");

    Route::get("/slider", App\Http\Livewire\Slider\SliderPage::class)->name("slider");
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth', 'role:admin|super-admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/', function () {
    return view('welcome');
});
