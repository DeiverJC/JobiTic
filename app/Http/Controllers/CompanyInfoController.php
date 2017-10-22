<?php

namespace App\Http\Controllers;

use App\BasicData;
use App\ContactInfo;
use App\LocationData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $basicData = new BasicData;
        $basicData->business_name = $request->business_name;
        $basicData->legal_repre = $request->legal_repre;
        $basicData->type_company = $request->type_company;
        $basicData->hierarchy = $request->hierarchy;
        $basicData->economic_activity = $request->economic_activity;
        $basicData->num_workers = $request->num_workers;
        $basicData->nature = $request->nature;
        Auth::user()->basicData()->save($basicData);

        $locationData = new LocationData;
        $locationData->country = $request->country;
        $locationData->departament = $request->departament;
        $locationData->municipality = $request->municipality;
        $locationData->address = $request->address;
        $locationData->phone_indic = $request->phone_indic;
        $locationData->phone_num = $request->phone_num;
        $locationData->phone_ext = $request->phone_ext;
        $locationData->phone2_indic = $request->phone2_indic;
        $locationData->phone2_num = $request->phone2_num;
        $locationData->phone2_ext = $request->phone2_ext;
        $locationData->celphone = $request->celphone;
        $locationData->website = $request->website;
        Auth::user()->locationData()->save($locationData);

        $contactInfo = new ContactInfo;
        $contactInfo->name = $request->name;
        $contactInfo->surnames = $request->surnames;
        $contactInfo->position = $request->position;
        $contactInfo->email = $request->email;
        $contactInfo->phone_indic_hr = $request->phone_indic_hr;
        $contactInfo->phone_num_hr = $request->phone_num_hr;
        $contactInfo->phone_ext_hr = $request->phone_ext_hr;
        $contactInfo->phone2_indic_hr = $request->phone2_indic_hr;
        $contactInfo->phone2_num_hr = $request->phone2_num_hr;
        $contactInfo->phone2_ext_hr = $request->phone2_ext_hr;
        Auth::user()->contactInfo()->save($contactInfo);

        return redirect()->route('company.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
