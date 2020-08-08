<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Contract;
use App\Tenant;
use App\Http\Requests\ContractFormRequest;
use App\Traits\FileUploadTrait;
use App\Traits\RandomStringTrait;

class ContractController extends Controller
{

    use FileUploadTrait, RandomStringTrait;

    public function index()
    {
        $contracts = Contract::with(['landlord','tenant'])->where('agent_national_id',Auth::id())->get();

        return view('contract.index', compact('contracts'));
    }

    public function create()
    {
        return view('contract.create');
    }

    public function store(ContractFormRequest $request)
    {
        $data = $request->validated();
        $contract_path = $this->getContractUploadedPath($request);

        $new_contract = Contract::create([
            'agent_national_id' => Auth::id(),
            'landlord_national_id' => Auth::user()->landlord_national_id,
            'contract_number' => $data['contract_number'],
            'rent_duration' => $data['rent_duration_number'].' '.$data['rent_duration_period'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'payment_term' => $data['payment_term'],
            'contract_file' => $contract_path,
        ]);

        $token = $this->generateToken(16);

        $new_contract->tenant()->create([
            'first_name' => $data['tenant_first_name'],
            'family_name' => $data['tenant_family_name'],
            'email' => $data['tenant_email'],
            'filling_form_token' => $token,
            'contract_id' => $new_contract->id,
        ]);

        $this->sendNewContractNotification($data);

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

        $contract->tenant()->update([
            'first_name' => $data['tenant_first_name'],
            'family_name' => $data['tenant_family_name'],
            'email' => $data['tenant_email'],
        ]);

        return redirect('contracts')->with(['success' => 'Contract data successfully updated']);
    }

    public function destroy(Contract $contract)
    {
        $contract_path = $contract->contract_file;
        Storage::delete($contract_path);
        $contract->delete();

        return redirect('contracts')->with(['success' => 'Contract data successfully deleted']);
    }

    public function sendNewContractNotification($data)
    {
        $agent = Auth::user();

        $agent_name = $agent->full_name;
        $data = array_merge($data, [
            'agent_name' => $agent_name, 
            'agent_email' => $agent->email
        ]);

        $to_name = $agent->landlord->full_name;
        $to_email = $agent->landlord->email;
            
        Mail::send('emails.contract-signed-mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('[New Contract Signed]');
        });
    }
}
