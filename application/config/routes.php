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

$route['mail/invitation'] = 'front/customer/Mail_Sender/invitation';
$route['mail/invi_test_email'] = 'front/customer/Mail_Sender/test_email';

$route['user/login'] = 'front/customer/Authentication/log_in';
$route['user/do_login'] = 'front/customer/Authentication/do_login';
$route['user/register'] = 'front/customer/Authentication/register';
$route['user/do_register'] = 'front/customer/Authentication/do_register';
$route['user/log_out'] = 'front/customer/Authentication/do_logout';
$route['user/profile'] = 'front/customer/Authentication/view_my_profile';
$route['user/change_pass'] = 'front/customer/Authentication/change_password_profile';
$route['user/do_change_pass'] = 'front/customer/Authentication/do_change_password_profile';

$route['user/view_cart'] = 'front/customer/Cart_Front';
$route['user/do_add_cart'] = 'front/customer/Cart_Front/do_add_to_cart';
$route['user/do_remove_cart'] = 'front/customer/Cart_Front/do_remove_from_cart';
$route['user/do_update_cart'] = 'front/customer/Cart_Front/do_update_from_view';
$route['user/do_remove_from_view/(:any)'] = 'front/customer/Cart_Front/do_remove_from_view/$1';
$route['user/clear_cart'] = 'front/customer/Cart_Front/clear_cart';

$route['user/check_out'] = 'front/customer/Checkout_Front';
$route['user/do_check_out'] = 'front/customer/Checkout_Front/do_personal_check_out';
$route['user/group_check_out'] = 'front/customer/Checkout_Front/group_check_out';
$route['user/do_group_check_out'] = 'front/customer/Checkout_Front/do_group_check_out';
$route['user/do_group_check_out_by_admin/(:any)'] = 'front/customer/Checkout_Front/do_group_checkout_by_leader/$1';
$route['user/check_out_complete'] = 'front/customer/Checkout_Front/check_complete';

$route['user/order_history'] = 'front/customer/Checkout_Front/order_history';
$route['user/order_history/detail/(:any)'] = 'front/customer/Checkout_Front/order_detail/$1';
$route['user/contact_us'] = 'front/customer/Contact_Us';

$route['user/group/create'] = 'front/customer/Group_Front/create_group';
$route['user/group/do_create'] = 'front/customer/Group_Front/do_create';
$route['user/group/accept/(:any)'] = 'front/customer/Group_Front/do_accept/$1';
$route['user/group/do_accept_by_mail/(:any)/(:any)'] = 'front/customer/Group_Front/do_accept_by_mail/$1/$2';
$route['user/group/view_my_group'] = 'front/customer/Group_Front/user_group';
$route['user/group/view_group_detail/(:any)'] = 'front/customer/Group_Front/view_detail/$1';

$route['store'] = 'front/customer/Store_Front';
$route['store/products'] = 'front/customer/Product_List';
$route['store/do_search_products'] = 'front/customer/Product_List/do_search_product';
$route['store/howitworks'] = 'front/customer/How_It_Works';
$route['store/faq'] = 'front/customer/Faq';
$route['default_controller'] = 'Welcome';

$route['admin/login'] = 'admin/Admin_Authentication/log_in';
$route['admin/do_login'] = 'admin/Admin_Authentication/do_log_in';
$route['admin/register'] = 'admin/Admin_Authentication/register';
// $route['admin/generate_admin'] = 'admin/Admin_Authentication/generate_admin';
$route['admin/profile'] = 'admin/Admin_Authentication/view_my_profile';
$route['admin/do_logout'] = 'admin/Admin_Authentication/do_logout';

$route['admin/dashboard'] = 'admin/Admin_Dashboard';
$route['admin/shop/product'] = 'admin/Admin_Product';
$route['admin/shop/product/add'] = 'admin/Admin_Product/add';
$route['admin/shop/product/do_add'] = 'admin/Admin_Product/do_add';
$route['admin/shop/product/edit/(:any)'] = 'admin/Admin_Product/edit/$1';
$route['admin/shop/product/do_edit'] = 'admin/Admin_Product/do_edit';
$route['admin/shop/category'] = 'admin/Admin_Category';
$route['admin/shop/product/delete/(:any)'] = 'admin/Admin_Product/delete/$1';
$route['admin/shop/category/do_create'] = 'admin/Admin_Category/do_create';
$route['admin/shop/category/do_update'] = 'admin/Admin_Category/do_update';
$route['admin/shop/category/do_delete'] = 'admin/Admin_Category/do_delete';
$route['admin/shop/coupon'] = 'admin/Admin_Coupon';
$route['admin/shop/orders'] = 'admin/Admin_Order';
$route['admin/shop/order/(:any)'] = 'admin/Admin_Order/detail/$1';

$route['admin/user/leaders'] = 'admin/Admin_Leaders';
$route['admin/group_detail/(:any)'] = 'admin/Admin_Leaders/detail_group/$1';
$route['admin/user/users'] = 'admin/Admin_Users';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
