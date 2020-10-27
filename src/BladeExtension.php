<?php

namespace Datalogix\TailwindComponents;

use Illuminate\View\Compilers\BladeCompiler;

class BladeExtension
{
    /**
     * Register.
     *
     * @param  \Illuminate\View\Compilers\BladeCompiler  $compiler
     * @return void
     */
    public static function register(BladeCompiler $compiler)
    {
        $compiler->directive('theme', function ($theme) {
            return '<?php app(\Datalogix\TailwindComponents\ThemeBinder::class)->bind('.$theme.'); ?>';
        });

        $compiler->directive('endtheme', function () {
            return '<?php app(\Datalogix\TailwindComponents\ThemeBinder::class)->pop(); ?>';
        });

        $compiler->directive('bind', function ($bind) {
            return '<?php app(\Datalogix\TailwindComponents\FormDataBinder::class)->bind('.$bind.'); ?>';
        });

        $compiler->directive('endbind', function () {
            return '<?php app(\Datalogix\TailwindComponents\FormDataBinder::class)->pop(); ?>';
        });

        $compiler->directive('wire', function () {
            return '<?php app(\Datalogix\TailwindComponents\FormDataBinder::class)->wire(); ?>';
        });

        $compiler->directive('endwire', function () {
            return '<?php app(\Datalogix\TailwindComponents\FormDataBinder::class)->endWire(); ?>';
        });
    }
}
