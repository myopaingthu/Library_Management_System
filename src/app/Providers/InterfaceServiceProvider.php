<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\CategoryDaoInterface', 'App\Dao\CategoryDao');
        $this->app->bind('App\Contracts\Dao\AuthorDaoInterface', 'App\Dao\AuthorDao');
        $this->app->bind('App\Contracts\Dao\PublisherDaoInterface', 'App\Dao\PublisherDao');
        $this->app->bind('App\Contracts\Dao\UserDaoInterface', 'App\Dao\UserDao');
        $this->app->bind('App\Contracts\Dao\SettingDaoInterface', 'App\Dao\SettingDao');
        $this->app->bind('App\Contracts\Dao\AdminDaoInterface', 'App\Dao\AdminDao');
        $this->app->bind('App\Contracts\Dao\BookDaoInterface', 'App\Dao\BookDao');
        $this->app->bind('App\Contracts\Dao\IssueBookDaoInterface', 'App\Dao\IssueBookDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\CategoryServiceInterface', 'App\Services\CategoryService');
        $this->app->bind('App\Contracts\Services\AuthorServiceInterface', 'App\Services\AuthorService');
        $this->app->bind('App\Contracts\Services\PublisherServiceInterface', 'App\Services\PublisherService');
        $this->app->bind('App\Contracts\Services\UserServiceInterface', 'App\Services\UserService');
        $this->app->bind('App\Contracts\Services\SettingServiceInterface', 'App\Services\SettingService');
        $this->app->bind('App\Contracts\Services\AdminServiceInterface', 'App\Services\AdminService');
        $this->app->bind('App\Contracts\Services\AuthServiceInterface', 'App\Services\AuthService');
        $this->app->bind('App\Contracts\Services\BookServiceInterface', 'App\Services\BookService');
        $this->app->bind('App\Contracts\Services\IssueBookServiceInterface', 'App\Services\IssueBookService');
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
