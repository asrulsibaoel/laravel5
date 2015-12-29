<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Roles;
use App\Http\Requests\RolesRequest;
use \Auth,
    \Redirect,
    \Validator,
    \Input,
    \Session;
use Image;
use Log;
use Illuminate\Http\Request;

class RolesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct() {
//        $this->middleware('Auth');
        $this->middleware('roles');
        
    }

    public function index() {
        $roles = Roles::all();
        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $departement = \App\Department::all();
        
        return view('roles.create')->with('department',$departement);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RolesRequest $request) {
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
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
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
    public function update(RolesRequest $roles, $id) {
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
    public function destroy($id) {
        //
    }

}
