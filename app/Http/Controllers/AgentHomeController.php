<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentHomeController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $total_contracts = $user->contracts()->count();
        $recent_contracts = $user->contracts()->latest()->limit(5)->get();

        return view('agent.dashboard', compact('total_contracts','recent_contracts'));
    }
}
