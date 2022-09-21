<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';
    protected $name_space_site    = 'App\\Http\\Controllers\\Site';
    protected $name_space_admin   = 'App\\Http\\Controllers\\Admin';
    protected $name_space_profile = 'App\\Http\\Controllers\\Profile';
    protected $name_space_mobile  = 'App\\Http\\Controllers\\Mobile';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            
            Route::middleware('api')
                ->prefix('api')
                ->namespace($this->name_space_admin)
                ->group(base_path('routes/api_dashboard.php'));

            Route::middleware('api')
            ->prefix('api')
            ->namespace($this->name_space_mobile)
            ->group(base_path('routes/api_mobile.php'));

            Route::middleware('web')
                ->namespace($this->name_space_site)
                ->group(base_path('routes/web_site.php'));
            
            Route::middleware('web')
                ->namespace($this->name_space_profile)
                ->group(base_path('routes/web_profile.php'));    
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
