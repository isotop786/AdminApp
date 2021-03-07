<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Symfony\Component\HttpFoundation\Response ;
class RolesController extends Controller
{

    public function index()
    {
        return Role::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->only('name'));

        return response($role,Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $role = Role::findOrFail($id);

       return response($role,Response::HTTP_ACCEPTED);
    }


    public function update(Request $request, $id)
    {
       $role = Role::find($id);
       $role->update($request->only('name'));

       return response($role,Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Role::destroy($id);

        return response(null,Response::HTTP_NO_CONTENT);
    }
}
