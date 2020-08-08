<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Contract;
use App\Tenant;
use App\User;

class LandlordHomeController extends Controller
{
    public function __invoke()
    {
        $landlord = Auth::user();

        $contracts = $landlord->contracts()->with(['agent','tenant'])->get();

        $landlord_contracts_id = $landlord->contracts()->get()->pluck('id');

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
