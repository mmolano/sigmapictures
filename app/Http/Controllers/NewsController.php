<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class NewsController extends Controller
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
        return view('admin.add_news');
    }

    public function save_news(Request $request)
    {
        $data = array();
        $data['news_title']=$request->news_title;
        $data['news_category']=$request->news_category;
        $data['news_description']=$request->news_description;
        $data['news_auteur']=$request->news_auteur;
        $data['publication_status']=$request->publication_status;

        $image = $request->file('news_image');
        if ($image){
            $image_name = str_random(15);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if ($success){
                $data['news_image'] = $image_url;
                DB::table('tbl_news')->insert($data);
                Session::put('message', 'News ajouté avec succes !');
                return Redirect::to('/add-news');
            }

        }
        $data['news_image'] = '';
        DB::table('tbl_news')->insert($data);
        Session::put('message', 'News ajouté, problème avec l\'image : "non télécharger !" ');
        return Redirect::to('/add-news');



    }

    public function all_news()
    {
        $this->AdminAuthCheck();
        $all_news_info = DB::table('tbl_news')->get();
        $manage_news = view('admin.all_news')
            ->with('all_news_info', $all_news_info);
        return view('layouts.admin_layout')
            ->with('admin.all_news', $manage_news);

        //return view('admin.all_news');
    }

    public function unactive_news($news_id)
    {

        DB::table('tbl_news')
            ->where('news_id', $news_id)
            ->update(['publication_status' =>0]);
        Session::put('message', 'La référence est désactivé');
        return Redirect::to('/all-news');
    }

    public function active_news($news_id)
    {

        DB::table('tbl_news')
            ->where('news_id', $news_id)
            ->update(['publication_status' =>1]);
        Session::put('message', 'La référence est activé');
        return Redirect::to('/all-news');
    }

    public function edit_news($news_id)
    {
        $this->AdminAuthCheck();
        $news_info = DB::table('tbl_news')
            ->where('news_id', $news_id)
            ->first();

        $news_info = view('admin.edit_news')
            ->with('news_info', $news_info);
        return view('layouts.admin_layout')
            ->with('admin.edit_news', $news_info);

    }


    public function update_news(Request $request, $news_id)
    {

        $data = array();
        $data['news_title'] = $request->news_title;
        $data['news_category'] = $request->news_category;
        $data['news_description'] = $request->news_description;
        $data['news_auteur'] = $request->news_auteur;

        $image = $request->file('news_image');

        if ($request->hasFile('news_image')) {
            $image = $request->file('news_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('image/' . $filename);
            $data['news_image'] = $location;

        }


        DB::table('tbl_news')
            ->where('news_id', $news_id)
            ->update($data);


        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['news_image'] = $image_url;

            if ($success) {
                $data['news_image'] = $image_url;

                DB::table('tbl_news')
                    ->where('news_id', $news_id)
                    ->update($data);
            }

        }
        Session::put('message', 'News mis à jour avec succes !');
        return Redirect::to('/all-news');
    }



    public function delete_news($news_id){

        DB::table('tbl_news')
            ->where('news_id', $news_id)
            ->delete();

        Session::put('message', 'News supprimée avec succès !!');

        return Redirect::to('/all-news');
    }




    public function create()
    {
        return view('admin.add_user');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {


        $this->validate(request(), [
            'name' => 'required',
            'secname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'secname' => $request-> secname,
            'email' => $request -> email ,
            'password' => $request-> password,
        );





        User::create(request(['email', 'name', 'secname', 'password']));

        Mail::send('email.contact', $data, function($message) use ($data){
            $message->from('sigmapictest201@gmail.com');
            $message->to($data['email']);
            $message->subject('Hello');
        });

        Session::put('message', 'A user has been created and a mail was sent successfully to the user!" ');

        return back();
    }



    public function all_users()
    {
        $this->AdminAuthCheck();
        $all_users_info = DB::table('users')->get();
        $manage_users = view('admin.all_user')
            ->with('all_users_info', $all_users_info);
        return view('layouts.admin_layout')
            ->with('admin.all_user', $manage_users);


    }



}
