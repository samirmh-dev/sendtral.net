<?php
/**
 * Created by PhpStorm.
 * User: Samir
 * Date: 04.02.2019
 * Time: 10:04
 */

Route::domain('{tenant}.'.config('custom.TENANT_DOMAIN'))->group(function () {

    //->where('tenant', '^((?!sendtral).)*$')
    Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice')->middleware('authTenant');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify')->middleware('authTenant');
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend')->middleware('authTenant');

    Route::prefix('dashboard')->middleware(['verified','authTenant'])->group(function(){
       Route::view('/','dashboard.index')->name('dashboard');
    });
});
