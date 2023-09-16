<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortnerUrlRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\ShortnerUrl;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ShortnerUrlController extends Controller
{

    public function index() : JsonResponse
    {
        $urls = ShortnerUrl::latest()->paginate(5);

        return response()->json([
            'status' => 'success',
            'message' => 'Short URLs retrieved successfully',
            'data' => $urls,
        ], Response::HTTP_OK);
    }

    public function store(ShortnerUrlRequest $request):JsonResponse
    {
        $shortUrl = $this->generateUniqueShortUrl();

        $shortnerUrl = ShortnerUrl::create([
            'original_url' => $request->get('original_url'),
            'url_description' => $request->get('url_description'),
            'short_url' => $shortUrl,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Short URL created successfully',
            'data' => $shortnerUrl,
        ], Response::HTTP_CREATED); 
    }

    public function generateUniqueShortUrl($length = 10)
    {
        $shortUrl = Str::random($length);
        $existingUrl = ShortnerUrl::where('short_url', $shortUrl)->first();
        return $shortUrl;
    }

    public function show(ShortnerUrl $shortnerUrl):JsonResponse
    {
        $shortnerUrl->increment('visits_count');

        return response()->json([
            'status' => 'success',
            'message' => 'Short URL visited successfully',
            'data' => $shortnerUrl->original_url,
        ], Response::HTTP_OK);
    }

}
