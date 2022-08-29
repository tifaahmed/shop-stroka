<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\EloquentRepositoryInterface;

use App\Repository\Eloquent\SliderRepository;
use App\Repository\SliderRepositoryInterface;

use App\Repository\Eloquent\ProductCategoryRepository;
use App\Repository\ProductCategoryRepositoryInterface;

use App\Repository\Eloquent\ProductSubCategoryRepository;
use App\Repository\ProductSubCategoryRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class,BaseRepository::class);
        $this->app->bind(SliderRepositoryInterface::class,SliderRepository::class);
        $this->app->bind(ProductCategoryRepositoryInterface::class,ProductCategoryRepository::class);
        $this->app->bind(ProductSubCategoryRepositoryInterface::class,ProductSubCategoryRepository::class);
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
