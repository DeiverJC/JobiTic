<?php

namespace App\Http\Controllers;

use App\User;
use App\City;
use App\State;
use App\Country;
use App\BasicData;
use App\ContactInfo;
use App\LocationData;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyInfoRequest;

class CompanyInfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('registerInfo', ['except' => [
            'create', 'store', 'getStateList', 'getCityList',
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataUser = auth()->user()->basicData()->first();
        return view('companies.index', compact('dataUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('companies.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyInfoRequest $request)
    {
        $locationData = LocationData::create($request->all());
        $locationData->location()->create($request->all());

        auth()->user()->basicData()->create($request->all());
        auth()->user()->locationData()->save($locationData);
        auth()->user()->contactInfo()->create($request->all());

        return redirect()
                ->route('company.index')
                ->with('status', 'Información guardada exitosamente!!');
    }

    /**
     * Display the specified resource.
     *
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
        /*$data = auth()->user()
            ->join('basic_datas', 'users.id', '=', 'basic_datas.user_id')
            ->join('location_datas', 'users.id', '=', 'location_datas.user_id')
            ->join('contact_infos', 'users.id', '=', 'contact_infos.user_id')
            ->where('users.id', '=', $id)
            ->select('basic_datas.*', 'location_datas.*', 'contact_infos.*')
            ->get();*/
        /*$data2 = auth()->user()->locationData()
            ->join('locations', 'locationData.id', '=', 'locations.location_data_id' )
            ->join('cities', 'locations.city_id', '=', 'cities.id')
            ->join*/
        // $data = auth()->user()->locationData->location->city->state->country()->get();
        $data = User::with(['basicData', 'locationData', 'contactInfo'])->get();
        dd($data);

       return view('companies.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyInfoRequest $request, $id)
    {
        $bd = $request->only([
            'business_name', 'legal_repre', 'type_company',
            'hierarchy', 'economic_activity', 'num_workers','nature',
        ]);

        $ld = $request->only([
            'country', 'departament', 'municipality', 'address',
            'phone_indic', 'phone_num', 'phone_ext','phone2_indic',
            'phone2_num', 'phone2_ext', 'celphone', 'website',
        ]);

        $ci = $request->only([
            'name', 'surnames', 'position', 'email',
            'phone_indic_hr', 'phone_num_hr', 'phone_ext_hr',
            'phone2_indic_hr', 'phone2_num_hr', 'phone2_ext_hr',
        ]);

        auth()->user()->basicData()->update($bd);
        auth()->user()->locationData()->update($ld);
        auth()->user()->contactInfo()->update($ci);

        return redirect()->route('company.index')
                    ->with('status', 'Datos actualizados exitosamente');

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

    public function getStateList(Request $request)
    {
        $states = State::where('country_id', $request->country_id)
            ->pluck('name', 'id');
        return response()->json($states);
    }

    public function getCityList(Request $request)
    {
        $cities = City::where('state_id', $request->state_id)
            ->pluck('name', 'id');
        return response()->json($cities);
    }
}
