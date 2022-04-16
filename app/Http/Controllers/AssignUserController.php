<?php

namespace App\Http\Controllers;

use App\Models\AssignUser;
use App\Models\Employee;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AssignUserController extends Controller
{
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
    public function create($id)
    {
        $employee = Employee::find($id);
        $users = User::all();

        return view('assign_user.create', compact('employee', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'employee_id'  => 'unique:assign_users',
                'user_id'       => 'required',
            ],

            [
                'employee_id.unique'    => 'Empleado ya asignado a un Usuario',
                'user_id.required'      => 'Necesitas seleccionar un Usuario',
            ],
        );

        AssignUser::insert(
            [
                'employee_id' => $request->employee_id,
                'user_id' => $request->user_id,
                'created_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Empleado asignado correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignUser  $assignUser
     * @return \Illuminate\Http\Response
     */
    public function show(AssignUser $assignUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignUser  $assignUser
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignUser $assignUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignUser  $assignUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignUser $assignUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignUser  $assignUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignUser $assignUser)
    {
        //
    }
}
