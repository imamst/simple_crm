<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TenantFormRequest;
use App\Traits\FileUploadTrait;
use App\Tenant;

class TenantController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $user = Auth::user();

        $landlord_contracts_id = $user->landlordContracts()->get()->pluck('id');
        $tenants = Tenant::with(['contract'])
                            ->whereIn('id', $landlord_contracts_id)
                            ->get();
        
        return view('tenant.index', compact('tenants'));
    }

    public function show(Tenant $tenant)
    {
        return view('tenant.show', compact('tenant'));
    }

    public function edit($token)
    {
        $tenant = Tenant::where('token',$token)->first();
        return view('tenant.edit', compact('tenant','token'));
    }

    public function update(TenantFormRequest $request, Tenant $tenant)
    {
        $data = $request->validated();
        $data['photo'] = $this->getPhotoUploadedPath($request);

        $tenant->update($data);

        return view('tenant.thanks');
    }

    public function reset(Tenant $tenant)
    {
        Storage::delete($tenant->photo);

        $tenant->update([
            'first_name' => null,
            'family_name' => null,
            'phone_number' => null,
            'address' => null,
            'profession' => null,
            'company' => null,
            'income' => null,
            'photo' => null,
        ]);

        return redirect('tenants')->with(['success' => 'Tenant\'s information successfully erased']);
    }

    public function sendRequest(Tenant $tenant)
    {

    }
}
