<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalApiService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://spstaging.ncs.gov.in/_vti_bin/NCSPartners/NCSPServiceExternal.svc/';
        // https://spstaging.ncs.gov.in/_vti_bin/NCSPartners/NCSPServiceExternal.svc/AuthenticateUser
    }

    public function authenticateUser($username, $password)
    {
        $response = Http::post($this->baseUrl . 'AuthenticateUser', [
            'strUserName' => $username,
            'strPassword' => $password,
        ]);

        return $response->json();
    }
    public function fetchJobs()
    {
        $response = Http::get($this->baseUrl . 'PostNewJob');

        return $response->json();
    }
}