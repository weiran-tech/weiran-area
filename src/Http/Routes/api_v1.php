<?php

declare(strict_types = 1);

Route::group([
    'namespace' => 'Weiran\Area\Http\Request\Web\ApiV1',
], function (Illuminate\Routing\Router $route) {
    $route->any('area/code', 'AreaController@code');
    $route->any('area/country', 'AreaController@country');
});
