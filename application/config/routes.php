<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
//$route['default_controller'] = 'welcome';
$route['default_controller'] = 'vyaparbill';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['services'] = 'vyaparbill/services';
$route['about'] = 'vyaparbill/about';
$route['price'] = 'vyaparbill/price';
$route['contact'] = 'vyaparbill/contact';


$route['user/dashboard'] = 'bill/dashboard';
$route['user/bill/performa/create'] = 'bill/proforma_invoice';
$route['user/bill/performa/edit/(:any)'] = 'bill/edit_proforma_bill/$1';

$route['user/bill/tax/create'] = 'bill/tax_invoice';
$route['user/bill/tax/edit/(:any)'] = 'bill/edit_tax_bill/$1';

$route['user/setting'] = 'bill/setting';
$route['user/logout'] = 'bill/logout';
$route['user/changepassword'] = 'bill/changepassword';
$route['user/profile'] = 'bill/myprofile';
$route['user/party'] = 'bill/party';
$route['user/addparty'] = 'bill/addparty';
$route['user/editparty/(:any)'] = 'bill/editparty/$1';
$route['user/editprofile'] = 'bill/editprofile';





$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/dashboard/companies/free'] = 'admin/freecompanylist';
$route['admin/dashboard/companies/paid'] = 'admin/paidcompanylist';
$route['admin/dashboard/view/companies'] = 'admin/companydetails';
$route['admin/dashboard/listinvoice'] = 'admin/getinvoice';
$route['admin/dashboard/companies/pending'] = 'admin/pendingapproval';


$route['admin/dashboard/setting']    = 'admin/setting';
$route['admin/dashboard/logout']     = 'admin/logout';
$route['admin/dashboard/changepassword'] = 'admin/changepassword';
$route['admin/dashboard/profile']    = 'admin/myprofile';
$route['admin/dashboard/editprofile']= 'admin/editprofile';