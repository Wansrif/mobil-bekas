<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// HOME
$routes->get('/', 'Home::index');
$routes->post('kirim', 'Home::kirim', ['as' => 'send.msg']);

// HONDA
$routes->get('honda/(:any)', 'Honda::detail/$1');
$routes->get('mitsubishi/(:any)', 'Mitsubishi::detail/$1');
$routes->get('toyota/(:any)', 'Toyota::detail/$1');

// ADMIN ROUTES
$routes->group('admin', function ($routes) {
    $routes->add('dashboard', 'Dashboard::index');

    // TOYOTA
    $routes->get('toyotaadmin','Toyotaadmin::index');
    $routes->get('toyotaadmin/create','Toyotaadmin::create');
    $routes->get('toyotaadmin/edit/(:segment)','Toyotaadmin::edit/$1');
    $routes->post('toyotaadmin/update/(:num)','Toyotaadmin::update/$1');
    $routes->delete('toyotaadmin/(:num)','Toyotaadmin::delete/$1');
    $routes->post('toyotaadmin/save','Toyotaadmin::save');
    $routes->get('toyotaadmin/(:any)', 'Toyotaadmin::detail/$1');

    // MITSUBISHI
    $routes->get('mitsubishiadmin','Mitsubishiadmin::index');
    $routes->get('mitsubishiadmin/create','Mitsubishiadmin::create');
    $routes->get('mitsubishiadmin/edit/(:segment)','Mitsubishiadmin::edit/$1');
    $routes->post('mitsubishiadmin/update/(:segment)','Mitsubishiadmin::update/$1');
    $routes->delete('mitsubishiadmin/(:segment)','Mitsubishiadmin::delete/$1');
    $routes->post('mitsubishiadmin/save','Mitsubishiadmin::save');
    $routes->get('mitsubishiadmin/(:any)', 'Mitsubishiadmin::detail/$1');
    
    // HONDA
    $routes->get('hondaadmin','Hondaadmin::index');
    $routes->get('hondaadmin/create','Hondaadmin::create');
    $routes->get('hondaadmin/edit/(:segment)','Hondaadmin::edit/$1');
    $routes->post('hondaadmin/update/(:segment)','Hondaadmin::update/$1');
    $routes->delete('hondaadmin/(:segment)','Hondaadmin::delete/$1');
    $routes->post('hondaadmin/save','Hondaadmin::save');
    $routes->get('hondaadmin/(:any)', 'Hondaadmin::detail/$1');

    // PENJUALAN
    $routes->get('penjualan','Penjualan::index');
    $routes->get('penjualan/create','Penjualan::create');
    $routes->get('penjualan/edit/(:segment)','Penjualan::edit/$1');
    $routes->post('penjualan/update/(:num)','Penjualan::update/$1');
    $routes->delete('penjualan/(:num)','Penjualan::delete/$1');
    $routes->post('penjualan/save','Penjualan::save');
    $routes->get('penjualan/(:any)', 'Penjualan::detail/$1');

    // KATEGORI
    $routes->get('kategori', 'Kategori::index');
    $routes->get('kategori/getdata','Kategori::getData',['as' => 'get.data']);
    $routes->post('kategori/addkategori', 'Kategori::addKategori',['as' => 'add.kategori']);
    $routes->post('kategori/editkategori', 'Kategori::editKategori',['as' => 'edit.kategori']);
    $routes->post('kategori/updatekategori', 'Kategori::updateKategori',['as' => 'update.kategori']);
    $routes->post('kategori/getDelete', 'Kategori::getDelete',['as' => 'get.delete']);
    $routes->delete('kategori/deleteKategori', 'Kategori::deleteKategori',['as' => 'delete.kategori']);

    // PESAN
    $routes->add('pesan', 'Pesan::index');
    $routes->add('pesan/(:any)', 'Pesan::detail/$1');
    $routes->delete('pesan/(:segment)','Pesan::delete/$1');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}