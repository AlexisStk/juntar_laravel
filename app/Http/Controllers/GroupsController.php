<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Group;
Use App\User;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $groups = Group::all();

        return view('groups.index')->with('groups',$groups);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('groups.create');
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
        
        //Validacion de los datos del grupo.

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'date' => 'date|required',
            'place' => 'required',
            'limit' => 'date|required'
        ];

        $message = [
            'required' => 'el campo :attribute es obligatorio'
        ];

        $this->validate($request,$rules,$message);

        $userId = auth()->user()->id;

        $request['user_id'] = $userId;

        $group = new Group($request->all());

        $group->save();

        return redirect('/grupos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $group = Group::find($id);

        return view('groups.show')->with('group',$group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $group = Group::find($id);

        //Si no es el creador del grupo, no lo dejamos editar nada.
        if(!($group->user_id == auth()->user()->id)){
            return redirect("/grupos");
        }elseif(!($group->active)){
            return redirec("/grupos");
        }

        return view('groups.edit')->with('group',$group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        dd('llegué a update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
