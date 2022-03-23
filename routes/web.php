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

/* Route::get('/', function () {

    return view('welcome');
})->name('welcome'); */



Auth::routes(['verify' => true]);


/* Publico & Registrado */

Route::get('/', 'MainController@welcome')->name('welcome');
Route::get('/contact-us', 'MainController@contactPage')->name('contact-us');
Route::get('/terms-conditions', 'MainController@termsPage')->name('terms');
Route::get('/customer-service', 'MainController@support')->name('support');
Route::get('/deliver/drivers', 'MainController@introDrivers')->name('drivers.intro');

Route::get('/category/{category}', 'ProductController@category')->name('product.category');
Route::get('/product/{product}', 'ProductController@showProduct')->name('product.single');
Route::get('/stores/{store}', 'ProductController@store')->name('product.store');


/* Carrito de compras */
Route::get('/cart', 'CartController@showCart')->name('cart');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::get('/cart/clear/{p}', 'CartController@detachProduct')->name('cart.remove');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout'); 
Route::post('/payment/authorize', 'CartController@authorizepayment')->name('cart.authorize'); 
Route::post('/cart/placeorder', 'CartController@placeorder')->name('cart.placeorder'); 
Route::get('/order/finish', 'CartController@finishorder')->name('cart.finish');


/* Buyer */
Route::get('/home', 'HomeController@index')->name('home'); 
Route::get('/search', 'MainController@search')->name('search'); //search route item
Route::get('/user/places', 'UserController@places')->name('user.places'); 
    Route::get('/user/places/new', 'UserController@newPlace')->name('user.places.new'); 
    Route::get('/user/places/edit', 'UserController@editPlace')->name('user.places.edit'); 
    Route::post('/user/places/save', 'UserController@savePlace')->name('user.places.save'); 
    Route::get('/user/places/delete', 'UserController@deletePlace')->name('user.places.delete'); 
Route::get('/user/wishlist', 'UserController@wishlist')->name('user.wishlist');
Route::get('/user/profile', 'UserController@profile')->name('user.profile');
    Route::post('/user/profile/save', 'UserController@profileSave')->name('user.profile.save');
Route::get('/user/orders', 'UserController@orders')->name('user.orders');
Route::get('/user/order/support', 'UserController@orderSupportForm')->name('user.order.support');

Route::get('c/{view}', 'MainController@showView')->name('view');

Route::get('/store/start', 'MainController@storeStartPage')->name('store.start');
Route::get('/store/register', 'MainController@storeRegisterPage')->name('store.register')->middleware('verified');
    Route::post('/store/register/request', 'MainController@registerRequest')->name('store.registerRequest');

/* Store */

Route::get('/store/dashboard', 'StoreController@dashboard')->name('store.dashboard');
Route::get('/store/catalog', 'StoreController@catalog')->name('store.catalog');
    Route::get('/store/catalog/add', 'StoreController@add')->name('store.catalog.add');
    Route::post('/store/catalog/save', 'StoreController@productSave')->name('catalog.product.save');
    Route::get('/store/product/edit/{id}', 'StoreController@edit')->name('store.product.edit');
Route::get('/store/orders', 'StoreController@ordersIndex')->name('store.orders');
    Route::get('/store/orders/{order}', 'StoreController@orderDetail')->name('store.order.detail');
Route::get('/store/stock', 'StoreController@stock')->name('store.stock');
Route::get('/store/reports', 'StoreController@reports')->name('store.reports');
Route::get('/store/messages', 'StoreController@messages')->name('store.messages');
Route::get('/store/profile', 'StoreController@profile')->name('store.profile');
    Route::post('/store/profile/update/banner', 'StoreController@updateBanner')->name('store.profile.save_banner_url');
Route::get('/store/invoices', 'StoreController@invoices')->name('store.invoices');




/* ADMIN */
Route::get('/bcknd/orders', 'AdminController@orders')->name('admin.orders');
Route::get('/bcknd/stores', 'AdminController@stores')->name('admin.stores');
    Route::get('/bcknd/stores/requests', 'AdminController@storesRequest')->name('admin.stores.requests');
    Route::get('/bcknd/stores/view/request/{r}', 'AdminController@StoreRequestDetail')->name('admin.stores.viewrequest');
    Route::get('/bcknd/stores/gen/{r}', 'AdminController@StoreGeneration')->name('admin.stores.gen');
    Route::post('/bcknd/stores/save', 'AdminController@newStore')->name('admin.stores.save');
    Route::get('/bcknd/stores/deny/{r}', 'AdminController@storeDeny')->name('admin.stores.deny');

    Route::get('/bcknd/stores/products/requests', 'AdminController@productRequests')->name('admin.stores.products.requests');
    Route::get('/bcknd/stores/products/approval/{r}', 'AdminController@ProductApproval')->name('admin.stores.products.approval');
    Route::get('/bcknd/stores/products/ok/{r}', 'AdminController@ProductPublish')->name('admin.stores.products.publish');
    Route::get('/bcknd/stores/products/deny/{r}', 'AdminController@ProductDeny')->name('admin.stores.products.deny');
    
Route::get('/bcknd/users', 'AdminController@users')->name('admin.users');


/* AJAX API */
Route::get('/api/places/getCities', 'Api@getCities')->name('api.places.getCities');
Route::post('/api/product/categories', 'Api@getCategories')->name('api.product.categories');
Route::post('/api/product/brands', 'Api@getBrands')->name('api.product.brands');

Route::post('/store/products/get_variations', 'StoreController@getGroupedCombo')->name('api.store.products.get_variations');

/* file uploads */
Route::post('upload', 'FileController@upload')->name('upload');
Route::post('upload-data', 'FileController@uploadImgData')->name('upload.data');
Route::post('rm-file', 'FileController@remove')->name('rm-file');
Route::post('frm-file', 'FileController@forceRemove')->name('frm-file');

/* Route::post('/api/avatar/save', 'ApiController@avatarSave')->name('avatar.save'); */