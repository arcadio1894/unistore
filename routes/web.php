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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function (){
    Route::prefix('dashboard')->group(function (){
        Route::get('home', 'HomeController@dashboard')->name('dashboard')
            ->middleware('permission:access_dashboard');
        // TODO: Rutas módulo Tienda
        // Index: Muestra el listado de tiendas
        Route::get('tiendas', 'ShopController@index')->name('shop.index')
            ->middleware('permission:create_store');
        // Create: Muestra el formulario de creación
        Route::get('tienda/crear', 'ShopController@create')->name('shop.create')
            ->middleware('permission:create_store');
        // Store: Guarda en la BD la tienda
        Route::post('shop/store', 'ShopController@store')->name('shop.store')
            ->middleware('permission:save_store');
        // Edit: Mostrar el formulario de actualización
        Route::get('tienda/actualizar/{id}', 'ShopController@edit')->name('shop.edit')
            ->middleware('permission:edit_store');
        // Update: Guarda la nueva información de la tienda
        Route::post('shop/update', 'ShopController@update')->name('shop.update')
            ->middleware('permission:update_store');
        // Destroy: Eliminar la tienda
        Route::post('shop/destroy', 'ShopController@destroy')->name('shop.destroy')
            ->middleware('permission:destroy_store');

        // Trashed: Devuelve las tiendas eliminadas
        Route::get('tiendas/eliminadas', 'ShopController@trashed')->name('shop.trashed')
            ->middleware('permission:restore_store');
        // Restore: Restaurar una tienda
        Route::post('shop/restore', 'ShopController@restore')->name('shop.restore')
            ->middleware('permission:restore_store');


        // TODO: Rutas módulo Categoría
        // Index: Muestra el listado de categorias
        Route::get('categorías', 'CategoryController@index')->name('category.index')
            ->middleware('permission:create_store');
        Route::post('category/store', 'CategoryController@store')->name('category.store')
            ->middleware('permission:create_store');
        Route::post('category/update', 'CategoryController@update')->name('category.update')
            ->middleware('permission:update_store');
        Route::post('category/destroy', 'CategoryController@destroy')->name('category.destroy')
            ->middleware('permission:destroy_store');

        // TODO: Rutas módulo Accesos
        Route::get('usuarios', 'UserController@index')->name('user.index')
            ->middleware('permission:list_user');
        Route::post('user/store', 'UserController@store')->name('user.store')
            ->middleware('permission:create_user');
        Route::post('user/update', 'UserController@update')->name('user.update')
            ->middleware('permission:update_user');
        Route::get('user/roles/{id}', 'UserController@getRoles')->name('user.roles')
            ->middleware('permission:update_user');
        Route::post('user/destroy', 'UserController@destroy')->name('user.destroy')
            ->middleware('permission:destroy_user');

        Route::get('roles', 'RoleController@index')->name('role.index')
            ->middleware('permission:list_role');
        Route::post('role/store', 'RoleController@store')->name('role.store')
            ->middleware('permission:create_role');
        Route::post('role/update', 'RoleController@update')->name('role.update')
            ->middleware('permission:update_role');
        Route::get('role/permissions/{id}', 'RoleController@getPermissions')->name('role.permissions')
            ->middleware('permission:update_role');
        Route::post('role/destroy', 'RoleController@destroy')->name('role.destroy')
            ->middleware('permission:destroy_role');

        Route::get('permisos', 'PermissionController@index')->name('permission.index')
            ->middleware('permission:list_permission');
        Route::post('permission/store', 'PermissionController@store')->name('permission.store')
            ->middleware('permission:create_permission');
        Route::post('permission/update', 'PermissionController@update')->name('permission.update')
            ->middleware('permission:update_permission');
        Route::post('permission/destroy', 'PermissionController@destroy')->name('permission.destroy')
            ->middleware('permission:destroy_permission');
    });
});

// Customer
// Customer_address
// method_payment
// method_ship

// ------
// Product
// Product_image
// Product_info
// -----

//Procesos
// cart
// cart_product
// Sale
// Sale_product
// Notification
// Comment
// Banner
// Product_top
// Information


