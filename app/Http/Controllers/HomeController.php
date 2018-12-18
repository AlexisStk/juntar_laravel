<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Group;
Use App\User;
use App\GroupUser;
Use App\RequestGroup;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Acá vamos a mostrar las novedades de los grups de los que sos parte.
        /**La logica sería:
         * Obtenemos lista de grupos que sos parte
         * los recorremos y vamos enviando el ultimo comentario.
         */
        $groups = null;
        $userGroups = GroupUser::where('user_id',auth()->user()->id)->get();
        
                /* if(count($userGroups)){
            for($i=0; isset($userGroups[$i]);$i++){
                // dd($userGroups[$i]->group_id);
                $arrGroups[$i] = GroupUser::find($userGroups[$i]->group_id);
            } */

        if(count($userGroups)){
            for($i=0;$i<=count($userGroups)-1;$i++){
                // dd($userGroups[$i]->group_id);
                $arrGroups[$i] = GroupUser::find($userGroups[$i]->group_id);
            }

            $groups = new Group($arrGroups);

        $id = auth()->user()->id;

        return view('home')->with('groups',$groups->get())->with('id', $id);
        }else{
            $id = auth()->user()->id;

            return view('home')->with('groups',$groups)->with('id',$id);
        }
    }
}
