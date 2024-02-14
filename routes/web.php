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
        Route::get('/all/shops', 'ShopController@getShops')->name('shop.get');

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


        //Todo: Rutas modulo Direcciones
        Route::get('direcciones', 'CustomerAddressController@index')->name('address.index')
            ->middleware('permission:create_store');
        //Crear una nueva direccion
        Route::post('address/store', 'CustomerAddressController@store')->name('address.store')
            ->middleware('permission:create_store');
        //Ruta para mostrar las direcciones de un cliente 
        Route::get('direccion/mostrar/{id}', 'CustomerAddressController@show')->name('address.show')
            ->middleware('permission:create_store');;
        //Modificar una direccion de un cliente
        Route::post('address/update', 'CustomerAddressController@update')->name('address.update')
            ->middleware('permission:update_store');
        //Eliminar una dirección de un cliente
        Route::post('address/destroy', 'CustomerAddressController@destroy')->name('address.destroy')
            ->middleware('permission:destroy_store');

        // TODO: Rutas módulo Metodos de pago
        Route::get('payment', 'MethodsPaymentController@index')->name('payment.index')
        ->middleware('permission:view_payments');
        Route::post('payment/store', 'MethodsPaymentController@store')->name('payment.store')
        ->middleware('permission:store_payments');
        Route::post('payment/update', 'MethodsPaymentController@update')->name('payment.update')
        ->middleware('permission:update_payments');
        Route::post('payment/destroy', 'MethodsPaymentController@destroy')->name('payment.destroy')
        ->middleware('permission:delete_payments');

        // TODO: Rutas módulo Envios
        // Index: Muestra el listado de envios
        Route::get('envios', 'MethodShippingController@index')->name('method_ship.index')
            ->middleware('permission:view_shipping');
        Route::post('method_ship/store', 'MethodShippingController@store')->name('method_ship.store')
            ->middleware('permission:store_shipping');
        Route::post('method_ship/update', 'MethodShippingController@update')->name('method_ship.update')
            ->middleware('permission:update_shipping');
        Route::post('method_ship/destroy', 'MethodShippingController@destroy')->name('method_ship.destroy')
           ->middleware('permission:delete_shipping');

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

        // TODO: Rutas módulo Productos
        // Index: Muestra el listado de productos
        Route::get('productos', 'ProductController@index')->name('product.index')
            ->middleware('permission:create_store');
        // Create: Muestra el formulario de creación
        Route::get('producto/crear', 'ProductController@create')->name('product.create')
            ->middleware('permission:create_store');
        // Store: Guarda en la BD el producto
        Route::post('product/store', 'ProductController@store')->name('product.store')
            ->middleware('permission:save_store');
        // Edit: Mostrar el formulario de actualización
        Route::get('producto/actualizar/{id}', 'ProductController@edit')->name('product.edit')
            ->middleware('permission:edit_store');
        // Update: Guarda la nueva información del producto
        Route::post('product/update', 'ProductController@update')->name('product.update')
            ->middleware('permission:update_store');
        // Destroy: Eliminar el producto
        Route::post('product/destroy', 'ProductController@destroy')->name('product.destroy')
            ->middleware('permission:destroy_store');
      
        Route::get('/obtener/infos/{idProduct}', 'ProductController@getInfo')
            ->middleware('permission:edit_store');
        Route::get('/obtener/images/{idProduct}', 'ProductController@getImages')
            ->middleware('permission:edit_store');
        Route::get('/delete/images/{idImage}', 'ProductController@deleteImages')
            ->middleware('permission:edit_store');


        // TODO: CUSTOMER

        // TODO: Rutas módulo Clientes
        Route::get('clientes', 'CustomerController@index')->name('customer.index')
            ->middleware('permission:list_customer');
        Route::post('customer/store', 'CustomerController@store')->name('customer.store')
            ->middleware('permission:create_customer');
        Route::post('customer/update', 'CustomerController@update')->name('customer.update')
            ->middleware('permission:update_customer');
        Route::get('customer/roles/{id}', 'CustomerController@getRoles')->name('customer.roles')
            ->middleware('permission:update_customer');
        Route::post('customer/destroy', 'CustomerController@destroy')->name('customer.destroy')
            ->middleware('permission:destroy_customer');

        // TODO: Rutas módulo Exportaciones
        Route::get('exportaciones', 'ExportController@index')->name('exports')
            ->middleware('permission:access_dashboard');
        Route::get('pdf/basic/stream', 'ExportController@pdfBasicStream')->name('pdf.basic')
            ->middleware('permission:access_dashboard');
        Route::get('pdf/basic/download', 'ExportController@pdfBasicDownload')->name('pdf.basic.download')
            ->middleware('permission:access_dashboard');
        Route::get('pdf/save/download', 'ExportController@pdfSaveDownload')->name('pdf.save.download')
            ->middleware('permission:access_dashboard');
        Route::get('pdf/view/stream', 'ExportController@pdfViewStream')->name('pdf.view.stream')
            ->middleware('permission:access_dashboard');

        Route::get('excel/basic', 'ExportController@excelBasic')->name('excel.basic')
            ->middleware('permission:access_dashboard');
        Route::get('excel/collection', 'ExportController@excelCollection')->name('excel.collection')
            ->middleware('permission:access_dashboard');
        Route::get('excel/array', 'ExportController@excelArray')->name('excel.array')
            ->middleware('permission:access_dashboard');
        Route::get('excel/construct', 'ExportController@excelConstruct')->name('excel.construct')
            ->middleware('permission:access_dashboard');
        Route::get('excel/view', 'ExportController@excelView')->name('excel.view')
            ->middleware('permission:access_dashboard');
    });

    Route::get('middleware/check', 'PermissionController@middlewareCheck')
        ->name('middleware.check')
        ->middleware('middlewareCheck:20,view');

    Route::get('/add/cart/{idProduct}', 'CartController@addToCart')
        ->name('add.cart');

    Route::get('/shopping/cart/', 'CartController@getShoppingCart')
        ->name('shopping.cart');

    Route::get('/update/cart/{cart_id}/{product_id}/{action}', 'CartController@updateCart')
        ->name('update.cart');

    Route::get('/remove/item/{cart_id}/{product_id}', 'CartController@removeItem')
        ->name('remove.item');

    Route::get('/checkout/order/', 'CartController@checkoutOrder')
        ->name('checkout.order');

    Route::post('/confirm/order/', 'CartController@confirmOrder')
        ->name('confirm.order');

    // TODO: Rutas de Evento Broadcasting Test
    Route::get('/sendEvent', function (){
        $mensaje = 'Por fin hicimos una transmisión';
        //event(new \App\Events\OrderPlaced($mensaje));
    });

    Route::get('/listenEvent', function (){
        return view('pusher.listen');
    });

    // TODO: Rutas de Eager and Lazy loading
    Route::get('/eager', 'HomeController@eager');
    Route::get('/lazy', 'HomeController@lazy');

    // TODO: Rutas de vue
    Route::get('/comments/{id}', 'CommentController@index');
    Route::post('/comment/create', 'CommentController@store');
    Route::put('/comment/update/{id}', 'CommentController@update');
    Route::delete('/comment/delete/{id}', 'CommentController@destroy');
});

Route::get('auth/{provider}', 'SocialAuthController@redirectToProvider')
    ->name('social.auth');
Route::get('auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');

Route::get('/catalogo/', 'ProductController@catalog')
    ->name('landing.catalog');
Route::get('/landing/get/products/', 'ProductController@getProducts');

Route::get('/product/detail/{idProduct}', 'ProductController@getProductById')
    ->name('landing.detail');

// TODO: Ruta de envio de formulario Contacto
Route::get('/contacto', 'MailController@showContact')
    ->name('show.contact');

Route::post('/contacto', 'MailController@storeContact')
    ->name('store.contact');


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


