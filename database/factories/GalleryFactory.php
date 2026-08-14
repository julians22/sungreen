<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Gallery>
 */
class GalleryFactory extends Factory
{

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterMaking(function (Gallery $gallery) {
            //
        })->afterCreating(function (Gallery $gallery) {

            // add up to 5 images to the gallery
            $imageCount = rand(1, 5);

            $queryUrl = "https://loremflickr.com/320/240/nature,landscape,animals/all";

            for ($i = 0; $i < $imageCount; $i++) {
                // follow the redirect to get the actual image URL
                $image_url = get_headers($queryUrl, 1)['Location'] ?? $queryUrl;

                $baseUrl = "https://www.loremflickr.com";
                $imageUrl = $baseUrl . $image_url;

                echo "Fetching image from: $imageUrl\n";

                $gallery->addMediaFromUrl($imageUrl)
                    ->toMediaCollection('images');
            }
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence(3);
        $slug = Str::slug($name);

        return [
            'title' => $name,
            'slug' => $slug,
            'description' => $this->faker->paragraph(),
        ];
    }
}
