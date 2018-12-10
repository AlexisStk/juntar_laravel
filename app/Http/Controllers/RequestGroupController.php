<?php

namespace App\Http\Controllers;

use App\RequestGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Group;

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
    public function update(RequestGroup $requestGroup)
    {
        //
        $requestGroup->save();
    }

    public function acceptRequest($id)
    {
        
        if($this->isValidRequestGroup($id)){
            $requestGroup = RequestGroup::find($id);
            $group = Group::find($requestGroup->group_id);

            $requestGroup->approved = true;

            $this->update($requestGroup);

            $this->prueba($id);

            $this->destroy($id);

            return redirect('/grupos/show/' . $group->id);
        }

    }

    public function prueba($request_id){

        $requestGroup = RequestGroup::find($request_id);


        DB::table('group_user')->insert([
            'group_id' => $requestGroup->group_id,
            'user_id' => $requestGroup->user_id,
            // 'create_at' => asd,
            // 'updated_at' => asd
        ]);

    }

    public function rejectRequest($id)
    {
        if($this->isValidRequestGroup($id)){
            $requestGroup = RequestGroup::find($id);
            $group = Group::find($requestGroup->group_id);

            $requestGroup->approved = false;

            $this->update($requestGroup);

            $this->destroy($id);

            return redirect('/grupos/show/' . $group->id);
        }
    }

    public function isValidRequestGroup($id)
    {
        //Obtenemos la solicitd completa.
        $requestGroup = RequestGroup::find($id);

        //Si la solicitud existe
        if($requestGroup){
            //Obtenemos el grupo al cual se le hizo la solicitud.
            $group = Group::find($requestGroup->group_id);
            if(!($group)){
                //Si llega acá, es porque el usuario está haciendo cosas raras. Lo mandamos de nuevo para la cucha.
                return redirect('/grupos');
            }
            //si el usuario es realmente el creador del grupo.
            if(auth()->user()->id == $group->user_id){
                //Si la solicitud nunca fue borrada 
                if($requestGroup->deleted_at == null){
                    return true;
                }else{
                    // dd('hola, ya me borraron y llegue igual');
                    return redirect('/grupos/show' . $group->id);
                }
            }
        }else{
            return redirect('/grupos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestGroup  $requestGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestToDestroy = RequestGroup::find($id);

        $requestToDestroy->delete();
    }
}
