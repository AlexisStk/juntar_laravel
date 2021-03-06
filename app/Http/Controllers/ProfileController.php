<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('profile');

        //Aca debemos mandar la lista de usuarios completa.

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        //
        if(!($id)){
            $id = auth()->user()->id;
        }
        $user = User::find($id);

        return view('user.show')->with('user',$user);
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
        $user = User::find($id);

        if($user->id == auth()->user()->id || auth()->user()->role == 7){
            //Si el usuario es el usuario en si, o es ADM:
            //retornamos la vista del panel para editar el user.
            return view('user.edit')->with('user',$user);
        }

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
        $user = User::find($id);

        $user->description = $request->input('description');
        $user->age = $request->input('age');
        $user->city = $request->input('city');

        $rules = [
            'age' => 'required|integer',
            'city' => 'required|string'
        ];

        $message = [
            'required' => 'el campo :attribute es obligatorio'
        ];

        $this->validate($request,$rules,$message);

        if($request->avatar){
            $file = $request->avatar->store('userAvatar','public');
            $user->avatarPath = $file;
        }

        $user->save();

        return redirect('/perfil/' . $id);
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
