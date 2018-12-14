<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Group;
Use App\User;
Use App\RequestGroup;
Use App\GroupUser;
Use App\Post;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $groups = Group::all();

        //Sólo traemos de la DB los grupos que esten activos.
        $groups = Group::where('active',true)->get();
;
        $id = auth()->user()->id;

        return view('groups.index')->with('groups',$groups)->with('id',$id);

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
        
        $user_id = auth()->user()->id;

        return view('groups.show')
        ->with('group',$group)
        ->with('id',$user_id);
        // ->with('integrantes',$integrantes);
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
        // }elseif(!($group->active)){ //Si el grupo no se encuentra activo, vuelve a index
        //     return redirect("/grupos");
        // Ya no deberiamos usar ese elseif, porque usamos soft_delete..
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
        $group = Group::find($id);

        if(!($group->user_id == auth()->user()->id)){
            //por las dudas, ya ni me acuerdo si para llegar acá verifique esto..
            return redirect('/grupos');
        }

        $group->title = $request->input('title');
        $group->description  = $request->input('description');
        $group->date = $request->input('date');
        $group->place = $request->input('place');
        $group->limit = $request->input('limit');

        $group->save();

        return redirect('/grupos/show/$id');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        //Si no es el creador del grupo, no lo dejamos editar nada.
        if(!($group->user_id == auth()->user()->id)){
            return redirect("/grupos");
        // }elseif(!($group->active)){ //Si el grupo no se encuentra activo, vuelve a index
        //     return redirect("/grupos");
        // se supone que ya no usamos esto, porque usamos soft_delete.
        }

        //Para llegar a este punto, el usuario tiene que estar absolutamente seguro 
        //de que quiere dejar el grupo sin funcionamiento.
        $group->active = false;

        $group->save();

        // chequear si funciona..
        $group->delete();

    }

    public function requestGroup($id)
    {
        $requestData = [
            'group_id' => $id,
            'user_id' => auth()->user()->id
        ];

        $requestExist = RequestGroup::where('group_id',$id)
        ->where('user_id',$requestData['user_id'])
        ->take(1)
        ->get();

        if(count($requestExist)){
            // dd($requestExist[0]->group_id);
            //si llegó hasta acá, quiere decir que hay una solicitud activa que coincide con la que queremos hacer.
            //cortamos acá.
            return redirect('/grupos');
        }

        $requestGroup = new RequestGroup($requestData);

        //Ojo! Approved es nullable y default = false.

        $requestGroup->save();

        return redirect('/grupos');
    }

    public function sendNews()
    {
        return view('groups.news');
    }

    public function sendComment(Request $request)
    {
        // $groupUser = GroupUser::find($id);

        //existe la relacion entre usuario y grupo??

        $groupUser = GroupUser::where('user_id',auth()->user()->id)
        ->where('group_id',$request->group_id)->get();

        if(!($groupUser)){
            //no hay relacion entre usuario y grupo, no lo dejamos postear nada.
            return redirect('/grupos/show/' . $request->group_id);
        }

        $postData = [
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'group_id' => $request->group_id,
        ];

        $comentario = new Post($postData);

        $comentario->save();

        return redirect('/grupos/show/' . $request->group_id);

    }
    //falta la posibilidad de eliminar comentarios por parte del creador del grupo.


}
