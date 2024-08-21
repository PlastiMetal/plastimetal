<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contactanos', function () {
    return view('contactanos');
})->name('contactanos');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::resource('almacen/categoria', \App\Http\Controllers\CategoriaController::class);
Route::resource('almacen/producto', \App\Http\Controllers\ProductoController::class);
Route::resource('ventas/clientes', \App\Http\Controllers\ClienteController::class);
Route::resource('compras/proveedores', \App\Http\Controllers\ProveedorController::class);
Route::resource('compras/ingresos', \App\Http\Controllers\IngresoController::class);
Route::resource('ventas/ventas', \App\Http\Controllers\VentaController::class);
Route::get('/reportes/ventas-diarias', [\App\Http\Controllers\VentaController::class, 'reporteVentas'])->name('reportes.ventas_diarias');
Route::get('reportes/productos-vendidos', [\App\Http\Controllers\VentaController::class, 'reportePorProducto'])->name('reportes.productos_vendidos');
Route::get('reportes/ventas-por-cliente', [\App\Http\Controllers\VentaController::class, 'reportePorCliente'])->name('reportes.ventas_por_cliente');
Route::get('reportes/facturas-por-cliente', [\App\Http\Controllers\VentaController::class, 'reporteFacturasPorCliente'])->name('reportes.facturas_por_cliente');
Route::get('reportes/facturas-por-producto', [\App\Http\Controllers\VentaController::class, 'reporteFacturasPorProducto'])->name('reportes.facturas_por_producto');




Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);


Route::resource('auth/password', \App\Http\Controllers\Auth\LoginController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('seguridad/usuarios', \App\Http\Controllers\UsuarioController::class);
Route::resource('seguridad/roles', \App\Http\Controllers\RoleController::class)->names('roles');
Route::resource('seguridad/permisos', \App\Http\Controllers\PermisoController::class)->names('permisos');;
Route::resource('seguridad/listuser', \App\Http\Controllers\AsignarController::class)->names('asignar');;
