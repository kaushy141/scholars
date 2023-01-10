<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/gifts', 'Home::gifts');
$routes->get('/about', 'Home::about');
$routes->get('/messages', 'Home::messages');
$routes->get('/contacts', 'Home::contacts');
$routes->get('user-verification/(:any)', 'Admin\Auth::verification/$1');
$routes->group('admin', static function($routes){
	$routes->get('', 'Admin\Auth::signin');
	$routes->group('auth', static function ($routes) {
		$routes->get('', 'Admin\Auth::signin');
		$routes->get('signin', 'Admin\Auth::signin');
		$routes->get('signup', 'Admin\Auth::signup');
		$routes->get('logout/(:hash)', 'Admin\Auth::logout/$1');		
		$routes->post('signincheck', 'Admin\Auth::signincheck');
		$routes->post('signupcheck', 'Admin\Auth::signupcheck');
	});
	
	$routes->group('secure', ['filter' => 'adminlogin'], static function ($routes) {
		$routes->get('', 'Admin\Dashboard::index');
		$routes->get('dashboard', 'Admin\Dashboard::index');
		
		$routes->get('user/registration', 'Admin\User::registration');
		$routes->get('user/registration/(:any)', 'Admin\User::registration/$1');
		$routes->get('user/profile', 'Admin\User::profile');
		$routes->get('user/profile/(:any)', 'Admin\User::profile/$1');
		$routes->post('user/save/', 'Admin\User::save');
		$routes->post('user/save/(:any)', 'Admin\User::save/$1');
		$routes->get('user/admin', 'Admin\User::admin');
		$routes->get('user/donner', 'Admin\User::donner');
		$routes->get('user/student', 'Admin\User::student');		
		$routes->get('user/activate/(:any)', 'Admin\User::activate/$1');
		$routes->get('user/unverified/(:any)', 'Admin\User::unverified/$1');
		$routes->get('user/suspend/(:any)', 'Admin\User::suspend/$1');
		$routes->get('user/delete/(:any)', 'Admin\User::delete/$1');
		$routes->get('user/send-email-conf-link/(:any)', 'Admin\User::sendEmailLink/$1');
		$routes->get('user/change-password/(:any)', 'Admin\User::changeUserPassword/$1');
		
		
		$routes->get('master/registration-scholar', 'Admin\Master::registrationScholar');
		$routes->get('master/registration-scholar/(:any)', 'Admin\Master::registrationScholar/$1');
		$routes->post('master/savescholar/(:any)', 'Admin\Master::saveScholar/$1');
		$routes->get('master/scholar', 'Admin\Master::scholarList');
		
		$routes->post('store/save/(:id)', 'Admin\Store::save');
	});
	
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
