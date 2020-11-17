<?php

use Illuminate\Routing\Router;

// 手机端
Route::group([
    'namespace' => 'Qihucms\UserFollow\Controllers\Wap',
    'middleware' => ['web']
], function (Router $router) {
//    $router->resource('user-follows', 'FollowsController');
});

// 接口
Route::group([
    'prefix' => 'user',
    'domain' => config('qihu.api_domain'),
    'namespace' => 'Qihucms\UserAddress\Controllers\Api',
    'middleware' => ['api'],
    'as' => 'api.'
], function (Router $router) {
    $router->apiResource('addresses', 'UserAddressController');
});

// 后台
Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => 'Qihucms\UserAddress\Controllers\Admin',
    'middleware' => config('admin.route.middleware'),
    'as' => 'admin.'
], function (Router $router) {
    $router->resource('user-address', 'UserAddressController');
});