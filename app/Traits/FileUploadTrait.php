<?php

namespace App\Traits;

use App\Http\Requests\ContractFormRequest;
use App\Http\Requests\TenantFormRequest;

trait FileUploadTrait {

    public function getContractUploadedPath(ContractFormRequest $request)
    {
        $path = null;

        if(isset($request->validated()['contract_file'])){
            $file = $request->validated()['contract_file'];
            $ext = $file->extension();
            $name = $request->contract_number.'-'.uniqid().'.'.$ext;
            $path = $file->storeAs('uploads/contracts', $name);
        }

        return $path;
    }

    public function getPhotoUploadedPath(TenantFormRequest $request)
    {
        $path = null;

        if(isset($request->validated()['photo'])){
            $file = $request->validated()['photo'];
            $ext = $file->extension();
            $name = $request->first_name.'-'.uniqid().'.'.$ext;
            $path = $file->storeAs('uploads/photos/', $name);
        }

        return $path;
    }

}