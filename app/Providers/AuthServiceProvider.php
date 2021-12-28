<?php

namespace App\Providers;

use App\Models\Pengurus;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isStaff', function ($pengurus){
            try {
                return $pengurus->detailperan()->first()
                ->peran()->first()->peran == 'Staff';
            } catch (\Throwable $th) {
                return false;
            }
        });
        
        Gate::define('isGuru', function ($pengurus){
            try {
                return $pengurus->detailperan()->first()
                ->peran()->first()->peran == 'Guru';
            } catch (\Throwable $th) {
                return false;
            }
        });
        
        Gate::define('isSantri', function ($user){
            return $user->has_role == 'Santri';
        });

        //
    }
}
