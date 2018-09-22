@extends('layouts.admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Users informations</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>

                        <th>User name</th>
                        <th>User family name</th>
                        <th>User email</th>
                        <th>Created at</th>
                        <th>Updated at</th>

                    </tr>
                    </thead>

                    @foreach( $all_users_info as $users )
                        <tbody>
                        <tr>

                            <td class="center">{{$users->name}}</td>
                            <td class="center">{{$users->secname}}</td>
                            <td class="center">{{$users->email}}</td>
                            <td class="center">{{$users->created_at}}</td>
                            <td class="center">{{$users->updated_at}}</td>
                        </tr>

                        </tbody>
                    @endforeach
                </table>
            </div>
        </div><!--/span-->

    </div>
    <p class="alert alert-success">
        <?php
        $message = Session::get('message');
        if ($message){
            echo $message;
            Session::put('message', null);
        }
        ?>
    </p>
@endsection