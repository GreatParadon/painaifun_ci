<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "main_controller";
$route['404_override'] = 'main_controller';

$route['accommodation'] = 'main_controller/accommodation';
$route['accommodation/(:num)'] = 'main_controller/accommodation/$1';
$route[''] = 'main_controller/index';
$route['about'] = 'main_controller/about';
$route['contact'] = 'main_controller/contact';
$route['gallery'] = 'main_controller/gallery';
$route['reservation'] = 'main_controller/reservation';

$route['admin'] = 'admin_controller/index';
$route['admin/authen'] = 'admin_controller/authen';
$route['admin/main'] = 'admin_controller/main';
$route['admin/logout'] = 'admin_controller/logout';

// $route['admin/management'] = 'main_controller/management';
$route['admin/room'] = 'room_controller/index';
$route['admin/room/create'] = 'room_controller/create';
$route['admin/room/store'] = 'room_controller/store';
$route['admin/room/(:num)/edit'] = 'room_controller/edit/$1';
$route['admin/room/update/(:num)'] = 'room_controller/update/$1';
$route['admin/room/delete/(:num)'] = 'room_controller/delete/$1';

$route['admin/reservation'] = 'reservation_controller/index';
$route['admin/reservation/create'] = 'reservation_controller/create';
$route['admin/reservation/store'] = 'reservation_controller/store';
$route['admin/reservation/(:num)'] = 'reservation_controller/show/$1';
$route['admin/reservation/(:num)/edit'] = 'reservation_controller/edit/$1';
$route['admin/reservation/update/(:num)'] = 'reservation_controller/update/$1';
$route['admin/reservation/delete/(:num)'] = 'reservation_controller/delete/$1';

$route['admin/room/rate/store'] = 'rate_controller/store';
$route['admin/room/rate/update/(:num)'] = 'rate_controller/update/$1';
$route['admin/room/rate/delete/(:num)'] = 'rate_controller/delete/$1';
// $route['admin/reservation'] = 'main_controller/resv';



/* End of file routes.php */
/* Location: ./application/config/routes.php */