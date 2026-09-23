<?php

namespace App\Providers;

use App\Models\Carousel;
use App\Models\Service;
use App\Policies\CarouselPolicy;
use App\Policies\ServicePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Policies\BlogPolicy;
use App\Policies\CommentPolicy;
use App\Models\Blog;
use App\Models\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Blog::class, BlogPolicy::class);
        Gate::policy(Comment::class, CommentPolicy::class);
        Gate::policy(Carousel::class, CarouselPolicy::class);
        Gate::policy(Service::class, ServicePolicy::class);
    }
}
