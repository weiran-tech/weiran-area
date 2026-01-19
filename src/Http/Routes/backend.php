<?php

declare(strict_types = 1);

use Illuminate\Routing\Router;
use Weiran\Area\Http\Backend\AreaController;

Route::group([], function (Router $router) {
    $router->any('/', [AreaController::class, 'index'])
        ->name('weiran-area:backend.content.index');
    $router->any('establish/{id?}', [AreaController::class, 'establish'])
        ->name('weiran-area:backend.content.establish');
    $router->any('delete/{id?}', [AreaController::class, 'delete'])
        ->name('weiran-area:backend.content.delete');
    $router->any('fix', [AreaController::class, 'fix'])
        ->name('weiran-area:backend.content.fix');
});
