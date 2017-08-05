<?php defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST");

$route['default_controller'] = 'error_404';

// USER
$route['sign_in']['post'] = 'user_controller/get_user';
$route['sign_up']['post'] = 'user_controller/add_user';

$route['sign_in']['get'] = 'error_404';
$route['sign_up']['get'] = 'error_404';
$route['sign_in/(:any)'] = 'error_404';
$route['sign_up/(:any)'] = 'error_404';

// GAME
$route['periods']['get'] = 'game_controller/get_periods';
$route['game']['get'] = 'game_controller/get_questions';
$route['game_complete']['get'] = 'game_controller/game_complete';
$route['buy_period']['get'] = 'game_controller/buy_period';

$route['periods']['post'] = 'error_404';
$route['game']['post'] = 'error_404';
$route['game_complete']['post'] = 'error_404';
$route['buy_period']['post'] = 'error_404';
$route['periods/(:any)'] = 'error_404';
$route['game/(:any)'] = 'error_404';
$route['game_complete/(:any)'] = 'error_404';
$route['buy_period/(:any)'] = 'error_404';