<?php

namespace App\Providers;

use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryEloquent;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryEloquent;
use App\Services\Order\OrderService;
use App\Services\Order\OrderServiceImpl;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceImpl;
use Illuminate\Support\ServiceProvider;

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
        // Repositories
        $this->app->bind(OrderRepository::class, OrderRepositoryEloquent::class);
        $this->app->bind(ProductRepository::class, ProductRepositoryEloquent::class);

        // Services
        $this->app->bind(OrderService::class, OrderServiceImpl::class);
        $this->app->bind(ProductService::class, ProductServiceImpl::class);
    }
}
