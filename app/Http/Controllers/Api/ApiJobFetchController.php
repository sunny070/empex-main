<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\Crypt;
use App\Services\ExternalApiService;

class ApiJobFetchController extends Controller
{
   
    public function authenticateUser(Request $request, ExternalApiService $apiService)
    {
        $encryptedUsername = env('ENCRYPTED_USERNAME');
        $encryptedPassword = env('ENCRYPTED_PASSWORD');

        $response = $apiService->authenticateUser($encryptedUsername, $encryptedPassword);

        return response()->json($response);

            //  $ncsAuthUser = json_decode($response->body(), true);

            // return $ncsAuthUser['AuthenticateUserResult']['Cookie'];
    }
    public function fetchJobs(ExternalApiService $apiService)
    {
        // Fetch job data from the external API
        $jobs = $apiService->fetchJobs();

        return view('web.jobs.index', compact('jobs'));
    }
    }

 
    
