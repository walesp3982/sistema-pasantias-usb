<?php

namespace App\Providers;

use App\Repositories\DocumentRepository;
use App\Repositories\Interfaces\DocumentRepositoryInterface;
use App\Repositories\Interfaces\InternshipRepositoryInterface;
use App\Repositories\Interfaces\LocationRepositoryInterface;
use App\Repositories\Interfaces\PhoneRepositoryInterface;
use App\Repositories\Interfaces\PictureRepositoryInterface;
use App\Repositories\Interfaces\PostulationRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\InternshipRepository;
use App\Repositories\LocationRepository;
use App\Repositories\PhoneRepository;
use App\Repositories\PictureRepository;
use App\Repositories\PostulationRepository;
use App\Repositories\StudentRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->bind(
            StudentRepositoryInterface::class,
            StudentRepository::class
        );
        $this->app->bind(
            DocumentRepositoryInterface::class,
            DocumentRepository::class
        );
        $this->app->bind(
            PictureRepositoryInterface::class,
            PictureRepository::class
        );
        $this->app->bind(
            LocationRepositoryInterface::class,
            LocationRepository::class
        );
        $this->app->bind(
            InternshipRepositoryInterface::class,
            InternshipRepository::class
        );
        $this->app->bind(
            PostulationRepositoryInterface::class,
            PostulationRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
