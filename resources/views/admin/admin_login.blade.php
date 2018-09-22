@extends('layouts.master')
@section('content')
<div id="form_div">

    <div id="form">
        <h1 class="titre animated fadeInLeft" style="margin-bottom: : 120px;">Login</h1>

            <?php
            $message = Session::get('message');
            if ($message){
                echo $message;
                Session::put('message', null);
            }
            ?>


        <form action="{{url('/admin-dashboard')}}" method="post" align="center">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input style="width:200px;
							  padding:2px;
							  border:none;
							  outline:none;
							  background:none;
							  color:rgb(213,213,213);
							  font-style:italic;
							  border-bottom:2px solid lightgrey;
							  margin-bottom:8px; "
                   type="text" class="field" placeholder="Email" name="admin_email" /><br>

            <input style="width:200px;
							  padding:2px;
							  border:none;
							  outline:none;
							  background:none;
							  color:rgb(213,213,213);
							  font-style:italic;
							  border-bottom:2px solid lightgrey;
							  margin-bottom:8px; "
                   id="admin_password" type="password" class="field" placeholder="Mot de passe" name="admin_password" />

            <button type="submit" name="formconnection" class="submit btn btn-primary text-center">Se connecter</button>

        </form>
    </div>
</div>

@endsection