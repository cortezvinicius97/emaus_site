<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Blade::directive('verses', function ($expression) {
            return "<?php echo preg_replace(
                '/(\d+)(?=[A-ZÁÉÍÓÚÂÊÔÃÕÇÀa-záéíóúâêôãõçà\“‘\"“])/u',
                '<span class=\"verse-num\">\$1</span>',
                $expression
            ); ?>";
        });
    }
}
