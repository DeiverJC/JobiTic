<?php

namespace App\Http\Controllers;

use App\JobOffer;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobOffers = JobOffer::all()->reverse()->take(10);

        return view('index', compact('jobOffers'));
    }
}
