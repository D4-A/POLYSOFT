<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('isAdmin', function($user) {
            $id = DB::table('fonctions')->where('name','LIKE','%admin%')->value('id');
             return $user->fonction_id == $id;
         });
         Gate::define('isDoctor', function($user) {
             $id = DB::table('fonctions')->where('name','LIKE','%doct%')->value('id');
             return $user->fonction_id == $id;
         });
         Gate::define('isInfir', function($user) {
             $id = DB::table('fonctions')->where('name','LIKE','%inf%')->value('id');
             return $user->fonction_id == $id;
         });
         Gate::define('isCassier', function($user) {
             $id = DB::table('fonctions')->where('name','LIKE','%cass%')->value('id');
             return $user->fonction_id == $id;
         });
         Gate::define('isRecept', function($user) {
             $id = DB::table('fonctions')->where('name','LIKE','%pt%')->value('id');
             return $user->fonction_id == $id;
         });
         Gate::define('isLaborant', function($user) {
             $id = DB::table('fonctions')->where('name','LIKE','%bor%')->value('id');
             return $user->fonction_id == $id;
         });
    }
}
