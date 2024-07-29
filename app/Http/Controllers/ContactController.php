<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use JeroenDesloovere\VCard\VCard;


class ContactController extends Controller
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
        try {
            $curl = curl_init();

            $url = env('BACK_URL') . '/api/big-company/' . $id;
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $data = json_decode(curl_exec($curl) , true);
            curl_close($curl);

            if( $data == 'error') {
                abort(404);
            }
            return view('pages.big_company', compact('data'));


        } catch (\Exception $e) {
            abort(404);
        }
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
        ]);

        $vcard = new VCard();
        $vcard->addName('', $request->name);
        $vcard->addPhoneNumber($request->phone, 'PREF;WORK');

        $vcardData = $vcard->getOutput();
        $filename = $request->name . '.vcf';
        return response($vcardData, 200, [
            'Content-Type' => 'text/vcard',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}
