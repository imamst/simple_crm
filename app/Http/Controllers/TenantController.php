<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\TenantFormRequest;
use App\Traits\FileUploadTrait;
use App\Tenant;

class TenantController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $user = Auth::user();

        $landlord_contracts_id = $user->contracts()->get()->pluck('id');
        $tenants = Tenant::with(['contract'])
                            ->whereIn('contract_id', $landlord_contracts_id)
                            ->get();
        
        return view('tenant.index', compact('tenants'));
    }

    public function show(Tenant $tenant)
    {
        return view('tenant.show', compact('tenant'));
    }

    public function edit($token)
    {
        $tenant = Tenant::where('filling_form_token',$token)->firstOrFail();
        return view('tenant.edit', compact('tenant','token'));
    }

    public function update(TenantFormRequest $request, Tenant $tenant)
    {
        $data = $request->validated();
        $data['photo'] = $this->getPhotoUploadedPath($request);
        $data = array_merge($data, ['data_status' => 2]);

        $tenant->update($data);

        return view('tenant.thanks');
    }

    public function sendRequest(Tenant $tenant)
    {
        $landlord_id = Auth::id();

        $to_name = "Tenant";
        $to_email = $tenant->email;
        $data = array("token" => $tenant->filling_form_token);
            
        Mail::send('emails.data-request-mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('[Customer Information Request]');
            // $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
        });

        $tenant->update(['data_status' => 1]);

        return redirect('dashboard')->with(['success' => 'Customer information request successfully sent']);
    }
}
