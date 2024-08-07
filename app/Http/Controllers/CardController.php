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
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function saveContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);


        $key = 0;

        $vcard = "BEGIN:VCARD\n";
        $vcard .= "VERSION:3.0\n";
        $vcard .= "N;CHARSET=utf-8:;" .request('name'). ";;;\n";
        $vcard .= "FN;CHARSET=utf-8:" .request('name'). "\n";

        if($request->has('image')){
            $base64Photo = base64_encode(file_get_contents(request('image')));
            $vcard .= "PHOTO;ENCODING=b;TYPE=JPEG:" . $base64Photo . "\n";
        }

        $vcard .= "TEL;PREF;WORK:" .request('phone'). "\n";
        $vcard .= "EMAIL;INTERNET:" .request('email')."\n";


        if($request->has('address')){
            $vcard .= $this->convertAddressToVCardFormat(request('address'));
        }

        if($request->has('website')){
            $key = 1 + $key;
            $vcard .= "url".$key.".URL:".request('website')."\n";
            $vcard .= "url".$key.".X-ABLabel:Website\n";
        }


        if($request->has('whats_app')){
            $key = 1 + $key;
            $vcard .= "url".$key.".URL:".request('whats_app')."\n";
            $vcard .= "url".$key.".X-ABLabel:WhatsApp\n";
        }

        if($request->has('viber')){
            $key = 1 + $key;
            $vcard .= "url".$key.".URL:".request('viber')."\n";
            $vcard .= "url".$key.".X-ABLabel:Viber\n";
        }

        if($request->has('telegram')){
            $key = 1 + $key;
            $vcard .= "url".$key.".URL:".request('telegram')."\n";
            $vcard .= "url".$key.".X-ABLabel:Telegram\n";
        }

        if($request->has('facebook')){
            $key = 1 + $key;
            $vcard .= "url".$key.".URL:".request('facebook')."\n";
            $vcard .= "url".$key.".X-ABLabel:Facebook\n";
        }

        if($request->has('messenger')){
            $key = 1 + $key;
            $vcard .= "url".$key.".URL:".request('messenger')."\n";
            $vcard .= "url".$key.".X-ABLabel:Messenger\n";
        }

        if($request->has('instagram')){
            $key = 1 + $key;
            $vcard .= "url".$key.".URL:".request('instagram')."\n";
            $vcard .= "url".$key.".X-ABLabel:Instagram\n";
        }

        if($request->has('tik_tok')){
            $key = 1 + $key;
            $vcard .= "url".$key.".URL:".request('tik_tok')."\n";
            $vcard .= "url".$key.".X-ABLabel:TikTok\n";
        }

        if($request->has('youtube')){
            $key = 1 + $key;
            $vcard .= "url".$key.".URL:".request('youtube')."\n";
            $vcard .= "url".$key.".X-ABLabel:Youtube\n";
        }

        if($request->has('disconts')){
            $key = 1 + $key;
            $vcard .= "url".$key.".URL:".request('disconts')."\n";
            $vcard .= "url".$key.".X-ABLabel:Disconts\n";
        }

        if($request->has('location')){
            $key = 1 + $key;
            $vcard .= "url".$key.".URL:".request('location')."\n";
            $vcard .= "url".$key.".X-ABLabel:Location\n";
        }


        $vcard .= "END:VCARD";

        $fileName = 'contact.vcf';
        $vcardFilePath = storage_path($fileName);
        file_put_contents($vcardFilePath, $vcard);
        return response()->download($vcardFilePath, $fileName)->deleteFileAfterSend(true);

    }


    /**
     * @param $address
     * @return string
     */
    public function convertAddressToVCardFormat($address)
    {
        $parts = array_map('trim', explode(',', $address));

        $streetAddress = '';
        $locality = '';
        $region = '';
        $country = '';

        $numParts = count($parts);

        if ($numParts == 3) {
            $streetAddress = $parts[2];
            $locality = $parts[1];
            $country = $parts[0];
        } elseif ($numParts == 4) {
            $streetAddress = $parts[2];
            $locality = $parts[1];
            $country = $parts[0];
        } elseif ($numParts == 5) {
            $streetAddress = $parts[2];
            $locality = $parts[1];
            $region = $parts[3];
            $country = $parts[0];
        }

        $adr = "ADR;PREF:;;$streetAddress;$locality;$region;;$country;\n";
        return $adr;
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
