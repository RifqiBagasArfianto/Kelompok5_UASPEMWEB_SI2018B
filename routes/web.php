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
|-----------[PAGE UTAMA]-----------|
|------------[FRONTEND]------------| */
Route::get('/', 'Home@index');
Route::get('/login', 'Home@login');
Route::get('/logout', 'Home@logout');
Route::get('/signup', 'Home@signup');
Route::get('/browse', 'Home@browse');
Route::get('/vendor/signup', 'Home@vendor_signup');
/*------------[BACKEND]------------| */
Route::post('/browse', 'Home@browse');
Route::post('/backend/login', 'Home@logincore');
Route::post('/backend/register', 'Home@usersignup');
Route::post('/backend/vendor/register', 'Home@vendorsignup');
Route::get('/vendor/confirm/{pass}', 'Home@vendor_confirm');
/*---------[END PAGE UTAMA]--------| */
/*
|----------[PAGE SERVICES]---------|
|------------[FRONTEND]------------| */
Route::get('/services/details/{id}', 'Services@details');
Route::get('/services/book/{id}', 'Services@book');
Route::get('/services/success', 'Services@success');
/*------------[BACKEND]------------| */
Route::post('/services/list', 'Services@list');
Route::get('/user/profile', 'User@profile');
Route::get('/user/invoice', 'User@invoice');
Route::get('/user/service', 'User@service');
Route::get('/user/service/add', 'User@add_service');
Route::get('/user/service/edit/{id}', 'User@edit_service');

Route::get('/user/service/delete/{id}', 'User@delete_service');
Route::post('/user/service/insert', 'Services@add');
Route::post('/user/service/update', 'Services@update');
Route::post('user/services/confirm', 'User@invoice_confirm');

Route::post('/user/profile/update', 'User@update');
Route::get('/product/{id}', 'Home@product_details');
Route::get('/book/{id}', 'User@book');
Route::get('/success', 'User@success');
/*------------[BACKEND]------------| */

Route::get('/administrator', 'Admin@index');
Route::get('/administrator/login', 'Home@admin_login');
Route::post('/administrator/login/auth', 'Home@admin_auth');


Route::get('/administrator/user', 'Admin@user');
Route::get('/administrator/user/delete/{id}', 'Admin@delete_user');
Route::post('/administrator/user/edit', 'Admin@edit_user');
Route::post('/administrator/user/update', 'Admin@update_user');

Route::get('/administrator/order', 'Admin@order');

Route::get('/administrator/service', 'Admin@service');
Route::get('/administrator/service/delete/{id}', 'Admin@delete_service');

Route::get('/administrator/location', 'Admin@location');
Route::get('/administrator/location/delete/{id}', 'Admin@delete_location');
Route::post('/administrator/location/insert', 'Admin@insert_location');

Route::get('/administrator/bank', 'Admin@bank');
Route::post('/administrator/bank/insert', 'Admin@insert_bank');
Route::get('/administrator/bank/delete/{id}', 'Admin@delete_bank');

Route::get('/administrator/facility', 'Admin@facility');
Route::get('/administrator/facility/delete/{id}', 'Admin@delete_facility');
Route::post('/administrator/facility/insert', 'Admin@insert_facility');

Route::get('/administrator/logout', 'Admin@logout');