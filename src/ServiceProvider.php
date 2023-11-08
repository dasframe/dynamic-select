<?php

namespace Tresdstudioweb\DynamicSelect;

use Statamic\Providers\AddonServiceProvider;
use Tresdstudioweb\DynamicSelect\Fieldtypes\DynamicSelectFieldtype;

class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        // 'cp' => $this->basePath('routes/cp.php'),
        'cp' => __DIR__ . '/../routes/cp.php',
    ];

    protected $fieldtypes = [
        DynamicSelectFieldtype::class,
    ];

    protected $vite = [
        'input' => [
            'resources/js/addon.js',
        ],
        'publicDirectory' => 'resources/js',
    ];


    public function bootAddon()
    {
        DynamicSelectFieldtype::register();
    }

    public function bootPublishables() : self
    {
        $this->loadTranslationsFrom(
            $this->basePath('resources/lang'),
            'dynamic-select'
        );

        $this->publishes([
            $this->basePath('resources/lang') => resource_path('lang/vendor/dynamic-select ')
        ], 'dynamic-select-translations');

        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'justbetter-postcodeservice');

        // $this->publishes([
        //     __DIR__.'/../resources/views' => resource_path('views/vendor/justbetter-postcodeservice'),
        // ], 'views');


        // $this->publishes([
        //     __DIR__.'/../config/justbetter-postcodeservice.php' => config_path('justbetter-postcodeservice.php'),
        // ], 'config');

        return $this;
    }

    public function basePath($path = '')
    {
        return __DIR__.'/../'.$path;
    }

}
