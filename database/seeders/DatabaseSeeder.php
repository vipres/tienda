<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('image');
        Storage::makeDirectory('image');
        $this->call(CategorySeeder::class);
        Category::factory(10)->create();
        Provider::factory(20)->create();
        $this->call(ProductSeeder::class);
    }
}
