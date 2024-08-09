<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;

class CompanyLoginController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view('auth.company.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
         $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::guard('company_user')->attempt(['name' => $request->name, 'password' => $request->password])) {
//            $request->session()->regenerate();
            return redirect('/user/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
