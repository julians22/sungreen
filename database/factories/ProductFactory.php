<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
     /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterMaking(function (Product $product) {
            //
        })->afterCreating(function (Product $product) {
            $queryUrl = "https://loremflickr.com/320/240/plants,garden,nature/all";

            // follow the redirect to get the actual image URL
            $image_url = get_headers($queryUrl, 1)['Location'] ?? $queryUrl;

            $baseUrl = "https://www.loremflickr.com";
            $imageUrl = $baseUrl . $image_url;

            echo "Fetching image from: $imageUrl\n";


            $product->addMediaFromUrl($imageUrl)
                ->toMediaCollection('thumbnail');
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
        $slug = \Str::slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'description' => $this->faker->paragraph(),
            'additional_info' => [
                'quantity' => $this->faker->paragraph(),
                'features' => $this->faker->paragraph(),
            ]
        ];
    }

    public function uncategorized(): static
    {
        return $this->state(fn() => ['category_id' => \App\Models\ProductCategory::where('name', 'Uncategorized')->first()->id]);
    }
}
