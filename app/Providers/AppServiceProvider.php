<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;

use App\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;

use App\Interfaces\AuthorRepositoryInterface;
use App\Repositories\AuthorRepository;

use App\Interfaces\StoryRepositoryInterface;
use App\Repositories\StoryRepository;

use App\Interfaces\ChapterRepositoryInterface;
use App\Repositories\ChapterRepository;

use App\Interfaces\CommentRepositoryInterface;
use App\Repositories\CommentRepository;

use App\Interfaces\FavouriteRepositoryInterface;
use App\Repositories\FavouriteRepository;

use App\Repositories\HistoryRepository;
use App\Interfaces\HistoryRepositoryInterface;

use App\Repositories\SearchRepository;
use App\Interfaces\SearchRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
        $this->app->bind(StoryRepositoryInterface::class, StoryRepository::class);
        $this->app->bind(ChapterRepositoryInterface::class, ChapterRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(FavouriteRepositoryInterface::class, FavouriteRepository::class);
        $this->app->bind(HistoryRepositoryInterface::class, HistoryRepository::class);
        $this->app->bind(SearchRepositoryInterface::class, SearchRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
