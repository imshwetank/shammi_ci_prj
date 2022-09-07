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
|	https://codeigniter.com/userguide3/general/routing.html
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

$route['default_controller'] = 'homedash';
$route['admin'] = 'login/loginpage';
$route['auth-forgot-password'] = 'login/forgot_password';
$route['user/dashboard'] = 'admin/layout/dashboard';
// $route['user/dashboard'] = 'login/userCheck';
// product home_product.php
$route['product'] = 'utilitise/home_product';
$route['get_product'] = 'utilitise/get_product';
$route['product/all_categories'] = 'product/allcategories';
$route['product/add_categories'] = 'product/addcategories';
$route['product/add_product'] = 'product/catelog';
$route['product/update_catelog'] = 'product/catelogUpdate';
$route['product/update_call'] = 'product/updateCall';
$route['product/view_catelog'] = 'product/addproduct';
$route['product/getforupdate_product'] = 'product/prdUpdateCall';
$route['product/update_product'] = 'product/prdUpdate';
$route['product/upload'] = 'product/producrupload';
$route['product/api_newProduce'] = 'product/newProduce';
$route['product/api_newcategories'] = 'product/newcategories';
$route['product/api_updatecategories'] = 'product/updatecategories';
// upload information
$route['api_upload/product'] = 'Import/uploadproduct';
$route['api_upload/categories'] = 'Import/uploadcategories';
$route['api_upload/test'] = 'Import/testupload';
// carrear 
$route['carrear/post_job'] = 'carrear/postjob';
$route['api_carrear/post_job'] = 'carrear/postjobnew';
$route['carrear/all_jobs'] = 'carrear/alljobs';
$route['carrear/all_application'] = 'carrear/allapplication';  
$route['carrear/carrear'] = 'carrear/jobopning';  
$route['carrear/job_applay'] = 'carrear/jobapplay';
$route['carrear/job_status'] = 'carrear/statusupdate';
$route['carrear/get_status'] = 'carrear/getstatus';
$route['carrear/update_status'] = 'carrear/updatestatus';

$route['carrear/get_statusjob'] = 'carrear/getstatusjob';
$route['carrear/update_statusjob'] = 'carrear/updatestatusjob';
// profile
$route['user/features-profile'] = 'profile_c/features_profile';
// utilitise
$route['query/contact'] = 'utilitise/contact_us';
$route['query/query_us'] = 'utilitise/query_us';
$route['query/view_contact'] = 'utilitise/viewcontact';
$route['query/view_query_us'] = 'utilitise/viewqueryus';
$route['about'] = 'utilitise/about_us';

$route['query/query_status'] = 'utilitise/getstatquery';
$route['query/query_statusupdate'] = 'utilitise/updatestatusquery';

$route['query/conquery_status'] = 'utilitise/congetstatquery';
$route['query/conquery_statusupdate'] = 'utilitise/conupdatestatusquery';
// new request
$route['query/new_contact'] = 'utilitise/newcontact';
$route['query/new_query'] = 'utilitise/newsquery';
// $route['query/conquery_status'] = 'utilitise/congetstatquery';
// $route['query/conquery_statusupdate'] = 'utilitise/conupdatestatusquery';

// auth section 
$route['login/login_chek'] = 'login/userCheck';
$route['login/pwd_change'] = 'login/passwordChange';
$route['login/forgot_pwd'] = 'login/forgotChange';
$route['login/otp_send'] = 'login/otpSend';
$route['login/logout/userCheck'] = 'logout';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
