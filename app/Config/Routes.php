<?php


use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('home', 'Home::index', ['filter' => 'auth']);


$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');


$routes->group('produk', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('download', 'ProdukController::download');
});

$routes->group('diskon', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'DiscountController::index');
    $routes->post('', 'DiscountController::create');
    $routes->post('edit/(:any)', 'DiscountController::edit/$1');
    $routes->get('delete/(:any)', 'DiscountController::delete/$1');
});

$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
        //Rute ini digunakan untuk menampilkan isi keranjang belanja
        $routes->get('', 'TransaksiController::index');

        //Rute ini digunakan untuk menambah produk ke keranjang belanja
        $routes->post('', 'TransaksiController::cart_add');

        //Rute ini digunakan untuk mengubah jumlah produk pada keranjang belanja
        $routes->post('edit', 'TransaksiController::cart_edit');

        //Rute ini digunakan untuk menghapus produk dari keranjang belanja
        $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');

        //Rute ini digunakan untuk mengosongkan keranjang belanja
        $routes->get('clear', 'TransaksiController::cart_clear');
});

$routes->group('pembelian', ['filter' => 'role'], function ($routes) {
    $routes->get('', 'PembelianController::index');
    $routes->post('status/(:num)', 'PembelianController::status/$1');
});

$routes->get('checkout', 'TransaksiController::checkout', ['filter' => 'auth']);

$routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);
$routes->get('history', 'TransaksiController::history', ['filter' => 'auth']);
$routes->get('history', 'TransaksiController::history', ['filter' => 'auth']);

$routes->get('ajax/destinations','TransaksiController::destinations', ['filter' => 'auth']);
$routes->get('ajax/costs','TransaksiController::costs', ['filter' => 'auth']);

$routes->resource('api/products', ['controller' => 'Api\ProdukController']);
$routes->resource('api/discounts', [
    'controller' => 'Api\DiscountController'
]);

$routes->get('api/transactions', 'Api\TransaksiController::index');
