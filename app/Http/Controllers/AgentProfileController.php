<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\Http\Requests\AgentFormRequest;
use App\Agent;

class AgentProfileController extends Controller
{
    public function show(Agent $agent)
    {
        return view('agent.profile.show', compact('agent'));
    }

    public function edit(Agent $agent)
    {
        return view('agent.profile.edit', compact('agent'));
    }

    public function update(AgentFormRequest $request, Agent $agent)
    {
        $data = array_filter($request->validated());

        if(isset($data['avatar']))
        {
            $file = $data['avatar'];
            $ext = $file->extension();
            $original_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $name = $original_name.'-'.uniqid().'.'.$ext;
            $path = $file->storeAs('uploads/avatar', $name);

            $data['avatar'] = $path;

            Storage::delete($agent->avatar);
        }

        $agent->update($data);

        return redirect()->route('profile.agent',$agent->national_id)->with(['success' => 'Profile successfully updated']);
    }
}
