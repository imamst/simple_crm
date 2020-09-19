<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Contract;
use App\Tenant;
use App\User;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $table = $user->getTable();

        if($table == "agents")
        {
            return $this->getAgentDashboard($user);
        }
        elseif($table == "users")
        {
            return $this->getLandlordDashboard($user);
        }
    }

    public function getAgentDashboard(Agent $user)
    {
        $total_contracts = $user->contracts()->count();
        $recent_contracts = $user->contracts()->latest()->limit(5)->get();

        return view('agent.dashboard', compact('total_contracts','recent_contracts'));
    }

    public function getLandlordDashboard(User $user)
    {
        $contracts = $user->contracts()->with(['agent','tenant'])->get();

        $landlord_contracts_id = $user->contracts()->get()->pluck('id');

        $recent_tenants = Tenant::with(['contract'])
                                ->whereIn('contract_id', $landlord_contracts_id)
                                ->where('data_status',2)
                                ->latest()
                                ->limit(5)
                                ->get();

        $total_tenants = Tenant::whereIn('contract_id', $landlord_contracts_id)->where('data_status',2)->get()->count();

        return view('landlord.dashboard', compact('contracts','recent_tenants','total_tenants'));
    }
}
