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
        $data = auth()->user()
            ->join('basic_datas', 'users.id', '=', 'basic_datas.user_id')
            ->join('location_datas', 'users.id', '=', 'location_datas.user_id')
            ->join('contact_infos', 'users.id', '=', 'contact_infos.user_id')
            ->where('users.id', '=', $id)
            ->select('basic_datas.*', 'location_datas.*', 'contact_infos.*')
            ->get();

        $location = auth()->user()->locationData->location()
            ->join('cities', 'locations.city_id', '=', 'cities.id')
            ->join('states', 'cities.state_id', '=', 'states.id')
            ->join('countries', 'states.country_id', '=', 'countries.id')
            ->select(
                    'locations.id',
                    'cities.id AS city_id',
                    'cities.name AS city_name',
                    'states.id AS state_id',
                    'states.name AS state_name',
                    'countries.id AS country_id',
                    'countries.name AS country_name'
            )->first();

        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

       return view('companies.edit', compact('data', 'location', 'countries', 'states', 'cities'));
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
        // dd($location);
        // $location = $request->only(['city_id']);
        // auth()->user()->locationData->location()->update($location);

        auth()->user()->locationData->location()->update($request->only(['city_id']));

        $basic_data = $request->only([
            'business_name', 'legal_repre', 'type_company',
            'hierarchy', 'economic_activity', 'num_workers','nature',
        ]);
        $location_data = $request->only([
            'address',
            'phone_indic', 'phone_num', 'phone_ext','phone2_indic',
            'phone2_num', 'phone2_ext', 'celphone', 'website',
        ]);
        $contact_info = $request->only([
            'name', 'surnames', 'position', 'email',
            'phone_indic_hr', 'phone_num_hr', 'phone_ext_hr',
            'phone2_indic_hr', 'phone2_num_hr', 'phone2_ext_hr',
        ]);

        auth()->user()->basicData()->update($basic_data);
        auth()->user()->locationData()->update($location_data);
        auth()->user()->contactInfo()->update($contact_info);

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
