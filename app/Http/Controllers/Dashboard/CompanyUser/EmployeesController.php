<?php

namespace App\Http\Controllers\Dashboard\CompanyUser;

use App\Http\Controllers\Controller;
use App\Models\CompanyContact;
use App\Models\CompanyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use LaravelQRCode\Facades\QRCode;

class EmployeesController extends Controller
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
        $userId = Auth::guard('company_user')->id();
        $items = CompanyUser::query()
            ->where('parent_id', '=', $userId)
            ->where('role', '=', 3)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('pages.dashboard.user.employees.index', compact('items'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function add()
    {
        return view('pages.dashboard.user.employees.add');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'status' => 'required',
            'name' => 'required|unique:company_users,name',
            'password' => 'required|min:8',

        ];
        $trans = [
            'status.required' => __('This field is required.'),
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
        $item->role = 3;
        $item->name = $request->name;
        $item->parent_id = Auth::guard('company_user')->id();
        $item->password = Hash::make($request->password);
        $item->save();
        $item_id = $item->id;

        $body = env('APP_URL'). '/individual/' .$item->security_key;
        $qr_path = base_path() . '/public/uploads/companies/qrs/' .  $item_id;

        if ( !is_dir($qr_path) ) {
            mkdir($qr_path, 0755, TRUE);
        }

        QRCode::text($body)->setSize(20)->setMargin(3)->setOutfile($qr_path.'/qr.png')->png();
        return redirect()->route('company.employees')->with('success', __('Employee created successfully.'));
    }



    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $authId = Auth::guard('company_user')->id();
        $user =  CompanyUser::query()->where('id', '=', $id)
            ->where('parent_id', '=', $authId)
            ->where('role', '=', 3)
            ->first();
        if( !$user) {
            abort(404);
        }
        $contact =  CompanyContact::query()->where('company_user_id', '=', $user->id)->first();
        return view('pages.dashboard.user.employees.edit', compact('user', 'contact'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $authId = Auth::guard('company_user')->id();
        $rules = [
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sms' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'location' => 'nullable|string|max:255',
            'whats_app' => 'nullable|string|max:255',
            'viber' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'messenger' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'tik_tok' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'disconts' => 'nullable|url|max:255',
            'bg_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
            'id' => 'required',
        ];



        $trans = [
            'id.required' => __('This field is required.'),
            'position.required' => __('This field is required.'),
            'full_name.required' => __('This field is required.'),
            'phone.required' => __('This field is required.'),
            'email.required' => __('This field is required.'),
            'slug.required' => __('This field is required.'),
            'image.image' => __('Please upload a valid image.'),
            'image.max' => __('max_size_error'),
            'bg_image.image' => __('Please upload a valid image.'),
            'bg_image.max' => __('max_size_error'),
            'logo.image' => __('Please upload a valid image.'),
            'logo.max' => __('max_size_error'),
        ];


        $v = Validator::make($request->all(), $rules, $trans);

        if ( $v->fails() ) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $user = CompanyUser::query()
            ->where('id', '=', $request->id)
            ->where('parent_id', '=', $authId)
            ->where('role', '=', 3)->first();

        if(!$user) {
            abort(404);
        }


        $companyContact = CompanyContact::query()->where('company_user_id', '=', $user->id)->first();
        if(! $companyContact) {
            $companyContact = new CompanyContact();
            $companyContact->company_user_id =  $user->id;
        }

        $companyContact->full_name=  $request->full_name;
        $companyContact->phone =  $request->phone;
        $companyContact->email =  $request->email;
        $companyContact->sms =  $request->sms;
        $companyContact->website =  $request->website;
        $companyContact->location =  $request->location;
        $companyContact->whats_app =  $request->whats_app;
        $companyContact->viber =  $request->viber;
        $companyContact->telegram =  $request->telegram;
        $companyContact->facebook =  $request->facebook;
        $companyContact->messenger =  $request->messenger;
        $companyContact->instagram =  $request->instagram;
        $companyContact->tik_tok=  $request->tik_tok;
        $companyContact->youtube =  $request->youtube;
        $companyContact->disconts =  $request->disconts;
        $companyContact->position =  $request->position;
        $companyContact->address =  $request->address;
        $companyContact->latitude =  $request->latitude;
        $companyContact->longitude =  $request->longitude;
        $companyContact->save();


        if ( $file = $request->file('image') ) {
            $file_path = base_path() . '/public/uploads/company-contact/' . $companyContact->id;
            if ( !is_dir($file_path) ) {
                mkdir($file_path, 0755, TRUE);
            }
            $old_image_name = $companyContact->img_name;
            $ext = $file->getClientOriginalExtension();
            $image_name = 'cont-' . $companyContact->id. '-' . date('YmdHis') . '.' . $ext;
            $is_uploaded = $file->move($file_path, $image_name);
            if ( $is_uploaded ) {
                $companyContact->img_name = $image_name;
                $companyContact->save();
                if ( is_file($file_path . '/' . $old_image_name) ) {
                    unlink($file_path . '/' . $old_image_name);
                }
            }
        }

        if ( $file = $request->file('bg_image') ) {
            $file_path = base_path() . '/public/uploads/company-contact/' . $companyContact->id;
            if ( !is_dir($file_path) ) {
                mkdir($file_path, 0755, TRUE);
            }
            $old_bg_image_name = $companyContact->bg_img_name;
            $ext = $file->getClientOriginalExtension();
            $image_name = 'cont-bg-' . $companyContact->id . '-' . date('YmdHis') . '.' . $ext;
            $is_uploaded = $file->move($file_path, $image_name);
            if ( $is_uploaded ) {
                $companyContact->bg_img_name = $image_name;
                $companyContact->save();
                if ( is_file($file_path . '/' . $old_bg_image_name) ) {
                    unlink($file_path . '/' . $old_bg_image_name);
                }
            }
        }

        if ( $file = $request->file('logo') ) {
            $file_path = base_path() . '/public/uploads/company-contact/' . $companyContact->id;
            if ( !is_dir($file_path) ) {
                mkdir($file_path, 0755, TRUE);
            }
            $old_image_name = $companyContact->logo_name;
            $ext = $file->getClientOriginalExtension();
            $image_name = 'cont-logo-' . $companyContact->id . '-' . date('YmdHis') . '.' . $ext;
            $is_uploaded = $file->move($file_path, $image_name);
            if ( $is_uploaded ) {
                $companyContact->logo_name = $image_name;
                $companyContact->save();
                if ( is_file($file_path . '/' . $old_image_name) ) {
                    unlink($file_path . '/' . $old_image_name);
                }
            }
        }

        return redirect()->back()->with("success", __("Employee Contact changed successfully."));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $authId = Auth::guard('company_user')->id();
        $rules = [
            'id' => 'required',
            'password' => 'required|min:8',

        ];
        $trans = [
            'id.required' => __('This field is required.'),
            'password.required' => __('This field is required.'),
            'password.min' => __('Min size max be 8.'),
        ];

        $v = Validator::make($request->all(), $rules, $trans);
        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }


        $user = CompanyUser::query()->where('parent_id', '=', $authId)
            ->where('id', '=', $request->id)
            ->where('role', '=', 3)->first();

        if(!$user) {
            abort(404);
        }


        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with("success", __("Password changed successfully."));
    }



    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function toggle($id, $status)
    {
        $authId = Auth::guard('company_user')->id();
        $user = CompanyUser::query()->where('parent_id', '=', $authId)
            ->where('id', '=', $id)
            ->where('role', '=', 3)->first();

        if ( ! $user ) {
            abort(404);
        }
        $user->status = $status;
        $user->save();
        return redirect()->back()->with('success', __('Status changed successfully.'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $authId = Auth::guard('company_user')->id();
        $user = CompanyUser::query()->where('parent_id', '=', $authId)
            ->where('id', '=', $request->id)
            ->where('role', '=', 3)->first();

        if ( ! $user ) {
            abort(404);
        }

        $contact  = CompanyContact::query()->where('company_user_id', '=', $user->id)->first();
        $qrPath = base_path() . '/public/uploads/companies/qrs/' .  $user->id  . '/qr.png';

        if($contact) {
            $file_path = base_path() . '/public/uploads/company-contact/' . $contact->id;
            $image_name =  $file_path .'/'.  $contact->img_name;
            $bg_image_name = $file_path .'/'. $contact->bg_img_name;
            $logo_name = $file_path .'/'. $contact->logo_name;

            if (file_exists( $image_name )) {
                File::delete( $image_name );
            }

            if (file_exists($bg_image_name)) {
                File::delete( $bg_image_name);
            }

            if (file_exists($logo_name)) {
                File::delete($logo_name);
            }
        }

        if (file_exists($qrPath)) {
            File::delete($qrPath);
        }

        $user->delete();
        return redirect()->back()->with('success', __('Company deleted successfully.'));
    }


}
