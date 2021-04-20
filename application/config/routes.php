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
//frontend
$route['default_controller'] = 'HomeController';

$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';
$route['register'] = 'AuthController/register';

$route['spanduk'] = 'PesanController/pesanSpanduk';
$route['stiker'] = 'PesanController/pesanStiker';
$route['kartu'] = 'PesanController/pesanKartu';
$route['brosur'] = 'PesanController/pesanBrosur';

$route['hapus/spanduk/(:any)'] = 'PesanController/hapusSpanduk/$1';
$route['hapus/stiker/(:any)'] = 'PesanController/hapusStiker/$1';
$route['hapus/kartu/(:any)'] = 'PesanController/hapusKartu/$1';
$route['hapus/brosur/(:any)'] = 'PesanController/hapusBrosur/$1';

$route['keranjang'] = 'BayarController/keranjang';
$route['bayar/(:any)'] = 'BayarController/bayar/$1';
$route['selesai/(:any)/(:any)'] = 'BayarController/selesai/$1/$2';
$route['konfirmasi/(:any)'] = 'BayarController/konfirmasi/$1';

$route['profil'] = 'ProfilController';
$route['pesanan'] = 'ProfilController/pesanan';
$route['desain/(:any)'] = 'ProfilController/desain/$1';
$route['detail-desain/(:any)'] = 'ProfilController/detailDesain/$1';
$route['detail-pesanan/(:any)'] = 'ProfilController/detailPesanan/$1';


//backend
$route['admin'] = 'backend/DashboardController';
$route['admin/login'] = 'backend/AuthController/login';
$route['admin/logout'] = 'backend/AuthController/logout';

$route['admin/pelanggan'] = 'backend/PelangganController';
$route['admin/transaksi'] = 'backend/TransaksiController';
$route['admin/transaksi/lihat/(:any)'] = 'backend/TransaksiController/lihat/$1';
$route['admin/transaksi/konfirmasi/(:any)'] = 'backend/TransaksiController/konfirmasi/$1';
$route['admin/transaksi/email/(:any)'] = 'backend/TransaksiController/email/$1';

$route['admin/pesanan'] = 'backend/PesananController';
$route['admin/pesanan/lihat/(:any)'] = 'backend/PesananController/lihat/$1';
$route['admin/pesanan/foto/(:any)'] = 'backend/PesananController/foto/$1';
$route['admin/pesanan/desain/(:any)'] = 'backend/PesananController/desain/$1';
$route['admin/pesanan/selesai/(:any)'] = 'backend/PesananController/selesai/$1';

$route['admin/laporan/(:any)'] = 'backend/LaporanController/index/$1';

//$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
