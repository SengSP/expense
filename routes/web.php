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
  return view('login');
});

// login
Route::post('/loginsystem', 'LoginController@fnLoginSystem')->name('loginsystem');
// logout
Route::get('/logout', 'LoginController@fnLogout')->name('logout');
// block
Route::get('/reportblock', 'LoginController@fnReportBlock')->name('reportblock');

////////////////////////////////// ADD USER ///////////////////////////////
// add user page
Route::get('/adduser', 'UserController@fnAddUser')->name('adduser');
// add new user
Route::post('/addnewuser', 'UserController@fnAddnewUser')->name('addnewuser');

///////////////////////////////// USER LIST ////////////////////////////////
// user list page
Route::get('/userlist', 'UserController@fnUserlist')->name('userlist');
// change profile image
Route::post('/changeprofile', 'UserController@fnChangeProfile')->name('changeprofile');
// change user status
Route::post('/changeuserstatus', 'UserController@fnChangestatus')->name('changeuserstatus');
// change user pass
Route::post('/changeUserpass', 'UserController@fnChangepass')->name('changeUserpass');
// select role and pms
Route::post('/selectrolepms', 'UserController@fnSelectrolepms');
// update role and pms
Route::post('/updaterolepms', 'UserController@fnUpdateRolepms')->name('updaterolepms');
// delete user, role and pms
Route::post('/deleteuser', 'UserController@fnDeleteUser')->name('deleteuser');
// get user data
Route::post('/loaduserdata', 'UserController@fnloadUserdata')->name('loaduserdata');
// update user data
Route::post('/updateuserdata', 'UserController@fnUpdateuserdata')->name('updateuserdata');
// update account data by user
Route::post('/updateaccount', 'UserController@fnUpdateAccount')->name('updateaccount');
// update account password by user
Route::post('/changeaccountpass', 'UserController@fnChangeAcpass')->name('changeaccountpass');

///////////////////////////////////// Buying page ///////////////////////////////////////
// buying page
Route::get('/buying', 'ExpenseController@index')->name('buying');
// insert new expense
Route::post('/insertexpense', 'ExpenseController@fnInsertExpense')->name('insertexpense');
// search expense 
Route::post('/loadSearchex', 'ExpenseController@fnLoadSearchex');
// get expense data to update
Route::post('/getexpensedata', 'ExpenseController@fnGetexpensedata');
// update expense data
Route::post('/updatethisdata', 'ExpenseController@fnUpdatexpense')->name('updatethisdata');
// delete expense data
Route::post('/deletedataexp', 'ExpenseController@fnDeletedataexp')->name('deletedataexp');

//////////////////////////////////////////// Dashboard data ////////////////////////////////
// dash board page
Route::get('/dashboard', 'DbController@index')->name('dashboard');
// load expense of every month
Route::post('/loadexpensechart', 'DbController@fnLoadexpensechart');
// show list expense of this week
Route::get('/expthisweek', 'DbController@fnExpthisweek')->name('expthisweek');
// show list expense of this month
Route::get('/expmonth', 'DbController@fnExpenseMonth')->name('expmonth');