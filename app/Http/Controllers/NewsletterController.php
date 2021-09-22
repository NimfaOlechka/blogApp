<?php

namespace App\Http\Controllers;

use App\Services\INewsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    
    public function __invoke(INewsletter $newsletter)
    {
        //ddd($newsletter);
        request()->validate(['email' => 'required|email']);
         
         try{
             /* $newsletter = new Newsletter();
             $newsletter->subcribe(request('email')); */
            // (new Newsletter())->subcribe(request('email'));
            
            $newsletter->subcribe(request('email'));
            
         } catch (\Exception $e){
             ddd($e);
             throw ValidationException::withMessages([
                 'email' => 'We are sorry, try again with other email'
             ]);        
         }       
     
         return redirect('/')
                ->with('success', 'You are now signed up for our newsletter');
     }
}
