<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['profile'] = 'Profile';
$route['redirect-dashboard'] = 'Auth/redirect_dashboard';

$route['register'] = 'Auth/register_view';
$route['register/proses'] = 'Auth/register_process';
$route['login'] = 'Auth/login';
$route['logout'] = 'Auth/logout';
$route['backend/dashboard'] = 'Dashboard';
$route['backend/kuis'] = 'Kuis';
$route['backend/insert_kuis'] = 'Kuis/insert_kuis';
$route['backend/get_data_kuis'] = 'Kuis/get_data_kuis';
$route['backend/pelatihan'] = 'Pelatihan';
$route['pelatihan/detail/(:num)'] = 'Pelatihan/detail_kontent/$1';
$route['pelatihan/update/(:num)'] = 'Pelatihan/update/$1';
$route['pelatihan/delete/(:num)'] = 'Pelatihan/delete/$1';
$route['admin/view_insert'] = 'Pelatihan/view_insert';
$route['backend/insert_pelatihan'] = 'Pelatihan/insert';
$route['backend/edit_pelatihan/(:num)'] = 'Pelatihan/edit/$1';

$route['backend/pengguna'] = 'Pengguna';
$route['backend/insert_pengguna'] = 'Pengguna/insert_pengguna';
$route['backend/get_data_pengguna'] = 'Pengguna/get_data_pengguna';
$route['pengguna/edit/(:num)'] = 'Pengguna/edit/$1';
$route['pengguna/update/(:num)'] = 'Pengguna/update/$1';
$route['pengguna/insert'] = 'Pengguna/insert';
$route['pengguna/delete/(:num)'] = 'Pengguna/delete/$1';


$route['user/dashboard'] = 'User/Dashboard';
$route['konten/get_data_konten'] = 'Pelatihan/get_data_konten';

$route['aksara'] = 'Aksara';
$route['aksara/insert_aksara'] = 'Aksara/insert_aksara';
$route['aksara/get_data_aksara'] = 'Aksara/get_data_aksara';
$route['aksara/insert'] = 'Aksara/insert';
$route['aksara/edit/(:num)'] = 'Aksara/edit/$1';
$route['aksara/delete/(:num)'] = 'Aksara/delete/$1';
$route['laporan'] = 'Laporan';

$route['kuis/insert'] = 'Kuis/insert';
$route['kuis/listing_aksara'] = 'Kuis/listing_aksara';
$route['kuis/update_kuis/(:num)'] = 'Kuis/update_kuis/$1';
$route['kuis/update/(:num)'] = 'Kuis/update/$1';
$route['kuis/delete/(:num)'] = 'Kuis/delete/$1';

//User
$route['user/dashboard'] = 'User/Dashboard';
$route['user/kontent'] = 'User/Kontent';
$route['user/kuis'] = 'User/Kuis';
$route['user/aksara'] = 'User/Aksara';
$route['user/detail_kontent/(:num)'] = 'User/Kontent/detail_kontent/$1';
$route['user/get_data_kuis'] = 'User/Kuis/get_data_kuis';
$route['users/detail_kuis/(:num)'] = 'User/Kuis/detail_kuis/$1';
