<?php

namespace App\Http\Controllers;

use App\User;
use App\BasicData;
use App\ContactInfo;
use App\LocationData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompanyInfoRequest;

class CompanyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataUser = Auth::user()->basicData()->first();
        return view('companies.index', compact('dataUser'));
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
    public function store(CompanyInfoRequest $request)
    {
        Auth::user()->basicData()->create($request->all());
        Auth::user()->locationData()->create($request->all());
        Auth::user()->contactInfo()->create($request->all());

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
        $data = Auth::user()
                    ->join('basic_datas', 'users.id', '=', 'basic_datas.user_id')
                    ->join('location_datas', 'users.id', '=', 'location_datas.user_id')
                    ->join('contact_infos', 'users.id', '=', 'contact_infos.user_id')
                    ->where('users.id', '=', $id)
                    ->select('basic_datas.*', 'location_datas.*', 'contact_infos.*')
                    ->get();

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
        $bd = $request->only(['business_name', 'legal_repre', 'type_company',
        'hierarchy', 'economic_activity', 'num_workers','nature',]);

        $ld = $request->only(['country', 'departament', 'municipality', 'address',
        'phone_indic', 'phone_num', 'phone_ext','phone2_indic', 'phone2_num', 'phone2_ext',
        'celphone', 'website',]);

        $ci = $request->only(['name', 'surnames', 'position', 'email',
        'phone_indic_hr', 'phone_num_hr', 'phone_ext_hr', 'phone2_indic_hr', 'phone2_num_hr',
        'phone2_ext_hr',]);

        Auth::user()->basicData()->update($bd);
        Auth::user()->locationData()->update($ld);
        Auth::user()->contactInfo()->update($ci);

        return redirect()->route('company.index')->with('status', 'Datos actualizados');

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
