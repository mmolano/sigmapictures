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
                <h2><i class="halflings-icon user"></i><span class="break"></span>News Installation</h2>
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
                        <th>ID Prestation</th>
                        <th>Prestation nom</th>
                        <th>Prestation fichier</th>

                    </tr>
                    </thead>

                    @foreach( $all_prestation as $prestation )
                        <tbody>
                        <tr>
                            <td class="center">{{$prestation->prestation_id}}</td>
                            <td class="center">{{$prestation->prestation_name}}</td>

                            <a href=""></a>
                            <td class="center"><img width="80" class="{{$prestation->prestation_file}}" src="{{$prestation->prestation_file}}"></td>
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