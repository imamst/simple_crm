<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Agent;

class AgentController extends Controller
{

    public function index()
    {
        $landlord = Auth::user();
        $agents = $landlord->agents()->get();
        
        return view('agent.index', compact('agents'));
    }

    public function create()
    {
        return view('agent.create');
    }

    public function store(AgentFormRequest $request)
    {
        $data = $request->validated();

        // Agent::create([
        //     'national_id' => $data['national_id'],
        //     'landlord_national_id' => Auth::id(),
        //     'first_name' => $data['first_name'],
        //     'family_name' => $data['family_name'],
        //     'phone_number' => $data['phone_number'],
        //     'address' => $data['address'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password'])
        // ]);

        $this->sendRequest($data);

        // return redirect('agents')->with(['success' => 'Agent account successfully created']);
    }

    public function show(Agent $agent)
    {
        $recent_contracts = $agent->contracts()->latest()->limit(5)->get();

        return view('agent.show', compact('agent', 'recent_contracts'));
    }

    public function edit(Agent $agent)
    {
        return view('agent.edit', compact('agent'));
    }

    public function update(AgentFormRequest $request, Agent $agent)
    {
        $data = $request->validated();

        $agent->update([
            'national_id' => $data['national_id'],
            'landlord_national_id' => Auth::id(),
            'first_name' => $data['first_name'],
            'family_name' => $data['family_name'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect('agents')->with(['success' => 'Agent account successfully updated']);
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();

        return redirect('agents')->with(['success' => 'Agent account successfully deleted']);
    }

    public function sendRequest($data)
    {
        return $data;
        $landlord_name = Auth::user()->full_name;
        $data = array_merge($data, ['landlord_name' => $landlord_name]);

        $to_name = $data['first_name'].' bin '.$data['family_name'];
        $to_email = $data['email'];
            
        Mail::send('emails.agent-account-mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('[Agent Account Created]');
            // $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
        });
    }
}
