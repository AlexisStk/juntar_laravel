<?php

namespace App\Http\Controllers;

use App\RequestGroup;
use Illuminate\Http\Request;

class RequestGroupController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RequestGroup  $requestGroup
     * @return \Illuminate\Http\Response
     */
    public function show(RequestGroup $requestGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestGroup  $requestGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestGroup $requestGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestGroup  $requestGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestGroup $requestGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestGroup  $requestGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(RequestGroup::destroy($id)){
            dd('destruido');
        }
    }
}
