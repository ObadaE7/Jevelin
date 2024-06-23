<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'تكنولوجيا',
            'موضة',
            'الصحة و العافية',
            'يسافر',
            "الطعام والطبخ",
            "المنزل والحديقة",
            "الرياضة واللياقة البدنية",
            'الأعمال التجارية والمالية',
            'الفنون والترفيه',
            "العلم والطبيعة",
        ];

        $name = $this->faker->unique()->randomElement($categories);
        $slug = str()->slug($name);

        return [
            'name' => $name,
            'description' => fake()->text(),
            'slug' => $slug,
        ];
    }
}
