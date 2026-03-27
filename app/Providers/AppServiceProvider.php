<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(! $this->app->isProduction());

        // Auto-create storage link if not exists (for Laravel Cloud)
        $this->createStorageLink();
    }

    /**
     * Create storage symlink if it doesn't exist
     */
    private function createStorageLink(): void
    {
        $link = public_path('storage');
        $target = storage_path('app/public');

        // Check if link exists and is valid
        if (!file_exists($link) || !is_link($link)) {
            // Remove if it's a regular file or directory
            if (file_exists($link)) {
                if (is_dir($link)) {
                    rename($link, $link . '_backup_' . time());
                } else {
                    unlink($link);
                }
            }

            // Create symlink
            if (function_exists('symlink') && file_exists($target)) {
                @symlink($target, $link);
            }
        }
    }
}
