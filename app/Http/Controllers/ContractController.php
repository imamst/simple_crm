<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Contract;
use App\Tenant;
use App\ContractFile;
use App\Http\Requests\ContractFormRequest;
use App\Traits\FileUploadTrait;
use App\Traits\RandomStringTrait;

class ContractController extends Controller
{

    use FileUploadTrait, RandomStringTrait;

    public function index()
    {
        $contracts = Auth::user()->contracts;

        return view('contract.index', compact('contracts'));
    }

    public function create()
    {
        return view('contract.create');
    }

    public function store(ContractFormRequest $request)
    {
        $data = $request->validated();

        $contract = Contract::create([
            'agent_national_id' => Auth::id(),
            'landlord_national_id' => Auth::user()->landlord_national_id,
            'contract_number' => $data['contract_number'],
            'rent_duration' => $data['rent_duration_number'].' '.$data['rent_duration_period'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'payment_term' => $data['payment_term'],
        ]);

        $this->storeTenant($data, $contract);

        if(isset($data['contract_file']))
        {
            $this->storeContractFile($data['contract_file'], $contract);
        }

        $this->sendNewContractNotification($data);

        return redirect('contracts')->with(['success' => 'Contract data successfully added']);
    }

    public function storeTenant($data, Contract $contract)
    {
        $token = $this->generateToken(16);

        $contract->tenant()->create([
            'first_name' => $data['tenant_first_name'],
            'family_name' => $data['tenant_family_name'],
            'email' => $data['tenant_email'],
            'filling_form_token' => $token
        ]);
    }
    
    public function storeContractFile($contract_files, Contract $contract)
    {
        foreach($contract_files as $file)
        {
            $ext = $file->extension();
            $original_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $name = $original_name.'-'.uniqid().'.'.$ext;
            $path = $file->storeAs('uploads/contracts', $name);

            $contract->contractFiles()->create([
                'name' => $original_name,
                'file_path' => $path
            ]);
        }
    }

    public function show(Contract $contract)
    {
        return view('contract.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
        return view('contract.edit', compact('contract'));
    }

    public function update(ContractFormRequest $request, Contract $contract)
    {
        $data = $request->validated();

        if(isset($data['contract_file']))
        {
            $this->destroyContractFile($contract);
            $this->storeContractFile($data['contract_file'], $contract);
        }

        $contract->update([
            'contract_number' => $data['contract_number'],
            'rent_duration' => $data['rent_duration_number'].' '.$data['rent_duration_period'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'payment_term' => $data['payment_term'],
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
        $this->destroyContractFile($contract);
        $contract->delete();

        return redirect('contracts')->with(['success' => 'Contract data successfully deleted']);
    }

    public function destroyContractFile(Contract $contract)
    {
        $contract_files = $contract->contractFiles;
        $contract_files_path = $contract_files->pluck('file_path')->toArray();
        Storage::delete(array_filter($contract_files_path));

        ContractFile::whereIn('id', $contract_files->pluck('id')->toArray())->delete();
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
