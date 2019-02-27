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

Route::redirect('/', 'home', 301);
Route::redirect('index', 'home', 301);
Route::get('home','IndexController@home');
Route::get('about', 'IndexController@about');
Route::get('contact', 'IndexController@contactForm');
Route::post('finalize/contact', 'IndexController@contact');
Route::get('register', 'AuthController@registerForm');
Route::post('finalize/register', 'AuthController@register');
Route::get('login', 'AuthController@loginForm');
Route::get('finalize/login', 'AuthController@login');
Route::get('functions', function(){
$f = ['dashboard','miniStats','profileForms','updateInfo','updatePassword','updatePhoto'];
foreach($f as $fc):
echo "public function $fc".'(){';
echo str_repeat('<br>',4);
echo '}';
echo str_repeat('<br>',2);
endforeach;

});



Route::group(['prefix' => 'admin'], function () {//, 'middleware' => 'web.auth'

    Route::options('{any?}', function () {
        return response('', 200);
    })->where('any', '.*');


Route::get('dashboard', 'ProfileController@dashboard');
Route::get('stats', 'ProfileController@ajaxMiniStats');

Route::get('activities/list', 'ActivityController@listView');
Route::get('activities/ajax/list', 'ActivityController@ajaxList');
Route::post('search/activities', 'ActivityController@search');

Route::get('dialogs/wallet/topup', 'WalletController@topUpForm');
Route::get('wallet/transactions/list', 'WalletController@listView');
Route::get('wallet/transactions/ajax/list', 'WalletController@ajaxList');
Route::post('search/wallet/transactions', 'WalletController@search');
Route::post('finalize/wallet/topup', 'WalletController@topUp');

Route::get('card/list', 'CardController@listView');
Route::get('card/ajax/list', 'CardController@ajaxList');
Route::get('card/transactions/list', 'CardController@transactionListView');
Route::get('card/transactions/ajax/list', 'CardController@ajaxTransactionList');
Route::post('search/card/transactions', 'CardController@search'); 
Route::post('finalize/card/fund', 'CardController@fund');

Route::get('profile', 'ProfileController@profileForms');
Route::post('finalize/update/profile/info', 'ProfileController@updateInfo');
Route::post('finalize/update/profile/password', 'ProfileController@updatePassword');
Route::post('finalize/update/profile/photo', 'ProfileController@updatePhoto');

Route::get('logout', 'AuthController@logoutForm');
Route::post('finalize/logout', 'AuthController@logout');



});