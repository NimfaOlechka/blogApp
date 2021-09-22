<?php

namespace App\Providers;

use App\Services\INewsletter;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

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
        //Model::unguard(); - disables mass-assignment restrictions
    }
}
