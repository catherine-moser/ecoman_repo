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
$route['profile_update'] = "user/user_profile_update";
$route['user/(:any)'] = "user/user_profile/$1";
$route['register'] = "user/user_register";
$route['login'] = "user/user_login";
$route['logout'] = "user/user_logout";

$route['update_project/(:any)'] = "project/update_project/$1";
$route['newproject'] = "project/new_project";
$route['projects'] = "project/show_all_project";
$route['contactperson']="project/contact_person";
$route['project/(:any)'] = "project/view_project/$1";


$route['companySearch']="company/company_search";
$route['update_company/(:any)'] = "company/update_company/$1";
$route['newcompany'] = "company/new_company";
$route['company'] = "company/show_all_companies";
$route['company/(:any)'] = "company/companies/$1";

$route['search'] = "search/search_pro";
$route['search/(:any)'] = "search/search_pro/$1";

$route['flow_and_component'] = "dataset/flow_and_component";
$route['new_flow/(:any)'] = "dataset/new_flow/$1";
$route['flow_and_component/new_component'] = "dataset/new_component";

$route['new_product'] = "dataset/new_product";
$route['product'] = "dataset/product";

$route['new_process/(:any)'] = "dataset/new_process/$1";

$route['new_equipment/(:any)'] = "dataset/new_equipment/$1";

$route['default_controller'] = "homepage";
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
