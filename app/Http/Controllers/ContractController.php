<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Contract;
use App\Tenant;
use App\Http\Requests\ContractFormRequest;
use App\Traits\FileUploadTrait;

class ContractController extends Controller
{

    use FileUploadTrait;

    public function index()
    {
        $contracts = Contract::with(['landlord','tenant'])->get();

        return view('contract.index', compact('contracts'));
    }

    public function create()
    {
        return view('contract.create');
    }

    public function store(ContractFormRequest $request)
    {
        $agent_id = Auth::id();
        $data = $request->validated();
        $contract_path = $this->getContractUploadedPath($request);

        $new_contract = Contract::create([
            'agent_id' => Auth::id(),
            'contract_number' => $data['contract_number'],
            'rent_duration' => $data['rent_duration_number'].' '.$data['rent_duration_period'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'payment_term' => $data['payment_term'],
            'contract_file' => $contract_path,
        ]);

        $new_contract->tenant()->create([
            'email' => $data['tenant_email']
        ]);

        return redirect('contracts')->with(['success' => 'Contract data successfully added']);
    }

    // public function show(Contract $contract)
    // {
    //     return view('contract.show', compact('contract'));
    // }

    public function edit(Contract $contract)
    {
        return view('contract.edit', compact('contract'));
    }

    public function update(ContractFormRequest $request, Contract $contract)
    {
        $data = $request->validated();
        $contract_path = $contract->contract_file;

        if(isset($request->validated()['contract_file']))
        {
            Storage::delete($contract->contract_file);
            $contract_path = $this->getContractUploadedPath($request);
        }

        $contract->update([
            'contract_number' => $data['contract_number'],
            'rent_duration' => $data['rent_duration_number'].' '.$data['rent_duration_period'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'payment_term' => $data['payment_term'],
            'contract_file' => $contract_path,
        ]);

        $contract->tenant()->update(['email' => $data['tenant_email']]);

        return redirect('contracts')->with(['success' => 'Contract data successfully updated']);
    }

    public function destroy(Contract $contract)
    {
        $contract_path = $contract->contract_file;
        Storage::delete($contract_path);
        $contract->delete();

        return redirect('contracts')->with(['success' => 'Contract data successfully deleted']);
    }
}
