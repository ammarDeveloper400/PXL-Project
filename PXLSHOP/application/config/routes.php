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
$route['default_controller'] = 'Pxl';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['logout'] = 'Pxl/logout';
$route['login'] = 'Pxl/login';
$route['do/login'] = 'Pxl/do_login';
$route['signup'] = 'Pxl/signup';
$route['do/signup'] = 'Pxl/do_signup';

$route['invite/coaches'] = 'Pxl/invite_coaches';
$route['testing'] = 'Pxl/testing';
$route['get/moving'] = 'Pxl/get_moving';
$route['moving/packages/(:num)'] = 'Pxl/get_moving_packages/$1';
$route['subscription/(:num)'] = 'Pxl/subscription/$1';
$route['explore'] = 'Pxl/explore';

$route['forgot/password'] = 'Pxl/forgot_password';
$route['do/forgot/password'] = 'Pxl/forgot_password_email';
$route['otp/password'] = 'Pxl/forgot_password_otp';
$route['do/validate/otp'] = 'Pxl/validate_otp';
$route['do/update/password'] = 'Pxl/do_update_password';
$route['change/password'] = 'Pxl/do_change_password';
$route['profile'] = 'Pxl/profile';
$route['do/update/profile'] = 'Pxl/do_update_profile';

$route['dashboard'] = 'Pxl/dashboard';
$route['schedule'] = 'Pxl/schedule';
$route['tasks'] = 'Pxl/tasks';
$route['support'] = 'Pxl/support';
$route['settings'] = 'Pxl/settings';
$route['public/profile'] = 'Pxl/public_profile';
$route['notifications'] = 'Pxl/notifications';
$route['do/delete/account'] = 'Pxl/do_delete_account';
$route['delete/account'] = 'Pxl/deletion_notice';
$route['change/username'] = 'Pxl/change_user_name';
$route['upgrade/plan'] = 'Pxl/upgrade_plan';
$route['conversation/(:any)'] = 'Pxl/conversation/$1';
$route['messages'] = 'Pxl/messages';
$route['messages/(:any)'] = 'Pxl/messages/$1';

$route['do/verify/email/(:any)'] = 'Pxl/do_verify_email/$1';
$route['players'] = 'Pxl/players';
$route['pxl/plus'] = 'Pxl/plus';
$route['coaches'] = 'Pxl/coaches';
$route['events'] = 'Pxl/events';
$route['workouts'] = 'Pxl/workouts';
$route['shop'] = 'Pxl/shop';
$route['account/(:num)'] = 'Pxl/shop_account/$1';
$route['shipping/(:num)'] = 'Pxl/shop_shipping/$1';
$route['payment/(:num)'] = 'Pxl/shop_payment/$1';
$route['create/athlete/profile'] = 'Pxl/create_athlete_profile';
$route['bookings'] = 'Pxl/bookings';
$route['payment/history'] = 'Pxl/payment_history';

$route['profile/coach'] = 'Pxl/coach_profile';
$route['profile/coach/(:num)'] = 'Pxl/coach_profile/$1';


$route['my/evaluation'] = 'Pxl/my_evaluation';
$route['biological/evaluation'] = 'Pxl/my_biological_evaluation';
$route['athletic/evaluation'] = 'Pxl/my_athletic_evaluation';

$route['accept/booking/(:num)'] = 'Pxl/accept_booking/$1';
$route['reject/booking/(:num)'] = 'Pxl/reject_booking/$1';

$route['wallet'] = 'Pxl/wallet';

$route['workout/detail/(:num)'] = 'Pxl/workout_detail/$1';
$route['exercise/(:num)'] = 'Pxl/do_exercise/$1';

require 'admin_routes.php';