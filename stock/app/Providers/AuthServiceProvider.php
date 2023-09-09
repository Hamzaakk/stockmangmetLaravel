<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Demande;
use App\Models\Employée;
use App\Models\Fornisseur;
use App\Models\Profile;
use App\Models\StockEnier;
use App\Policies\autorisation;
use App\Policies\RolePolicy;
use App\Policies\stockPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        StockEnier::class  => autorisation::class,
        Profile::class => autorisation::class,
        Employée::class  => autorisation::class,
        Fornisseur::class  => autorisation::class,
        Demande::class  => autorisation::class,



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
