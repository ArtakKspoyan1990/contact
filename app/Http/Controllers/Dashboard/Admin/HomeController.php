<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.dashboard.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        if($request->type == 'company') {
            Auth::guard('company_user')->logout();
            return redirect()->route('company.login');
        }
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
