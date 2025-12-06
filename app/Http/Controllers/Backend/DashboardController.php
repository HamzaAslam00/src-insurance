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
            $clientsCount = Client::where('status', 'active')->count();
            $activeCount = Policy::where('status', 'active')->count();
            $expiredCount = Policy::where('status', 'expired')->count();
            $cancelledCount = Policy::where('status', 'cancelled')->count();
            return view('backend.dashboard', compact('clientsCount', 'activeCount', 'expiredCount', 'cancelledCount'));
        } elseif (auth()->user()->user_type == 'partner') {
            $clientsCount = Client::where('status', 'active')->where('partner_id', auth()->user()->id)->count();
            $clientsIds = Client::where('status', 'active')->where('partner_id', auth()->user()->id)->pluck('id')->toArray();
            $activeCount = Policy::where('status', 'active')->whereIn('client_id', $clientsIds)->count();
            $expiredCount = Policy::where('status', 'expired')->whereIn('client_id', $clientsIds)->count();
            $cancelledCount = Policy::where('status', 'cancelled')->whereIn('client_id', $clientsIds)->count();
            return view('backend.dashboard', compact('clientsCount', 'activeCount', 'expiredCount', 'cancelledCount'));
        } else {
            $client = Client::where('status', 'active')->where('client_email', auth()->user()->email)->first();
            if ($client) {
                return redirect()->route('clients.edit', $client->id);
            }
            return redirect()->back()->withErrors(['error' => 'These credentials do not match our records.']);
        }
    }
}
