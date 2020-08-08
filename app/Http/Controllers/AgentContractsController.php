<?php

namespace App\Http\Controllers;

use App\Agent;

class AgentContractsController extends Controller
{
    public function __invoke(Agent $agent)
    {
        $contracts = $agent->contracts()->get();

        return view('agent.contract.index', compact('contracts', 'agent'));
    }
}
