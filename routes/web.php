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

Route::group(['middleware' => ['web']], function() {

    // Homepage
    Route::get('/', 'HomeController@index')->name('welcome');

    // Cart Routes
    Route::patch('/update-cart', 'CartController@update');
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::delete('/remove-from-cart', 'CartController@remove');
    Route::get('/add-to-cart/{id}', 'CartController@addToCart');

    Route::get('/favorites', 'FavoritesController@index')->name('favorites');
    Route::post('/favorites/{id}', 'FavoritesController@store')->name('favorites.store');
    Route::post('/{id}/favorites', 'FavoritesController@destroy')->name('favorites.delete');

    // Shop routes
    Route::get('/shop', 'ShopController@index')->name('shop');
    Route::get('/search', 'ShopController@search')->name('search');
    Route::get('/shop/{product}', 'ShopController@show')->name('show');
//    Route::get('/category/{category}', 'CategoryController@showCates')->name('category');
    Route::get('/category/{id}', 'CategoryController@showCategoryProducts')->name('category');

    // Pages routes (About Us page and Contact Us page)
    Route::get('/about', 'PagesController@getAbout')->name('about');
    Route::get('/contact', 'PagesController@getContact')->name('contact');

    Auth::routes();

    Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    Route::get('/user-profile', 'UserProfileController@index')->name('user-profile');
    Route::get('/{id}/user-edit-profile', 'UserProfileController@edit')->name('user-edit-profile');
    Route::patch('/{id}/user-update', ['as' => 'user.update', 'uses' => 'UserProfileController@update']);
    Route::post('/{id}/delete-profile', 'UserProfileController@destroy')->name('delete-user-profile');
    Route::post('/{id}/updateUserPassword', 'UserProfileController@updatePassword')->name('update-user-password');

// Merchant routes
    Route::prefix('merchant')->group(function () {

        Route::get('/ads', 'AdController@index')->name('ad');
        Route::get('/post-ad', 'AdController@create')->name('ad.create');
        Route::post('/post-ad', 'AdController@store')->name('ad.store');
        Route::get('/{id}/edit-ad', 'AdController@edit')->name('ad.edit');
        Route::post('/{id}/delete-ad', 'AdController@destroy')->name('ad.delete');
        Route::post('/{id}/ad-update', ['as' => 'ad.update', 'uses' => 'AdController@update']);

        Route::get('/profile', 'AdminProfileController@index')->name('profile');
        Route::get('/{id}/edit-profile', 'AdminProfileController@edit')->name('edit-profile');
        Route::patch('/{id}/admin-update', ['as' => 'admin.update', 'uses' => 'AdminProfileController@update']);
        Route::post('/{id}/delete-profile', 'AdminProfileController@destroy')->name('delete-profile');
        Route::post('/{id}/updatePassword', 'AdminProfileController@updatePassword')->name('update-admin-password');

        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/', 'MerchantController@index')->name('merchant');
        Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

        // password reset routes
        Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
        Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    });

});
