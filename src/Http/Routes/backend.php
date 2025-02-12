<?php

declare(strict_types = 1);

use Illuminate\Routing\Router;

Route::group([
    'namespace' => 'Weiran\Area\Http\Request\Backend',
], function (Router $router) {
    $router->any('/', 'ContentController@index')
        ->name('weiran-area:backend.content.index');
    $router->any('establish/{id?}', 'ContentController@establish')
        ->name('weiran-area:backend.content.establish');
    $router->any('delete/{id?}', 'ContentController@delete')
        ->name('weiran-area:backend.content.delete');
    $router->any('fix', 'ContentController@fix')
        ->name('weiran-area:backend.content.fix');
});