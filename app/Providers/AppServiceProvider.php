<?php

namespace App\Providers;

use App\Models\Quote;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('quotes')) {
            $quotesCount = Quote::where('status', 'pending')->where('partner_id', 0)->count();
            $partnerQuotesCount = Quote::where('status', 'pending')->where('partner_id', '>', 0)->count();
            view()->share(['quotesCount' => $quotesCount, 'partnerQuotesCount' => $partnerQuotesCount]);
        }
    }
}
