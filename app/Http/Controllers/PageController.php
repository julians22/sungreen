<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function home()
    {
        $products = \App\Models\Product::with('category')->latest()->take(4)->get();
        $reviews = \App\Models\Review::where('is_active', true)->latest()->take(5)->get();
        $faqs = \App\Models\Faq::latest()->take(5)->get();

        return view('pages.home', compact('products', 'reviews', 'faqs'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function products()
    {
        $products = \App\Models\Product::with('category')->latest()->take(12)->get();
        return view('pages.products', compact('products'));
    }

    public function productDetail($slug)
    {
        $product = \App\Models\Product::where('slug', $slug)
        ->with('category', 'relatedProducts', 'media')
        ->firstOrFail();
        return view('pages.product-detail', compact('product'));
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

        return view('pages.gallery', compact('items'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function submitContactForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validatedData);

        return redirect()->route('contact')->with('success', 'Pesan Anda telah dikirim. Terima kasih!');
    }

}
