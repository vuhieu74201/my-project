<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\CategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */

    public function boot()
    {
        //
    }
}
