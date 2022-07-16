<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use DB;

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
        $background=DB::table('backgrounds')->get();
        $unitKerja=DB::table('table_unit_kerja')->get();
        View::share(['unitKerja' => $unitKerja, 'background' => $background]);
    }
}
