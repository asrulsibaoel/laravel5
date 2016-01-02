<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transactions;
use Log;
use Session;
use Auth;

class TransactionsController extends Controller
{

    //
//    
//    public function __construct() {
////        $this->middleware('Auth');
//        $this->middleware('auth');
//        
//    }

    public function index()
    {
//        $roles = Roles::all();
        return view('transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
//        $departement = \App\Departments::all();

        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RolesRequest $request)
    {
        //
        $checked = [];

        $roles = new Roles;
        $roles->name = Input::get('name');
        $roles->access = json_encode(Input::get('access'));

//        $roles->name = Input::get('name');
        $roles->save();

        Session::flash('message', 'You have successfully added Roles');
        return Redirect::to('roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $roles = Roles::find($id);
        $department = \App\Department::all();
        return view('roles.edit')
                        ->with('department', $department)
                        ->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(RolesRequest $roles, $id)
    {
        //this is method to saving
        $roles = Roles::find($id);
        $roles->name = Input::get('name');
        $roles->access = json_encode(Input::get('access'));
        $roles->save();

        Session::flash('message', 'You have successfully added Roles');
        return Redirect::to('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
