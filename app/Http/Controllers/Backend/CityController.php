<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::all();
        $title='City';
        if ($request->has('search')) {
            $cities = City::where('name','like',"%{$request->search}%")->get();
        }
        return view('backend.cities.index',compact(['title','cities']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='City';
        $states = State::all();
        return view('backend.cities.create',compact(['title','states']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request, City $city)
    {
        $city->create([
            'state_id' => $request['state_id'],
            'name' => $request['name'],
        ]);
        return redirect()->route('city.index')->with('message','Create City Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $title= 'Update City';
        $states = State::all();
        return view('backend.cities.edit',compact(['title','city','states']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityStoreRequest $request, City $city)
    {
        $city->update([
            'state_id' => $request['state_id'],
            'name' => $request['name'],
        ]);
        return redirect()->route('city.index')->with('message','Update City Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('city.index')->with('message','Delete City Successfully');
    }
}
