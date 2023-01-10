<?php

namespace Config;
// connect to Home controller

use App\Controllers\AbsentController;
use App\Controllers\AdminController;
use App\Controllers\ClassController;
use App\Controllers\HomeController;
use App\Controllers\StudentController;

// connect to Validate controller | LOGIN AND REGISTER
use App\Controllers\ValidateController;




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
$routes->setDefaultController('StudentController');
$routes->setDefaultMethod('');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default

// route since we don't have to scan directories.
$routes->get('/', [StudentController::class, 'index']);

// Route to  the logout form
$routes->post('/logout', [ValidateController::class, 'logout']);
// Route to  the login form
$routes->get('/login', [ValidateController::class, 'index']);

// route to process the login form
$routes->post('/proseslogin', [ValidateController::class, 'proseslogin']);

// Route to  the regist form
$routes->get('/regist', [ValidateController::class, 'register']);

// Route to process the regist form
$routes->post('/prosesregist', [ValidateController::class, 'prosesregist']);

// Route to user page if role is student
$routes->get('/user', [AdminController::class, 'index']);

//route to add student in student:
$routes->get('/addstudent',[StudentController::class,'addstudent']);


// route to proses student in student
$routes->post('prosesaddstudent',[StudentController::class, 'prosesaddstudent']);

//route to edit student in student
$routes->get('/editstudent/(:segment)/(:segment)','StudentController::editstudent/$1/$2');

//route proses edit student in student 
$routes->post('/proseseditstudent' , [StudentController::class, 'proseseditstudent']);

//route to delete student in student
$routes->get('/deletestudent/(:segment)/(:segment)', 'StudentController::deletestudent/$1/$2');

// Route to class page 
$routes->get('/class', [ClassController::class, 'index']);

// route to add class
$routes->get('/addclass', [ClassController::class, 'addclass']);

// route to process the add class form
$routes->post('/prosesaddclass', [ClassController::class, 'prosesadd']);

// route to edit class
$routes->get('/editclass/(:segment)', [ClassController::class, 'editclass']);

// route to process the edit class form
$routes->post('/proseseditclass', [ClassController::class, 'prosesedit']);

// route to delete class
$routes->get('/deleteclass/(:segment)', [ClassController::class, 'delete']);

// Route to absent page
$routes->get('/absent', [AbsentController::class, 'index']);

// route to add students







if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}