<?php

namespace App\Http\Controllers;

use App\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function search(Request $request)
    {
        $title = $request->title;
        $city = $request->city;
        $jobOffers = DB::table('users')
            ->join('job_offers', 'job_offers.user_id', '=', 'users.id')
            ->join('basic_datas', 'basic_datas.user_id', '=', 'users.id')
            ->join('locations', 'job_offers.id', '=', 'locations.job_offer_id')
            ->join('cities', 'cities.id', '=', 'locations.city_id')
            ->join('states', 'states.id', '=', 'cities.state_id')
            ->join('countries', 'countries.id', '=', 'states.country_id')
            ->where('job_offers.title', 'like', '%'.$title.'%')
            ->orWhere('cities.name', 'like', '%'.$city.'%')
            ->select(
                'job_offers.id AS id',
                'job_offers.title AS title',
                'job_offers.type_offer AS type_offer',
                'cities.name AS city_name',
                'countries.name AS country_name',
                'basic_datas.business_name AS company_name'
            )
            ->get();

        return view('searches', compact('jobOffers', 'title', 'city'));
    }
}
