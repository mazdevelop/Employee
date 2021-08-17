<?php

namespace App\Http\Controllers\Backend;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StateStoreRequest;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = State::all();
        $title='State';
        if ($request->has('search')) {
            $states = State::where('name','like',"%{$request->search}%")->get();
        }
        return view('backend.states.index',compact(['title','states']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='State';
        $countries = Country::all();
        return view('backend.states.create',compact(['title','countries']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateStoreRequest $request, State $state)
    {
        $state->create([
            'country_id' => $request['country_id'],
            'name' => $request['name'],
        ]);
        return redirect()->route('state.index')->with('message','Create State Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $title= 'Update State';
        $countries = Country::all();
        return view('backend.states.edit',compact(['title','state','countries']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateStoreRequest $request, State $state)
    {
        $state->update([
            'country_id' => $request['country_id'],
            'name' => $request['name'],
        ]);
        return redirect()->route('state.index')->with('message','Update State Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('state.index')->with('message','Delete State Successfully');
    }
}
