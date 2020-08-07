<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

class AgentLoginController extends LoginController
{
    protected $redirectTo = '/dashboard/agent';

    public function __construct()
    {
        $this->middleware('guest:agent')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.agent-login');
    }

    public function username()
    {
        return 'email';
    }

    protected function guard()
    {
        return Auth::guard('agent');
    }
}
