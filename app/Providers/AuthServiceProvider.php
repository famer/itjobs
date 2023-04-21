<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Position;
use App\Models\Company;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('moderate', function (User $user) {
            return $user->type == 'admin' || $user->type == 'moderator';
        });

        Gate::define('moderate-companies', function (User $user) {
            return $user->type == 'admin' || $user->type == 'companies-moderator';
        });

        Gate::define('moderate-positions', function (User $user) {
            return $user->type == 'admin' || $user->type == 'positions-moderator';
        });

        Gate::define('create-company', function (User $user) {
            return $user->isAdmin() || $user->type == 'employer';
        });

        Gate::define('update-company', function (User $user, Company $company) {
            return $user->isAdmin() || ( $user->type == 'employer' && $company->user->id === $user->id);
        });

        Gate::define('create-position', function (User $user, Company $company) {
            return $user->isAdmin() || ( $user->type == 'employer' && $company->user->id === $user->id );
        });

        Gate::define('update-position', function (User $user, Position $position) {
            return $user->isAdmin() || ( $user->type == 'employer' && $position->company->user->id === $user->id);
        });

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address!', $url);
        });
    }
}
