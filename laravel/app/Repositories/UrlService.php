<?php 

namespace App\Repositories;
use App\Models\ShortnerUrl;
use Illuminate\Support\Str;

class UrlService {

    public function getAllUrl() {
        return ShortnerUrl::latest()->paginate(10);
    }

    public function create($data) {
        $shortUrl = $this->generateUniqueShortUrl();

        return ShortnerUrl::create([
            'original_url' => $data['original_url'],
            'short_url' => $shortUrl,
            'url_description' => $data['url_description'] ?? '',
        ]);
    }

    public function show($shortUrl) {
        $shortUrl->increment('visits_count');
        return $shortUrl->original_url;
    }

    public function update($data, $shortUrl) {
        $shortUrl->update([
            'original_url' => $data['original_url'],
            'url_description' => $data['url_description'] ?? '',
        ]);
        return $shortUrl;
    }

    public function delete($shortUrl) {
        $shortUrl->delete();
        return $shortUrl;
    }
    public function redirectToOriginalUrl(string $shortUrl) {
        $urlData = ShortnerUrl::where('short_url', $shortUrl)->first();
        $urlData->increment('visits_count');
        return $urlData->original_url;
    }

    public function generateUniqueShortUrl($length = 10)
    {
        $shortUrl = Str::random($length);
        $existingUrl = ShortnerUrl::where('short_url', $shortUrl)->first();
        return $shortUrl;
    }


}
