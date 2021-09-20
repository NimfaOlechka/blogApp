<?php
namespace App\Services;
use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subcribe(string $email, string $list = null)
    {
        $list_id ??= config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember($list_id, [
            "email_address" => $email,
            "status" => "subscribed"       
            
        ]);
    }

    protected function client()
    {
        //$client = new ApiClient();

        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.server')
        ]);
    }
}