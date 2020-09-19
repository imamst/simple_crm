<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\Http\Requests\UserFormRequest;
use App\User;

class LandlordProfileController extends Controller
{
    public function show(User $landlord)
    {
        return view('landlord.profile.show', compact('landlord'));
    }

    public function edit(User $landlord)
    {
        return view('landlord.profile.edit', compact('landlord'));
    }

    public function update(UserFormRequest $request, User $landlord)
    {
        $data = array_filter($request->validated());
        
        if(isset($data['avatar']))
        {
            $avatar = $data['avatar'];
            $ext = $avatar->extension();
            $original_name = pathinfo($avatar->getClientOriginalName(), PATHINFO_FILENAME);
            $name = $original_name.'-'.uniqid().'.'.$ext;
            $path = $avatar->storeAs('uploads/avatar', $name);

            $data['avatar'] = $path;

            Storage::delete($landlord->avatar);
        }

        $landlord->update($data);

        return redirect()->route('profile',$landlord->national_id)->with(['success' => 'Profile successfully updated']);
    }
}
