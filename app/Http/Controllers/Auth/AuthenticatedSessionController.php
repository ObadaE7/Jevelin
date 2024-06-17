<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public $guard = 'web';

    public function __construct(Request $request)
    {
        $request->is('admin/*') ? $this->guard = 'admin' : $this->guard;
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login', ['routePrefix' => $this->guard == 'admin' ? 'admin.' : '']);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate($this->guard);

        $request->session()->regenerate();

        return redirect()->intended($this->guard == 'admin' ? RouteServiceProvider::ADMIN_HOME : RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard($this->guard)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session()->flash('success', trans('auth.Logout'));

        return to_route($this->guard == 'admin' ? 'admin.login' : 'login');
    }
}
