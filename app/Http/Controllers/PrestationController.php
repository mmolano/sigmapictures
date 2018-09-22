<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PrestationController extends Controller
{
    public function index()
    {

        return view('user.prestation');
    }

    public function save_prestation(Request $request)
    {
        $data = array();
        $data['prestation_name']=$request->prestation_name;
        $data['prestation_email_client']=$request->prestation_email_client;


        $image = $request->file('prestation_file');
        if ($image){
            $image_name = str_random(15);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if ($success){
                $data['prestation_file'] = $image_url;
                DB::table('prestation')->insert($data);
                Session::put('message', 'prestation envoyé!');
                return Redirect::to('/my_prestation ');
            }



        }
        $data['prestation_file'] = '';
        DB::table('prestation')->insert($data);
        Session::put('message', 'prestation ajouté, problème avec le fichier : "non envoyé !" ');
        return Redirect::to('/my_prestation');





    }

    public function all_prestation()
    {

        $all_prestation = DB::table('prestation')->get();
        $manage_prestation = view('user.prestation_live')
            ->with('all_prestation', $all_prestation);
        return view('layouts.user_layout')
            ->with('user.prestation_live', $manage_prestation);

        //return view('admin.all_news');
    }

    public function all_prestationAdmin()
    {

        $all_prestation = DB::table('prestation')->get();
        $manage_prestation = view('admin.prestation_en_cours')
            ->with('all_prestation', $all_prestation);
        return view('layouts.admin_layout')
            ->with('admin.prestation_en_cours', $manage_prestation);

        //return view('admin.all_news');
    }



}
