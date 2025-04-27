<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'nama_produk' => $this->faker->word(),
            'kategori' => $this->faker->word(),
            'harga' => $this->faker->randomFloat(2, 10000, 100000),
            'stok' => $this->faker->numberBetween(1, 100),
            'deskripsi' => $this->faker->sentence(),
            'tanggal_masuk' => $this->faker->date(),
        ];
    }
}
