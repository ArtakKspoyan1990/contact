<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use LaravelQRCode\Facades\QRCode;

class CompanyContactController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth:company_user');
     }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        dd(5);
        $items = CompanyUser::query()->paginate(5);
        return view('pages.dashboard.companies.index', compact('items'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $rules = [
            'status' => 'required',
            'role' => 'required',
            'name' => 'required|unique:company_users,name',
            'password' => 'required|min:8',

        ];
        $trans = [
            'status.required' => __('This field is required.'),
            'role.required' => __('This field is required.'),
            'name.required' => __('This field is required.'),
            'password.required' => __('This field is required.'),
            'password.min' => __('Min size max be 8.'),
        ];

        $v = Validator::make($request->all(), $rules, $trans);
        if ( $v->fails() ) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $item = new CompanyUser();
        $item->security_key = Str::random(32);
        $item->status = $request->status;
        $item->role = $request->role;
        $item->name = $request->name;
        $item->password = Hash::make($request->password);
        $item->save();
        $item_id = $item->id;

        $body = null;
        if($item->role == 1) {
            $body =  env('APP_URL'). '/big-company/' .$item->security_key;
        }elseif ($item->role == 2){
            $body = env('APP_URL'). '/company/' .$item->security_key;
        }else {
            $body = env('APP_URL'). '/individual/' .$item->security_key;
        }

        $qr_path = base_path() . '/public/uploads/companies/qrs/' .  $item_id;

        if ( !is_dir($qr_path) ) {
            mkdir($qr_path, 0755, TRUE);
        }

        QRCode::text($body)->setSize(20)->setMargin(3)->setOutfile($qr_path.'/qr.png')->png();
        return redirect()->route('admin.companies')->with('added', __('Company created successfully.'));
    }



}
