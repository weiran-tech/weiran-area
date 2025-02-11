<?php

declare(strict_types = 1);

namespace Weiran\Area;

use Weiran\Area\Commands\InitCommand;
use Weiran\Area\Http\RouteServiceProvider;
use Weiran\Framework\Events\PoppyOptimized;
use Weiran\Framework\Exceptions\ModuleNotFoundException;
use Weiran\Framework\Support\WeiranServiceProvider;
use Weiran\MgrPage\Classes\Form;
use Weiran\MgrPage\Classes\Grid\Filter;

class ServiceProvider extends WeiranServiceProvider
{
    protected array $listens = [
        PoppyOptimized::class => [
            Listeners\PoppyOptimized\ClearCacheListener::class,
        ],
    ];

    /**
     * Bootstrap the module services.
     * @return void
     * @throws ModuleNotFoundException
     */
    public function boot()
    {
        parent::boot('poppy.area');
    }

    /**
     * Register the module services.
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->commands([
            InitCommand::class,
        ]);

        Form::extend('area', Classes\Form\Field\Area::class);
        Filter::extend('area', Classes\Grid\Filter\Area::class);
    }
}
