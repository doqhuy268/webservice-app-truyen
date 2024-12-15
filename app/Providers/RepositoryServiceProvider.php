<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\BookRepositoryInterface;
use App\Repositories\BookRepository;
use App\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Đăng ký BookRepository
        $this->app->bind(
            BookRepositoryInterface::class,
            BookRepository::class
        );

        // Đăng ký CategoryRepository
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
    }
}
