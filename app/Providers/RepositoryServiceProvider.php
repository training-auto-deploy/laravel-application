<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\EloquentUserRepository;
use App\Repositories\Interfaces\UserRepository;
use App\Repositories\EloquentClassRepository;
use App\Repositories\Interfaces\ClassRepository;
use App\Repositories\EloquentTeacherRepository;
use App\Repositories\Interfaces\TeacherRepository;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * The repository mappings for the application.
     *
     * @var array
     */
    protected $repositories = [
        UserRepository::class => EloquentUserRepository::class,
        ClassRepository::class => EloquentClassRepository::class,
        TeacherRepository::class => EloquentTeacherRepository::class,
    ];

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $class) {
            $this->app->singleton($interface, $class);
        }
    }
}
