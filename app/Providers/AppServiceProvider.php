<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interface\ProductServiceInterface;
use App\Services\ProductService;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{

     /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        ProductServiceInterface::class => ProductService::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(ProductService::class)
          ->needs(Model::class)
          ->give(function ($app) {
              return $app->make(Product::class);
          });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
