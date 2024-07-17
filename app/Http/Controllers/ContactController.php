<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;


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

            $url = env('BACK_URL') . '/api/big-company/' . $id;
            $response =  Http::get($url);
            dd($response->json());
            if($response->ok()) {;
                $data =  $response->json();
                return view('pages.big_company', compact('data'));
            }
            abort(404);


        } catch (\Exception $e) {
            abort(404);
        }
    }
}
