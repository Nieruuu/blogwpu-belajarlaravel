<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
            'color' => 'bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded dark:bg-blue-200 dark:text-blue-800 hover:bg-blue-200 hover:text-blue-900'
        ]);
        Category::factory()->create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color' => 'bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded dark:bg-green-200 dark:text-green-800 hover:bg-green-200 hover:text-green-900'
        ]);
        Category::factory()->create([
            'name' => 'Mobile Development',
            'slug' => 'mobile-development',
            'color' => 'bg-yellow-100 text-yellow-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded dark:bg-yellow-200 dark:text-yellow-800 hover:bg-yellow-200 hover:text-yellow-900'
        ]);
    }
}
