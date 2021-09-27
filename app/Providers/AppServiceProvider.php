<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

use App\Services\{ INewsletter, MailchimpNewsletter};
use Illuminate\Support\Facades\Blade;
use MailchimpMarketing\ApiClient;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Binding the dependency that laravel can't resolve 
        /* app()->bind(Newsletter::class, function(){
            return new Newsletter(
                new ApiClient(),
                "bar"
            );
        }); */

        app()->bind(INewsletter::class, function(){
           
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => config('services.mailchimp.server')
            ]);
    
            return new MailchimpNewsletter($client);
        });
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard(); // disables mass-assignment restrictions
        Gate::define('admin', function(User $user)
        {
            return $user->username == 'OlechkaK';

        });

        Blade::if('admin', function(){
            return request()->user()?->can('admin');
        });
    }
}
