<?php
/**
 * Created by PhpStorm.
 * User: Samir
 * Date: 04.02.2019
 * Time: 10:04
 */

Route::domain('{tenant}.mrsamir.com')->group(function () {

    Route::get('/', 'Auth\LoginController@showLoginForm')->name('login')->where('tenant', '^((?!sendtral).)*$');
    Route::post('/', 'Auth\LoginController@login')->where('tenant', '^((?!sendtral).)*$');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout')->where('tenant', '^((?!sendtral).)*$');

    Route::prefix('dashboard')->middleware('authTenant')->group(function(){
       Route::view('/','dashboard.index');
    });
});
