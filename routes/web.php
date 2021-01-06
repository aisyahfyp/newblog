<?php

use Illuminate\Support\Facades\Route;
//use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

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

// Route::get('/', function() {
//     return response()->json([
//      'stuff' => phpinfo()
//     ]);
//  })
// Route::auth();
// Route::get('/', function () {
//     return view('welcome');
// });

//first view
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::post('/','Auth\LoginController@login');

// //after login
// Route::post('/','PagesController@index');


// //after logout
// Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

////LOGIN/////
Auth::routes();
// Route::get('/','HomeController@index')->name('home');
// Route::get('/dashboard','HomeController@checklogin')->name('dashboard');



Route::get('/', array('uses' => 'Auth\LoginController@showLogin'))->name('home');
Route::post('/login', array('uses' => 'Auth\LoginController@checklogin'));
Route::get('/login/successlogin', array('uses' => 'Auth\LoginController@successlogin'));
Route::get('/logout', array('uses' => 'Auth\LoginController@logout'));

// route to process the form
// Route::post('/login', array('uses' => 'Auth\LoginController@doLogin'));

// Route::get('/logout', array('uses' => 'Auth\LoginController@doLogout'));
Route::group(['middleware' => 'preventBackHistory'], function()
{
    //  Route::get('dashboard', 'DashboardController@dashboard');
    //  Route::get('/dashboard', 'ChartController@testChart')->name('dashboard');
     Route::get('/dashboard', 'ChartController@testChart')->name('dashboard');
});


//Route::get('/chart', 'ChartController@testChart');


// Route::get('chart', function () {
//     $chart = (new LarapexChart)->setTitle('Users')->setXAxis(['Active', 'Guests'])->setDataset([100, 200]);
//     return view('sample', compact('chart'));
// }); 
    // $chart = new LarapexChart();
    // $chart->setTitle('Users')->setXAxis(['Active', 'Guests'])->setDataset([100, 200]);
    // return view('dashboard', compact('chart'));



// Route::get('/revenue', function () {
//     return view('revenue');
// });

Route::get('/inventory', 'InventoryController@showInventory');
Route::get('/inventory/pdf', 'InventoryController@createPDFInv');

Route::get('/expenses', 'SalesRevController@showExpenses');
Route::get('/expenses/pdf', 'SalesRevController@createPDFExpenses');

Route::get('/sales', 'SalesRevController@showSales');
Route::get('/sales/pdf', 'SalesRevController@createPDFSales');


////////EXPENSES BY MONTH/////////
Route::get('/expmonth', 'SalesRevController@showExpByMonth');
Route::get('/exp-jan', 'SalesRevController@showJanExpenses');
Route::get('/exp-feb', 'SalesRevController@showFebExpenses');
Route::get('/exp-mar', 'SalesRevController@showMarExpenses');
Route::get('/exp-apr', 'SalesRevController@showAprExpenses');
Route::get('/exp-may', 'SalesRevController@showMayExpenses');
Route::get('/exp-june', 'SalesRevController@showJuneExpenses');
Route::get('/exp-july', 'SalesRevController@showJulyExpenses');
Route::get('/exp-aug', 'SalesRevController@showAugExpenses');
Route::get('/exp-sept', 'SalesRevController@showSeptExpenses');
Route::get('/exp-oct', 'SalesRevController@showOctExpenses');
Route::get('/exp-nov', 'SalesRevController@showNovExpenses');
Route::get('/exp-dec', 'SalesRevController@showDecExpenses');

/////////SALES BY MONTH/////////
Route::get('/salmonth', 'SalesRevController@showSalByMonth');
Route::get('/sales-jan', 'SalesRevController@showJanSales');
Route::get('/sales-feb', 'SalesRevController@showFebSales');
Route::get('/sales-mar', 'SalesRevController@showMarSales');
Route::get('/sales-apr', 'SalesRevController@showAprSales');
Route::get('/sales-may', 'SalesRevController@showMaySales');
Route::get('/sales-june', 'SalesRevController@showJuneSales');
Route::get('/sales-july', 'SalesRevController@showJulySales');
Route::get('/sales-aug', 'SalesRevController@showAugSales');
Route::get('/sales-sept', 'SalesRevController@showSeptSales');
Route::get('/sales-oct', 'SalesRevController@showOctSales');
Route::get('/sales-nov', 'SalesRevController@showNovSales');
Route::get('/sales-dec', 'SalesRevController@showDecSales');

///////////////PDF EXPENSES///////////////

Route::get('/expdf1', 'SalesRevController@expJanPdf');
Route::get('/expdf2', 'SalesRevController@expFebPdf');
Route::get('/expdf3', 'SalesRevController@expMarPdf');
Route::get('/expdf4', 'SalesRevController@expAprPdf');
Route::get('/expdf5', 'SalesRevController@expMayPdf');
Route::get('/expdf6', 'SalesRevController@expJunePdf');
Route::get('/expdf7', 'SalesRevController@expJulyPdf');
Route::get('/expdf8', 'SalesRevController@expAugPdf');
Route::get('/expdf9', 'SalesRevController@expSeptPdf');
Route::get('/expdf10', 'SalesRevController@expOctPdf');
Route::get('/expdf11', 'SalesRevController@expNovPdf');
Route::get('/expdf12', 'SalesRevController@expDecPdf');

/////////////////PDF SALES////////////////////////

Route::get('/salpdf1', 'SalesRevController@salJanPdf');
Route::get('/salpdf2', 'SalesRevController@salFebPdf');
Route::get('/salpdf3', 'SalesRevController@salMarPdf');
Route::get('/salpdf4', 'SalesRevController@salAprPdf');
Route::get('/salpdf5', 'SalesRevController@salMayPdf');
Route::get('/salpdf6', 'SalesRevController@salJunePdf');
Route::get('/salpdf7', 'SalesRevController@salJulyPdf');
Route::get('/salpdf8', 'SalesRevController@salAugPdf');
Route::get('/salpdf9', 'SalesRevController@salSeptPdf');
Route::get('/salpdf10', 'SalesRevController@salOctPdf');
Route::get('/salpdf11', 'SalesRevController@salNovPdf');
Route::get('/salpdf12', 'SalesRevController@salDecPdf');




////////TESTING///////////
Route::get('/test1', 'InventoryController@showMonthInventory');


Route::get('/expmonth-add', 'PagesController@addCategory');
Route::post('/expmonth/save', 'PagesController@addExp')->name('exp.add');

Route::get('/salmonth-add', 'PagesController@showAddSales');
Route::post('/salmonth/save', 'PagesController@addSales')->name('sal.add');


// Route::get('/', 'EmployeeController@showEmployees');


// Route::get('/inventory', function () {
//     return view('inventory');
// });

// Route::view('/dashboard', 'dashboard');
// Route::get('/dashboard', 'PagesController@welcome');
// Route::view('login', 'login');
// Route::post('login', 'LoginController@login');
// Route::group(['middleware' => ['authenticate', 'roles']], function (){
//     Route::get('/dashboard', 'PagesController@dashboard')->name('dashboard');
// });

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/test', function(){
//     Artisan::call('migrate');
//     Artisan::call('db:seed');
// });

?>