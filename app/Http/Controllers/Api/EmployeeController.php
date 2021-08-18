<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Resources\EmployeeStoreResource;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $employee = Employee::all();
        if ($request->search) {
            $employee = Employee::where('first_name','like',"%{$request->search}%")
            ->orWhere('last_name','like',"%{$request->search}%")
            ->get();
        } elseif($request->department_id) {
            $employee = Employee::where('department_id',$request->department_id)->get();
        }
        
        return EmployeeResource::collection($employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request,Employee $employee)
    {

        $employee->create([
            'first_name' => $request['first_name'] ,
            'last_name' => $request['last_name'] ,
            'middle_name' => $request['middle_name'] ,
            'address' => $request['address'],
            'department_id' => $request['department_id'] ,
            'country_id' => $request['country_id'] ,
            'state_id' =>  $request['state_id'],
            'city_id' => $request['city_id'],
            'zip_code' => $request['zip_code'] ,
            'brithdate' => $request['brithdate'] ,
            'date_hired' => $request['date_hired'] ,
        ]);
        return response()->json($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return new EmployeeStoreResource( $employee );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeStoreRequest $request,Employee $employee)
    {

        $employee->update([
            'first_name' => $request['first_name'] ,
            'last_name' => $request['last_name'] ,
            'middle_name' => $request['middle_name'] ,
            'address' => $request['address'],
            'department_id' => $request['department_id'] ,
            'country_id' => $request['country_id'] ,
            'state_id' =>  $request['state_id'],
            'city_id' => $request['city_id'],
            'zip_code' => $request['zip_code'] ,
            'brithdate' => $request['brithdate'] ,
            'date_hired' => $request['date_hired'] ,
        ]);
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json('Employee Delete Successfully');
    }
}
