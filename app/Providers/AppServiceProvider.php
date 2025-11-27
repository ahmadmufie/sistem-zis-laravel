<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate; // <--- WAJIB ADA: Agar fitur keamanan Gate berfungsi

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 1. Mengatur Pagination agar menggunakan style Bootstrap 5
        Paginator::useBootstrapFive();

        // 2. DEFINISI SATPAM (GATE)
        // Fungsi ini mengecek: "Apakah user yang sedang login punya role 'admin'?"
        Gate::define('admin', function($user) {
            // PERBAIKAN: Kita paksa jadi huruf kecil & hilangkan spasi
            // Jadi kalau di database tertulis 'ADMIN', 'Admin', atau 'admin ', tetap dianggap benar.
            return strtolower(trim($user->role)) == 'admin';
        });
    }
}