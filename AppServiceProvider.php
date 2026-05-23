<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
        // Auto-migrate on Vercel cold starts (ephemeral /tmp SQLite)
        if (env('VERCEL') && !Schema::hasTable('assignments')) {
            Artisan::call('migrate', ['--force' => true]);

            // Seed sample data so the demo isn't empty
            DB::table('assignments')->insert([
                [
                    'title' => 'Build Bootstrap Grid',
                    'subject' => 'Web Development',
                    'due_date' => '2026-10-15',
                    'status' => 'completed',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Laravel Controllers',
                    'subject' => 'Full Stack Dev',
                    'due_date' => '2026-11-01',
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Database Migrations',
                    'subject' => 'Database Systems',
                    'due_date' => '2026-11-10',
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
