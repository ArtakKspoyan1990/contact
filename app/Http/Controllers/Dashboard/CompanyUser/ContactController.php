<?php

namespace App\Http\Controllers\Dashboard\CompanyUser;

use App\Http\Controllers\Controller;
use App\Models\CompanyContact;
use App\Models\CompanyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use LaravelQRCode\Facades\QRCode;

class ContactController extends Controller
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
        $user =  Auth::guard('company_user')->user();
        $contact =  CompanyContact::query()->where('company_user_id', '=', $user->id)->first();
        $url = null;
        if( $user ->role == 1) {
            $url =  env('APP_URL'). '/big-company/' . $user->security_key;
        }elseif ($user->role == 2){
            $url = env('APP_URL'). '/company/' . $user->security_key;
        }else {
            $url = env('APP_URL'). '/individual/' . $user->security_key;
        }

        return view('pages.dashboard.user.edit', compact('user', 'contact', 'url'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::guard('company_user')->user();
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
            'address' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
        ];


        $trans = [
            'position.required' => __('This field is required.'),
            'full_name.required' => __('This field is required.'),
            'phone.required' => __('This field is required.'),
            'email.required' => __('This field is required.'),
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

        return redirect()->back()->with("success", __("Contact changed successfully."));
    }



}
