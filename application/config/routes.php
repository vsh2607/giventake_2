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
$route['default_controller'] = 'Auth/user_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//Login 
$route['admin_login'] = 'Auth/admin_login';
$route['user_login'] = 'Auth/user_login';

//Logout
$route['user_logout'] = 'Auth/user_logout';
$route['admin_logout'] = 'Auth/admin_logout';



//Register
$route['user_register'] = 'Auth/user_register';
$route['admin_register'] = 'Auth/admin_register';


//User Verify
$route['user_verify'] = 'Auth/user_verify';


//User menus
$route['user_dashboard'] = 'User/user_dashboard';
$route['user_chat'] = 'User/user_chat';
$route['user_chat_text_send'] = 'User/user_chat_text_send';
$route['user_chat_img_send'] = 'User/user_chat_img_send';
$route['user_get_chat'] = 'User/user_get_chat';

//User menus for penyintas
$route['penyintas_minta_bantuan_list'] = 'User/penyintas_minta_bantuan_list';
$route['penyintas_minta_bantuan'] = 'User/penyintas_minta_bantuan';
$route['penyintas_minta_bantuan_detail/(:any)'] = 'User/penyintas_minta_bantuan_detail/$1';



//User menus for donatur
$route['donatur_beri_bantuan_list'] = 'User/donatur_beri_bantuan_list';
$route['donatur_beri_bantuan'] = 'User/donatur_beri_bantuan';

//User menus for relawan
$route['user_relawan_task_list'] = 'User/user_relawan_task_list';
$route['user_set_bantuan_taken_relawan/(:any)'] = 'User/user_set_bantuan_taken_relawan/$1';








//Admin menus
$route['admin_dashboard'] = 'Admin/admin_dashboard';
$route['admin_chat/(:any)/(:any)/(:any)'] = 'Admin/admin_chat/$1/$2/$3';
$route['admin_contacts_donatur'] = 'Admin/admin_contacts_donatur';
$route['admin_contacts_penyintas'] = 'Admin/admin_contacts_penyintas';
$route['admin_contacts_relawan'] = 'Admin/admin_contacts_relawan';


$route['admin_get_chat'] = 'Admin/admin_get_chat';
$route['admin_chat_text_send'] = 'Admin/admin_chat_text_send';
$route['admin_chat_img_send/(:any)/(:any)'] = 'Admin/admin_chat_img_send/$1/$2';



$route['admin_set_all_status_telahambil/(:any)'] = 'Admin/admin_set_all_status_telahambil/$1';
$route['admin_set_all_status_telahtiba/(:any)'] = 'Admin/admin_set_all_status_telahtiba/$1';


//Admin-penyintas menu
$route['admin_list_pengajuan_bantuan'] = 'Admin/admin_list_pengajuan_bantuan';
$route['admin_get_all_pengajuan_bantuan'] = 'Admin/admin_get_all_pengajuan_bantuan';
$route['admin_penyintas_detail_pengajuan/(:any)'] = 'Admin/admin_penyintas_detail_pengajuan/$1';
$route['admin_get_cek_bantuan'] = 'Admin/admin_get_cek_bantuan';
$route['admin_reject_permohonan'] = 'Admin/admin_reject_permohonan';
$route['admin_get_list_bantuan_penyintas'] = 'Admin/admin_get_list_bantuan_penyintas';



//Admin-donatur menu
$route['admin_list_bantuan_donatur']  = 'Admin/admin_list_bantuan_donatur';
$route['admin_get_donatur_bantuan_bb'] = 'Admin/admin_get_donatur_bantuan_bb';


//Admin relawan menu
$route['admin_create_task'] = 'Admin/admin_create_task';
$route['admin_show_relawan_task'] = 'Admin/admin_show_relawan_task';




// $route['method/(:any)/(:any)'] = 'controller/method/$1/$2';
