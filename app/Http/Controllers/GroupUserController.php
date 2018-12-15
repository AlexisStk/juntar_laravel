<?php

namespace App\Http\Controllers;

use App\GroupUser;
use Illuminate\Http\Request;

use App\Group;

class GroupUserController extends Controller
{

    public function removeUser($id)
    {

        $groupUser = GroupUser::find($id);
        // Se supone que si se le hizo un soft_delete no encuentra nada, no?

        if(!($groupUser)){
            //no existe la relación a eliminar.
            return redirect('/grupos');
        }

        // Arreglo bug, $groupUser -> id buscaba el id de la relacion grupo-usuario, nosotros buscamos el id del grupo.
        $group = Group::find($groupUser->group_id);



        if(!($group->user_id == auth()->user()->id)){
            //Este ladri no es el creador del grupo, lo sacamos a los tiros.
            return redirect('/grupos');
        }

        // Si llegamos acá quiere decir que el que hace la petición, ES el creador del grupo.
        
        //Eliminamos la relación entre grupo-usuario.
        $this->destroy($groupUser);
        
        return redirect('/grupos/show/' . $groupUser->id);
    }

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
     * @param  \App\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function show(GroupUser $groupUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupUser $groupUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupUser $groupUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupUser $groupUser)
    {
        //
        // $requestToDestroy = RequestGroup::find($id);

        // $requestToDestroy->delete();

        // $friendshipToDestroy = GroupUser::find();

        // dd($groupUser);

        $groupUser->delete();
    }
}
