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
Route::post('finalize/login', 'AuthController@login');
Route::get('reset', 'AuthController@resetForm');
Route::post('finalize/reset', 'AuthController@reset');

Route::get('lazy', function(){
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
Route::get('activities/ajax/list/next/{from_time}', 'ActivityController@nextAjaxList')->where('from_time', '[0-9]+');
Route::get('activities/ajax/list/few', 'ActivityController@ajaxListFew');
Route::post('search/activities', 'ActivityController@search');

Route::get('dialogs/wallet/topup', 'WalletController@topUpForm');
Route::get('wallet/transactions/list', 'WalletController@listView');
Route::get('wallet/transactions/ajax/list', 'WalletController@ajaxList');
Route::get('wallet/transactions/ajax/list/next/{from_time}', 'WalletController@nextAjaxList')->where('from_time', '[0-9]+');
Route::post('search/wallet/transactions', 'WalletController@search');
Route::post('finalize/topup/wallet', 'WalletController@topUp');

Route::get('card/list', 'CardController@listView');
Route::get('card/ajax/list', 'CardController@ajaxList');
Route::get('card/ajax/list/next/{from_time}', 'CardController@nextAjaxList')->where('from_time', '[0-9]+');
Route::get('card/ajax/list/few', 'CardController@ajaxListFew');
Route::post('search/cards', 'CardController@search'); 
Route::get('dialogs/card/fund/{ref_id}', 'CardController@fundCardForm')->where('ref_id', '[0-9]+');
Route::post('finalize/add/card', 'CardController@add');
Route::post('finalize/fund/card', 'CardController@fund');
Route::post('finalize/delete/card/{ref_id}', 'CardController@delete')->where('ref_id', '[0-9]+');


Route::get('card/transactions/list', 'CardController@transactionListView');
Route::get('card/transactions/ajax/list', 'CardController@ajaxTransactionList');
Route::get('card/transactions/ajax/list/next/{from_time}', 'CardController@nextAjaxTransactionList')->where('from_time', '[0-9]+');
Route::post('search/card/transactions', 'CardController@searchTransactions'); 



Route::get('profile', 'ProfileController@profileForms');
Route::post('finalize/update/profile/info', 'ProfileController@updateInfo');
Route::post('finalize/update/profile/password', 'ProfileController@updatePassword');
Route::post('finalize/update/profile/photo', 'ProfileController@updatePhoto');

Route::get('logout', 'AuthController@logoutForm');
Route::post('finalize/logout', 'AuthController@logout');



});