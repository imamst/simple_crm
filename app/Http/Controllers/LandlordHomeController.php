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
        $user = Auth::user();

        $contracts = Contract::with(['landlord','tenant'])->whereNull('landlord_id')->orWhere('landlord_id',$user->id)->get();

        $landlord_contracts_id = $user->contracts()->get()->pluck('id');

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
