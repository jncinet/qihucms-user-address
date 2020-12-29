<?php

use Illuminate\Routing\Router;

// 接口
Route::group([
    'prefix' => config('qihu.user_address_prefix', 'user'),
    'namespace' => 'Qihucms\UserAddress\Controllers\Api',
    'middleware' => ['api'],
    'as' => 'api.user.'
], function (Router $router) {
    $router->apiResource('addresses', 'UserAddressController');
});

// 后台
Route::group([
    'prefix' => config('admin.route.prefix') . '/user',
    'namespace' => 'Qihucms\UserAddress\Controllers\Admin',
    'middleware' => config('admin.route.middleware'),
    'as' => 'admin.'
], function (Router $router) {
    $router->resource('addresses', 'UserAddressController');
});