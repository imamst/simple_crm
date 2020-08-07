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

        $contracts = Contract::with(['landlord','tenant'])->whereNull('landlord_national_id')->orWhere('landlord_national_id', $landlord->national_id)->get();

        $landlord_contracts_id = $landlord->contracts()->get()->pluck('id');

        $recent_tenants = Tenant::with(['contract'])
                                ->whereIn('id', $landlord_contracts_id)
                                ->whereNotNull('income')
                                ->latest()
                                ->limit(5)
                                ->get();

        $total_tenants = Tenant::whereIn('id', $landlord_contracts_id)->whereNotNull('income')->get()->count();

        return view('landlord.dashboard', compact('contracts','recent_tenants','total_tenants'));
    }
}
