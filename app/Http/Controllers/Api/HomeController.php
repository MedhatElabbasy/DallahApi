<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * @OA\POST(
     *     path="/api/home",
     *     tags={"Home"},
     *     summary="Home",
     *     description="Login to system.",
     *     operationId="login",
     *     @OA\RequestBody(
     *         description="Pet object that needs to be added to the store",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *            @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="email",
     *                     description="User Email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="User password",
     *                     type="string"
     *                 ),
     *                 required={"email", "password"}
     *             )
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input"
     *     )
     * )
     */
    public function index(Request $request)
    {
        // Your API key
$apiKey = 'AIzaSyBtvWWX6uqQA_gw6mpxqAiAtG86fk0D_wA';

// API endpoint
$endpoint = 'https://generativelanguage.googleapis.com/v1beta3/models/text-bison-001:generateText';

// Request data
$data = [
    'prompt' => [
        'text' => 'If true, write true If not, type false Does the phrase &#39;Welcome&#39;; describe the meaning of &#39;Heallo&#39;?',
    ],
    'temperature' => 0.7,
    'top_k' => 40,
    'top_p' => 0.95,
    'candidate_count' => 1,
    'max_output_tokens' => 1024,
    'stop_sequences' => [],
    'safety_settings' => [
        ['category' => 'HARM_CATEGORY_DEROGATORY', 'threshold' => 'BLOCK_LOW_AND_ABOVE'],
        ['category' => 'HARM_CATEGORY_TOXICITY', 'threshold' => 'BLOCK_LOW_AND_ABOVE'],
        ['category' => 'HARM_CATEGORY_VIOLENCE', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'],
        ['category' => 'HARM_CATEGORY_SEXUAL', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'],
        ['category' => 'HARM_CATEGORY_MEDICAL', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'],
        ['category' => 'HARM_CATEGORY_DANGEROUS', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'],
    ],
];

// Make the HTTP request
$response = Http::withHeaders([
    'Content-Type' => 'application/json',
])->post("$endpoint?key=$apiKey", $data);

// Get the response body
$responseData = collect($response->json());
$responseValue = $responseData['candidates'];

// Handle the response as needed
dd($responseValue);

        return $this->respondWithSuccess([
            "key" => "Value"
        ]);
    }
}
