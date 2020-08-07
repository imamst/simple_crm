<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentHomeController extends Controller
{
    public function __invoke()
    {
        $agent = Auth::user();
        $total_contracts = $agent->contracts()->count();
        $recent_contracts = $agent->contracts()->latest()->limit(5)->get();

        return view('agent.dashboard', compact('total_contracts','recent_contracts'));
    }
}
