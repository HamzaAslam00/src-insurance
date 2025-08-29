<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Client;
use App\Models\Policy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        if (auth()->user()->user_type == 'admin') {
            $clientsCount = Client::count();
            $activeCount = Policy::where('status', 'active')->count();
            $expiredCount = Policy::where('status', 'expired')->count();
            $cancelledCount = Policy::where('status', 'cancelled')->count();
            return view('backend.dashboard', compact('clientsCount', 'activeCount', 'expiredCount', 'cancelledCount'));
        } else {
            $client = Client::where('client_email', auth()->user()->email)->first();
            return redirect()->route('clients.edit', $client->id);
        }

    }
}
