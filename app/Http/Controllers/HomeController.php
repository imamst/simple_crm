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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $account_type_id = $user->accountType->id;

        if($account_type_id == 2)
        {
            return $this->getAgentDashboard($user);
        }
        elseif($account_type_id == 1)
        {
            return $this->getLandlordDashboard($user);
        }
    }

    public function getAgentDashboard(User $user)
    {
        $total_contracts = $user->agentContracts()->count();
        $recent_contracts = $user->agentContracts()->latest()->limit(5)->get();

        return view('agent.dashboard', compact('total_contracts','recent_contracts'));
    }

    public function getLandlordDashboard(User $user)
    {
        $contracts = Contract::with(['landlord','tenant'])->whereNull('landlord_id')->orWhere('landlord_id',$user->id)->get();
        $landlord_contracts_id = $user->landlordContracts()->get()->pluck('id');
        $recent_tenants = Tenant::with(['contract'])
                                ->whereIn('id', $landlord_contracts_id)
                                ->whereNotNull('first_name')
                                ->latest()
                                ->limit(5)
                                ->get();
        $total_tenants = Tenant::whereIn('id', $landlord_contracts_id)->whereNotNull('first_name')->get()->count();

        return view('landlord.dashboard', compact('contracts','recent_tenants','total_tenants'));
    }
}
