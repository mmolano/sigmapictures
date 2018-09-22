<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PhotoController extends Controller
{
    public function AdminAuthCheck(){

        $admin_id = Session::get('admin_id');
        if ($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }

    }


    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.add_photo');
    }

    public function save_photo(Request $request)
    {

        $data = array();
        $data['gallery_image']=$request->gallery_image ;
        $data['gallery_category']=$request->gallery_category;
        $data['publication_status']=$request->publication_status;

        $image = $request->file('gallery_image');
        if ($image){
            $image_name = str_random(15);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if ($success){
                $data['gallery_image'] = $image_url;
                DB::table('tbl_gallery')->insert($data);
                Session::put('message', 'Photo ajouté avec succes !');
                return Redirect::to('/add-photo');
            }

        }
        $data['gallery_image'] = '';
        DB::table('tbl_gallery')->insert($data);
        Session::put('message', 'Photo ajouté, problème avec l\'image : "non télécharger !" ');
        return Redirect::to('/add-photo');



    }

    public function all_photo()
    {
        $this->AdminAuthCheck();
        $all_photo_info = DB::table('tbl_gallery')->get();
        $manage_photo = view('admin.all_photo')
            ->with('all_photo_info', $all_photo_info);
        return view('layouts.admin_layout')
            ->with('admin.all_photo', $manage_photo);

        //return view('admin.all_photo');
    }

    public function unactive_photo($gallery_id)
    {

        DB::table('tbl_gallery')
            ->where('gallery_id', $gallery_id)
            ->update(['publication_status' =>0]);
        Session::put('message', 'La Photo est désactivé');
        return Redirect::to('/all-photo');
    }

    public function active_photo($gallery_id)
    {

        DB::table('tbl_gallery')
            ->where('gallery_id', $gallery_id)
            ->update(['publication_status' =>1]);
        Session::put('message', 'La Photo est activé');
        return Redirect::to('/all-photo');
    }

    public function edit_photo($gallery_id)
    {
        $this->AdminAuthCheck();
        $photo_info = DB::table('tbl_gallery')
            ->where('gallery_id', $gallery_id)
            ->first();

        $photo_info = view('admin.edit_photo')
            ->with('photo_info', $photo_info);
        return view('layouts.admin_layout')
            ->with('admin.edit_photo', $photo_info);

    }

    public function update_photo(Request $request, $gallery_id)
    {

        $data = array();
        $data['gallery_category']=$request->gallery_category;


                DB::table('tbl_gallery')
                    ->where('gallery_id', $gallery_id)
                    ->update($data);

                Session::put('message', 'Photo mis à jour avec succes !');
                return Redirect::to('/all-photo');
            }




    public function delete_photo($gallery_id){

        DB::table('tbl_gallery')
            ->where('gallery_id', $gallery_id)
            ->delete();

        Session::put('message', 'Photo supprimée avec succès !!');

        return Redirect::to('/all-photo');
    }
}
