<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['site.blog.partials.nav-blog',
            '']
            ,'App\Http\ViewComposers\AsideComposer');

        View::composer(['site.home.partials.contentWorks','dashboard.dashboard'],
            'App\Http\ViewComposers\IndexWorksComposer');

        View::composer(['home.index.partials.contentArticles','dashboard.dashboard'],
            'App\Http\ViewComposers\IndexArticlesComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
