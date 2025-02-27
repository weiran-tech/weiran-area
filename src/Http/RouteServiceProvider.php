<?php

declare(strict_types = 1);

namespace Weiran\Area\Http;

use Route;

class RouteServiceProvider extends \Weiran\Framework\Application\RouteServiceProvider
{
    /**
     * The controller namespace for the application.
     * When present, controller route declarations will automatically be prefixed with this namespace.
     * @var string|null
     */
    protected $namespace = 'Weiran\Area\Http\Request';

    /**
     * Define your route model bindings, pattern filters, etc.
     * @return void
     */
    public function boot(): void
    {
        $this->routes(function () {
            $this->mapWebRoutes();

            $this->mapApiRoutes();
        });
    }

    /**
     * Define the "web" routes for the module.
     * These routes all receive session state, CSRF protection, etc.
     * @return void
     */
    protected function mapWebRoutes(): void
    {
        // backend web
        Route::group([
            'prefix'     => $this->prefix . '/area',
            'middleware' => 'backend-auth',
        ], function () {
            require_once __DIR__ . '/Routes/backend.php';
        });
    }

    /**
     * Define the "api" routes for the module.
     * These routes are typically stateless.
     * @return void
     */
    protected function mapApiRoutes(): void
    {
        Route::group([
            'middleware' => 'api-sign',
            'prefix'     => 'api/web/area/v1',
        ], function () {
            require_once __DIR__ . '/Routes/api_v1.php';
        });
    }
}
