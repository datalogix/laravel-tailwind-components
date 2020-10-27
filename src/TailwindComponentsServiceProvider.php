<?php

namespace Datalogix\TailwindComponents;

use Illuminate\Contracts\Foundation\CachesConfiguration;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class TailwindComponentsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tailwind-components.php', 'tailwind-components');

        $this->app->singleton(FormDataBinder::class, function () {
            return new FormDataBinder;
        });

        $this->app->singleton(ThemeBinder::class, function () {
            return new ThemeBinder;
        });

        $this->app->bind(ThemeProvider::class, function () {
            return new ThemeProvider(config('tailwind-components.themes'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tailwind-components');

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../config/tailwind-components.php' => config_path('tailwind-components.php')], 'config');
            $this->publishes([__DIR__.'/../resources/views' => resource_path('views/vendor/tailwind-components')], 'views');
        }

        $this->callAfterResolving(BladeCompiler::class, function ($blade) {
            BladeExtension::register($blade);
        });

        $components = Collection::make(config('tailwind-components.components'))
            ->mapWithKeys(function ($component, $alias) {
                return Collection::make($component['aliases'] ?? [])
                    ->push($alias)
                    ->unique()
                    ->mapWithKeys(function ($value, $key) use ($component) {
                        return [$value => $component['class']];
                    })->toArray();
            })
            ->all();

        $this->loadViewComponentsAs(config('tailwind-components.prefix'), $components);
    }

    /**
     * Merge the given configuration with the existing configuration.
     *
     * @param  string  $path
     * @param  string  $key
     * @return void
     */
    protected function mergeConfigFrom($path, $key)
    {
        if (! ($this->app instanceof CachesConfiguration && $this->app->configurationIsCached())) {
            $config = $this->app->make('config');

            $config->set($key, $this->mergeConfigs(
                require $path, $config->get($key, [])
            ));
        }
    }

    /**
     * Merges the configs together and takes multi-dimensional arrays into account.
     *
     * @param  array  $original
     * @param  array  $merging
     * @return array
     */
    protected function mergeConfigs(array $original, array $merging)
    {
        $array = array_merge($original, $merging);

        foreach ($original as $key => $value) {
            if (! is_array($value)) {
                continue;
            }

            if (! Arr::exists($merging, $key)) {
                continue;
            }

            // @codeCoverageIgnoreStart
            if (is_numeric($key)) {
                continue;
            }

            $array[$key] = $this->mergeConfigs($value, $merging[$key]);
            // @codeCoverageIgnoreEnd
        }

        return $array;
    }
}
