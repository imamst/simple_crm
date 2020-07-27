<?php

namespace App\Traits;

use App\Http\Requests\ContractFormRequest;

trait FileUploadTrait {

    public function getUploadedPath(ContractFormRequest $request)
    {
        $contract_path = null;

        if(isset($request->validated()['contract_file'])){
            $contract = $request->validated()['contract_file'];
            $ext = $contract->extension();
            $name = $request->contract_number.'-'.uniqid().'.'.$ext;
            $contract_path = $contract->storeAs('uploads/contracts', $name);
        }

        return $contract_path;
    }

}