<?php
/**
 * Created by PhpStorm.
 * User: Samir
 * Date: 04.02.2019
 * Time: 10:04
 */

Route::domain('{tenant}.'.config('custom.TENANT_DOMAIN'))->attribute('where',['tenant'=>'^((?!www).)*$'])->group(function () {

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

    Route::prefix('dashboard')->middleware(['authTenant','verified'])->group(function(){
       Route::view('/','dashboard.index')->name('dashboard');
       Route::view('access-logs','dashboard.security.access-logs')->name('access-logs');

        Route::resource('roles','RoleController',['except'=>['edit','show','create']]);
        Route::resource('permissions','PermissionController',['except'=>['edit','show','create']]);
        Route::resource('users','UsersController',['except'=>['edit','show','create']]);
    });
});
