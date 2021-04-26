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

Route::get('/', function () {
    return view('welcome');

});
//category
//editar categoria
Route::patch('/editc/{id}','CategoryController@edit')->name('editc');
//formulario categoria para editar
Route::get('/editformc/{id}','CategoryController@editform')->name('editformc');
//eliminar categorias
Route::delete('/deletec/{id}','CategoryController@delete')->name('deletec');
//listar categorias
Route::get('/listc','CategoryController@list');
//formulario categoria
Route::get('/formc', 'CategoryController@categoryform');
//guardar categoria
Route::post('/savec', 'CategoryController@save')->name('savec');


//gender
//editar genero
Route::patch('/editg/{id}','GenderController@edit')->name('editg');
//formulario genero para editar
Route::get('/editformg/{id}','GenderController@editform')->name('editformg');
//eliminar genero
Route::delete('/deleteg/{id}','GenderController@delete')->name('deleteg');
//listar genero
Route::get('/listg','GenderController@list');
//formulario genero
Route::get('/formg', 'GenderController@genderform');
//guardar categoria
Route::post('/saveg', 'GenderController@save')->name('saveg');

//Department
//editar department
Route::patch('/editd/{id}','DepartmentController@edit')->name('editd');
//formulario department para editar
Route::get('/editformd/{id}','DepartmentController@editform')->name('editformd');
//eliminar department
Route::delete('/deleted/{id}','DepartmentController@delete')->name('deleted');
//listar department
Route::get('/listd','DepartmentController@list');
//formulario department
Route::get('/formd', 'DepartmentController@departmentform');
//guardar department
Route::post('/saved', 'DepartmentController@save')->name('saved');

//Customer
//editar department
Route::patch('/editcu/{id}','CustomerController@edit')->name('editcu');
//formulario department para editar
Route::get('/editformcu/{id}','CustomerController@editform')->name('editformcu');
//eliminar department
Route::delete('/deletecu/{id}','CustomerController@delete')->name('deletecu');
//listar department
Route::get('/listcu','CustomerController@list');
//formulario department
Route::get('/formcu', 'CustomerController@customerform');
//guardar department
Route::post('/savecu', 'CustomerController@save')->name('savecu');



