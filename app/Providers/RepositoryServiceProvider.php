<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\EloquentRepositoryInterface;

use App\Repository\Eloquent\SliderRepository;
use App\Repository\SliderRepositoryInterface;

use App\Repository\Eloquent\ProductCategoryRepository;
use App\Repository\ProductCategoryRepositoryInterface;

use App\Repository\Eloquent\ProductItemRepository;
use App\Repository\ProductItemRepositoryInterface;

use App\Repository\Eloquent\StoreRepository;
use App\Repository\StoreRepositoryInterface;


use App\Repository\Eloquent\UserRepository;
use App\Repository\UserRepositoryInterface;

use App\Repository\Eloquent\SiteSettingRepository;
use App\Repository\SiteSettingRepositoryInterface;

use App\Repository\Eloquent\CountryRepository;
use App\Repository\CountryRepositoryInterface;

use App\Repository\Eloquent\GovernmentRepository;
use App\Repository\GovernmentRepositoryInterface;

use App\Repository\Eloquent\CityRepository;
use App\Repository\CityRepositoryInterface;


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
        $this->app->bind(ProductItemRepositoryInterface::class,ProductItemRepository::class);

        $this->app->bind(StoreRepositoryInterface::class,StoreRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);

        $this->app->bind(SiteSettingRepositoryInterface::class,SiteSettingRepository::class);

        $this->app->bind(CountryRepositoryInterface::class,CountryRepository::class);
        $this->app->bind(GovernmentRepositoryInterface::class,GovernmentRepository::class);
        $this->app->bind(CityRepositoryInterface::class,CityRepository::class);
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
