<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class PageController extends Controller
{
     public function getSettings()
    {
        $currentRoute = request()->route()->getName();
        $slug = request()->route('slug');

        if ($slug) {
            $seoProduct = \App\Models\Product::where('slug', $slug)->first();

            if ($seoProduct) {
                return [
                    'meta_title' => $seoProduct->meta_title ?? 'Sungreen',
                    'meta_description' => $seoProduct->meta_description ?? null,
                    'meta_keywords' => $seoProduct->meta_keywords ?? null,
                ];
            }
        }  
        
        $seo = \App\Models\PageSettings::where('meta_key', $currentRoute)->first();

        if ($seo) {
            return [
                'meta_title' => $seo->meta_title ?? 'Sungreen',
                'meta_description' => $seo->meta_description ?? null,
                'meta_keywords' => $seo->meta_keywords ?? null,
            ];
        }

        return [
            'meta_title' => 'Sungreen',
            'meta_description' => null,
            'meta_keywords' => null,
        ];
    }



    public function home()
    {
        $products = \App\Models\Product::with('category')->orderBy('sort', 'asc')->take(4)->get();
        $reviews = \App\Models\Review::where('is_active', true)->latest()->take(5)->get();
        $faqs = \App\Models\Faq::latest()->take(5)->get();
        $slidersHome = \App\Models\SliderHome::latest()->get();
        $seo = $this->getSettings();

        // $firstItem = collect($slidersHome?->sliders ?? [])->first();
        // $positions = ['top_center', 'top_right', 'top_left', 'bottom_right', 'bottom_left', 'bottom_center'];
        // $desktopSliders = collect($positions)
        // ->mapWithKeys(fn ($pos) => [$pos => $firstItem[$pos] ?? null])
        // ->filter(fn ($block) => filled($block['title'] ?? null));
        //  $mobileSliders = $desktopSliders
        // ->sortBy(fn ($block) => (int) ($block['mobile'] ?? 99))
        // ->values();
        // $mainImages = $firstItem['image'] ?? null;
        return view('pages.home', compact(
            'products',
            'reviews',
            'faqs',
            'slidersHome',
            'seo'
        ));
    }

    public function about()
    {
        $seo = $this->getSettings();
        return view('pages.about', compact('seo'));
    }

    public function products()
    {
        $seo = $this->getSettings();
        $products = \App\Models\Product::with('category')->orderBy('sort', 'asc')->take(12)->get();
        return view('pages.products', compact('products','seo'));
    }

    public function productDetail($slug)
    {
        $seo = $this->getSettings();
        $product = \App\Models\Product::where('slug', $slug)
            ->with('category', 'relatedProducts', 'media')
            ->firstOrFail();
        return view('pages.product-detail', compact('product','seo'));
    }

    public function gallery()
    {
        $queryGallery = \App\Models\Gallery::with('media')->latest()->get();

        // Get all images from the media collection
        // $data = ['image_url' => :string, 'title' => :string, 'description' => :string];
        $galleryCollections = $queryGallery->map(function ($gallery) {
            $images = $gallery->getMedia('images')->map(function ($media) use ($gallery) {
                return [
                    'type' => 'image',
                    'image_url' => $media->getUrl(),
                    'title' => $gallery->title,
                    'description' => $gallery->description,

                ];
            });

            $videos = $gallery->getMedia('videos')->map(function ($media) use ($gallery) {
                return [
                    'type' => 'video',
                    'video_url' => $media->getUrl(),
                    'title' => $gallery->title,
                    'description' => $gallery->description,

                ];
            });

            return [
                'id' => $gallery->id,
                'title' => $gallery->title,
                'slug' => $gallery->slug,
                'description' => $gallery->description,
                'items' => $videos->concat($images),
            ];
        });

        // dd($galleryCollections);



        // Collect all images from all galleries into a single array
        $items = $galleryCollections->flatMap(function ($gallery) {
            return $gallery['items'];
        });

        $seo = $this->getSettings();

        return view('pages.gallery', compact('items','seo'));
    }

    public function contact()
    {
        $seo = $this->getSettings();
        return view('pages.contact', compact('seo'));
    }

    public function submitContactForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required|recaptchav3:contact,0.5',
        ]);

        Contact::create($validatedData);

        return redirect()->route('contact')->with('success', 'Pesan Anda telah dikirim. Terima kasih!');
    }

   
}
