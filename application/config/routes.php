<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// $route['default_controller'] = 'welcome';

$route['login'] = 'login';
$route['admin'] = 'admin/index';

$route['populardestinations/(:any)'] = 'populardestinations/destination';
$route['populardestinations'] = 'populardestinations/index';
$route['currency'] = 'currency/index';
$route['about'] = 'about/index';
$route['contact'] = 'contact/index';
$route['newsletter/register'] = 'newsletter/register';
$route['contact/send'] = 'contact/send';
$route['quotes'] = 'quotes/index';
$route['default_controller'] = 'home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

$route['admin/sales'] 							= 'AdminSales_Controller';
$route['admin/sales/upload'] 					= 'AdminSales_Controller/upload';
$route['admin/sales/delete'] 					= 'AdminSales_Controller/delete';

$route['admin/sales/create'] 					= 'AdminSales_Controller/create';
$route['admin/sales/update/(:num)'] 			= 'AdminSales_Controller/update/$1';

$route['admin/typer'] 							= 'AdminTyper_Controller';
$route['admin/typer/create'] 					= 'AdminTyper_Controller/create';
$route['admin/typer/create_typer'] 				= 'AdminTyper_Controller/create_typer';

$route['admin/typer/delete'] 					= 'AdminTyper_Controller/delete';

$route['admin/typer/edit/(:num)'] 				= 'AdminTyper_Controller/edit/$1';
$route['admin/typer/update'] 					= 'AdminTyper_Controller/update';


$route['admin/maintext'] 						= 'AdminmainText_Controller';
$route['admin/maintext/create'] 				= 'AdminmainText_Controller/create';
$route['admin/maintext/create_maintext']		= 'AdminmainText_Controller/create_maintext';

$route['admin/maintext/delete'] 				= 'AdminmainText_Controller/delete';

$route['admin/maintext/edit/(:num)'] 			= 'AdminmainText_Controller/edit/$1';
$route['admin/maintext/update'] 				= 'AdminmainText_Controller/update';


$route['admin/news'] 							= 'AdminNews_Controller';
$route['admin/news/create'] 					= 'AdminNews_Controller/create';
$route['admin/news/create_news']				= 'AdminNews_Controller/create_news';

$route['admin/news/delete'] 					= 'AdminNews_Controller/delete';

$route['admin/news/edit/(:num)'] 				= 'AdminNews_Controller/edit/$1';
$route['admin/news/update'] 					= 'AdminNews_Controller/update';

$route['admin/news/upload'] 					= 'AdminNews_Controller/upload';



$route['admin/quotes'] 							= 'AdminQuotes_Controller';
$route['admin/quotes/(:num)']					= 'AdminQuotes_Controller/index';
$route['admin/quotes/edit/(:num)']				= 'AdminQuotes_Controller/edit/$1';
$route['admin/quotes/response']					= 'AdminQuotes_Controller/response';
$route['admin/quotes/update']					= 'AdminQuotes_Controller/update';
