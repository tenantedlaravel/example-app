<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Tenanted\Core\Contracts\Tenant;
use Tenanted\Core\Support\Facades\Tenanted;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::domain('localhost')->group(function (Router $router) {
    Route::get('/', static function () {
        return view('welcome');
    });
});

Tenanted::routes('subdomain', 'primary')->group(function (Router $router) {
    $router->get('/', function (Tenant $tenant) {
        dd($tenant->toArray());
    });
});
