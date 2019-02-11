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

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    Route::prefix('dashboard')->middleware('authTenant')->group(function(){
       Route::view('/','dashboard.index')->name('dashboard');
    });
});
