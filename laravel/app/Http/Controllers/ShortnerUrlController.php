<?php

namespace App\Http\Controllers;

use App\Models\ShortnerUrl;
use Illuminate\Support\Str;
use App\Repositories\UrlService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShortnerUrlRequest;

class ShortnerUrlController extends Controller
{

    public function __construct(public UrlService $urlService){}


    public function index() : JsonResponse
    {   
        $urls = $this->urlService->getAllUrl();

        return response()->json([
            'status' => 'success',
            'message' => 'URL fetched successfully',
            'data' => $urls,
        ], Response::HTTP_OK);
    }

    public function store(ShortnerUrlRequest $request):JsonResponse
    {
        $url = $this->urlService->create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Short URL created successfully',
            'data' => $url,
        ], Response::HTTP_CREATED);
    }

    public function show(ShortnerUrl $shortnerUrl):JsonResponse
    {
        $shortUrl = $this->urlService->show($shortnerUrl);
        return response()->json([
            'status' => 'success',
            'message' => 'Short URL visited successfully',
            'data' => $shortUrl,
        ], Response::HTTP_OK);
    }

    public function update(ShortnerUrlRequest $request, ShortnerUrl $shortnerUrl):JsonResponse
    {
        $shortUrl = $this->urlService->update($request->all(), $shortnerUrl);

        return response()->json([
            'status' => 'success',
            'message' => 'URL updated successfully',
            'data' => $shortUrl,
        ], Response::HTTP_OK);
    }

    public function destroy(ShortnerUrl $shortnerUrl):JsonResponse
    {
        $shortUrl = $this->urlService->delete($shortnerUrl);

        return response()->json([
            'status' => 'success',
            'message' => 'URL deleted successfully',
            'data' => $shortUrl,
        ], Response::HTTP_OK);
    }

    public function redirect(string $shortUrl):JsonResponse
    {
        $url = $this->urlService->redirectToOriginalUrl($shortUrl);

        return response()->json([
            'status' => 'success',
            'message' => 'URL fetched successfully',
            'data' => $url,
        ], Response::HTTP_OK);
    }

}
