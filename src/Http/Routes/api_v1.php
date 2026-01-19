<?php

declare(strict_types = 1);

use Weiran\Area\Http\Web\ApiV1\AreaController;

Route::group([], function (Illuminate\Routing\Router $route) {
    $route->any('area/code', [AreaController::class, 'code']);
    $route->any('area/country', [AreaController::class, 'country']);
});
