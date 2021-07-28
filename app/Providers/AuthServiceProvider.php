<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Guest;
use App\Policies\EventPolicy;
use App\Policies\ArticlePolicy;
use App\Policies\ContactPolicy;
use App\Policies\GuestPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Event::class => EventPolicy::class, 
        Article::class => ArticlePolicy::class,
        Contact::class => ContactPolicy::class,
        Guest::class => GuestPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
