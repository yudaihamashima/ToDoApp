<?php

#新しいコントローラーを作ったら忘れずに！！！！！！
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\SortController;

use Illuminate\Support\Facades\DB;

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

#新しいコントローラーを作ったら一番上までスクロール！！！！

#Route::get('/create', function () {
#    return view('create');
#});

Route::get('/list', [ListController::class, 'show_task_list']);


Route::get('/create_form', function() {
    return view('create');
});

Route::get('/create', [CreateController::class, 'create_task']);

Route::get('/edit_form/{id}', [EditController::class, 'show_edit_form']);

Route::get('/edit/{id}', [EditController::class, 'edit_task']);

Route::get('/delete/{id}', [DeleteController::class, 'delete_task']);

Route::get('/sort_by_deadline', [SortController::class, 'sort_by_deadline']);

Route::get('/sort_by_deadline/{shown_tasks_deadline}', [SortController::class, 'sort_by_deadline_shown_tasks']);

Route::get('/show_until', [SortController::class, 'show_until']);



################################################################

#test code
Route::get('/list/{id}', [ListController::class, 'show_task']);

#error code
Route::get('/list/test', [ListController::class, 'show_task_test']);

#default code for 'localhost8000'
Route::get('/', function () {
    return view('welcome');
});
