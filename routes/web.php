<?php

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/ip', function () {
    // finding IP address which is given by the router to client or user
    return dd(gethostbyname(trim(`hostname`)));

    //finding server IP address
    // $clientIPAddress = $_SERVER['REMOTE_ADDR'];
    // return $clientIPAddress;


    // finding Router Default Gateway
    // $exec = 'ipconfig | findstr /R /C:"Default.*"';
    // exec($exec, $output);
    // preg_match('/\d+\.\d+\.\d+\.\d+/', $output[0], $matches);
    // return dd($matches[0]);

    // finding Router MAC address
    // $arp = `arp -a`;
    // $lines = explode("\n", $arp);
    // $devices = array();
    // foreach ($lines as $line) {
    //     $cols = preg_split('/\s+/', trim($line));
    //     if (isset($cols[2]) && $cols[2] == 'dynamic') {
    //         $temp = array();
    //         $temp['ip'] = $cols[0];
    //         $temp['mac'] = $cols[1];
    //         $devices[] = $temp;
    //     }
    // }
    // return dd($devices[0]['mac']);
});


Route::get('/users', function () {
    return User::get();
});
