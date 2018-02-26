<?php

namespace App\Http\Controllers;

use App\City;
use App\Skill;
use App\State;
use App\Country;
use App\JobOffer;
use Illuminate\Http\Request;
use App\Http\Requests\JobOfferRequest;

class JobOfferController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('registerInfo', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobOffers = JobOffer::latest()->paginate(3);

        return view('job-offers.index', compact('jobOffers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = auth()->user()->contactInfo->email;
        $jobOffer = null;
        $skills = Skill::all();
        $countries = Country::all();

        return view('job-offers.create', compact('data', 'jobOffer', 'skills', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobOfferRequest $request)
    {
        $jobOffer = auth()->user()->jobOffers()->create($request->all());
        $jobOffer->location()->create($request->all());
        $jobOffer->skills()->sync($request->skills);

        return redirect()->route('company.index')
            ->with('status', 'Oferta creada exitosamente!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobOffer  $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function show(JobOffer $jobOffer)
    {
        return view('job-offers.show', compact('jobOffer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobOffer  $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(JobOffer $jobOffer)
    {
        $data = auth()->user()->contactInfo->email;

        $skills = Skill::all();

        $countries = Country::all();

        $states = State::all();

        $cities = City::all();

        return view('job-offers.edit', compact(
            'jobOffer',
            'data',
            'skills',
            'countries',
            'states',
            'cities'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobOffer  $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function update(JobOfferRequest $request, JobOffer $jobOffer)
    {
        $jobOffer->location()->update($request->only(['city_id']));

        $jobOffer->update($request->all());

        $jobOffer->skills()->sync($request->skills);

        return redirect()->route('company.index')
            ->with('status', 'La oferta fue actualizada!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobOffer  $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobOffer $jobOffer)
    {
        $jobOffer->delete();

        return redirect()->route('company.index')
            ->with('status', 'La oferta ha sido eliminada!!');
    }
}
