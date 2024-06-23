<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = [
            "أخبار التكنولوجيا",
            "اتجاهات الموضة",
            "حقائق علمية",
            "الحياة الصحية",
            'نصائح سفر',
            "جمعة عشاق الطعام",
            'الحدائق',
            "تحفيز اللياقة البدنية",
            "نصائح الأعمال",
            'تعبير فني',
        ];

        $name = $this->faker->unique()->randomElement($tags);
        $slug = str()->slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
        ];
    }
}
