<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
        $this->middleware('registerInfo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        return view('job-offers.create', compact('data', 'jobOffer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobOfferRequest $request)
    {
        auth()->user()->jobOffers()->create($request->all());

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
        //
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

        return view('job-offers.edit', compact('jobOffer', 'data'));
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
        $jobOffer->update($request->all());

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
