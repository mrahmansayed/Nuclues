<?php 

namespace Laramaster\Nuclues;

use Illuminate\Support\ServiceProvider;

class NucluesServiceProvider extends ServiceProvider
{
    public function boot()
    {
      	$this->loadRoutesFrom(__DIR__.'/routes/web.php');
      	 $this->loadViewsFrom(__DIR__.'/views', 'nuclues');
      	 $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

         $this->publishes([
              __DIR__.'/public' => public_path('/backend'),
              __DIR__.'/public/frontend' => public_path('/frontend'),
              __DIR__.'/config/nuclues.php' => config_path('nuclues.php'),
              __DIR__.'/views/backend/layouts/partials/sidebar.blade.php' => resource_path('views/nuclues/sidebar.blade.php'),
              __DIR__.'/views/admin/product' => resource_path('/views/nuclues/example'),
          ], 'public');

       //$this->app['router']->aliasMiddleware('my-package-middleware', \My\Package\Middleware::class);
       
        $this->mergeConfigFrom(
            __DIR__.'/config/nuclues.php', 'nuclues'
        );
           
    }

    public function register()
    {
       
    }
}
