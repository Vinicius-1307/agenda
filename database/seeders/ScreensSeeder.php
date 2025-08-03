<?php

namespace Database\Seeders;

use App\Models\Screen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class ScreensSeeder extends Seeder
{
    /**
     * Run the screen seeder, this will create screens for all authenticated routes.
     */
    public function run(): void
    {
        $routes = Route::getRoutes();

        foreach ($routes as $route) {
            if (!in_array('auth', $route->gatherMiddleware())) {
                continue;
            }

            $name = $route->getName() ?? $route->uri();
            $slug = Str::slug($name);

            Screen::firstOrCreate([
                'slug' => $slug,
            ], [
                'name' => $name,
            ]);
        }
    }
}
