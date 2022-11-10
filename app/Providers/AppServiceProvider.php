<?php

namespace App\Providers;

use App\Models\BlogCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Nette\Utils\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('blogCategories',BlogCategory::where('status', 1)->get() );
//        View::composer('front.includes.header', function ($view){
//            $view->with('blogCategories' ,BlogCategory::where('status', 1)->get());
//        });

        \Illuminate\Pagination\Paginator::useBootstrapFive();
    }
}
