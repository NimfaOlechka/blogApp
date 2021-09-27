<?php
namespace App\Services;
use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements INewsletter
{

    /* public function __construct(protected ApiClient $client, protected string $foo)
    {

    } */
    public function __construct(protected ApiClient $client)
    {

    }

    public function subcribe(string $email, string $list = null)
    {
        $list_id ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($list_id, [
            "email_address" => $email,
            "status" => "subscribed"       
            
        ]);
    }    
}