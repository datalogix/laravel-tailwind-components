<?php

namespace Datalogix\TailwindComponents\Tests;

use Datalogix\TailwindComponents\TailwindComponentsServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\BrowserKit\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        View::addLocation(__DIR__.'/Feature/views');
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application   $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('tailwind-components.themes.testing', []);
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            TailwindComponentsServiceProvider::class,
            LivewireServiceProvider::class,
        ];
    }

    /**
     * Register test route.
     *
     * @param  string  $uri
     * @param  callable|null  $post
     * @return self
     */
    protected function registerTestRoute($uri, callable $post = null)
    {
        Route::middleware('web')->group(function () use ($uri, $post) {
            Route::view($uri, $uri)->name($uri);

            if ($post) {
                Route::post($uri, $post);
            }
        });

        return $this;
    }
}
