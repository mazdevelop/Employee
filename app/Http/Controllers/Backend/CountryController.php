<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Country::all();
        $title='Country';
        if ($request->has('search')) {
            $countries = Country::where('country_code','like',"%{$request->search}%")
                ->orWhere('name','like',"%{$request->search}%")->get();
        }
        return view('backend.countries.index',compact(['title','countries']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Country';
        return view('backend.countries.create',compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryStoreRequest $request, Country $country)
    {
        $country->create([
            'country_code' => $request['country_code'],
            'name' => $request['name'],
        ]);
        return redirect()->route('country.index')->with('message','Create Country Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $title= 'Update Country';
        return view('backend.countries.edit',compact(['title','country']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryStoreRequest $request, Country $country)
    {
        $country->update([
            'country_code' => $request['country_code'],
            'name' => $request['name'],
        ]);
        return redirect()->route('country.index')->with('message','Update Country Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('country.index')->with('message','Delete Country Successfully');
    }
}
