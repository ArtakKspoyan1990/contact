<?php

namespace App\Http\Controllers;

use App\Models\CompanyContact;
use App\Models\CompanyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use JeroenDesloovere\VCard\VCard;


class CardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('pages.contact');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function employees()
    {
        return view('pages.employees');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function branches()
    {
        return view('pages.branches');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function employer()
    {
        return view('pages.employer');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Exception
     */
    public function bigCompany($id)
    {
        $company = CompanyUser::query()
            ->select('id','security_key','status', 'role')
            ->where('security_key', '=', $id)
            ->where('status', '=', 1)
            ->where('role', '=', 1)
            ->withCount(['employees' => function ($q){
                $q->where('status', 1);
            }, 'branches' => function ($q){
                $q->where('status', 1);
            }])->first();

        if(!$company) {
            abort(404);
        }

        $contact = CompanyContact::query()->where('company_user_id', '=', $company->id)->first();

        if(!$contact) {
            abort(404);
        }

        $data = $contact->toArray();
        $data['logo_url'] = $contact->logo();
        $data['bg_image_url'] = $contact->bg_image();
        $data['image_url'] = $contact->image();
        return view('pages.big_company', compact('data', 'company'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Exception
     */
    public function company($id)
    {
        $company = CompanyUser::query()
            ->select('id','security_key','status', 'role')
            ->where('security_key', '=', $id)
            ->where('status', '=', 1)
            ->where('role', '=', 2)
            ->withCount(['employees' => function ($q){
                $q->where('status', 1);
            }])->first();

        if(!$company) {
            abort(404);
        }

        $contact = CompanyContact::query()->where('company_user_id', '=', $company->id)->first();

        if(!$contact) {
            abort(404);
        }

        $data = $contact->toArray();
        $data['logo_url'] = $contact->logo();
        $data['bg_image_url'] = $contact->bg_image();
        $data['image_url'] = $contact->image();
        return view('pages.company', compact('data', 'company'));
    }


    public function individual($id)
    {
        $individual = CompanyUser::query()
            ->select('id','security_key','status', 'role')
            ->where('security_key', '=', $id)
            ->where('status', '=', 1)
            ->where('role', '=', 3)
            ->first();

        if(!$individual) {
            abort(404);
        }
        $contact = CompanyContact::query()->where('company_user_id', '=', $individual->id)->first();

        if(!$contact) {
            abort(404);
        }

        $data = $contact->toArray();
        $data['logo_url'] = $contact->logo();
        $data['bg_image_url'] = $contact->bg_image();
        $data['image_url'] = $contact->image();
        return view('pages.individual', compact('data', 'individual'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function saveContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $vcard = new VCard();

        $vcard->addName('', $request->name);
        $vcard->addEmail($request->email);
        $vcard->addPhoneNumber($request->phone, 'PREF;WORK');

        if($request->has('whats_app')){
            $vcard->addPhoneNumber(request('whats_app'), 'WhatsApp');
        }

        if($request->has('viber')){
            $vcard->addPhoneNumber(request('viber'), 'Viber');
        }

        if($request->has('telegram')){
            $vcard->addPhoneNumber(request('telegram'), 'Telegram');
        }

        if($request->has('website')){
            $vcard->addPhoneNumber(request('website'), 'website');
        }

        if($request->has('facebook')){
            $vcard->addURL(request('facebook'), 'Facebook');
        }

        if($request->has('messenger')){
            $vcard->addURL(request('messenger'), 'Messenger');
        }

        if($request->has('instagram')){
            $vcard->addURL(request('instagram'), 'Instagram');
        }

        if($request->has('tik_tok')){
            $vcard->addURL(request('tik_tok'), 'TikTok');
        }

        if($request->has('youtube')){
            $vcard->addURL(request('youtube'), 'YouTube');
        }

        if($request->has('disconts')){
            $vcard->addURL(request('disconts'), 'Disconts');
        }

        if($request->has('Location')){
            $vcard->addURL(request('location'), 'location');
        }

        $vcardData = $vcard->getOutput();
        $filename = $request->name . '.vcf';
        return response($vcardData, 200, [
            'Content-Type' => $vcard->getContentType(),
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function companyEmployees($id)
    {
        $company = CompanyUser::query()
            ->select('id','security_key','status', 'role')
            ->where('security_key', '=', $id)->first();

        if(!$company) {
            abort(404);
        }

        $employees = CompanyUser::query()
            ->select('id','security_key','status', 'role', 'parent_id')
            ->with('contact')
            ->whereHas('contact')
            ->where('status', '=', 1)
            ->where('role', '=', 3)
            ->where('parent_id', '=', $company->id)
             ->get();

        if(count($employees) == 0) {
            abort(404);
        }

        return view('pages.company_employees', compact('employees'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function companyBranches($id)
    {
        $company = CompanyUser::query()
            ->select('id','security_key','status', 'role')
            ->where('security_key', '=', $id)->first();

        if(!$company) {
            abort(404);
        }

        $branches = CompanyUser::query()
            ->select('id','security_key','status', 'role', 'parent_id')
            ->with('contact')
            ->whereHas('contact')
            ->where('status', '=', 1)
            ->where('role', '=', 2)
            ->where('parent_id', '=', $company->id)
            ->get();

        if(count($branches) == 0) {
            abort(404);
        }

        return view('pages.company_branches', compact('branches'));
    }

}
