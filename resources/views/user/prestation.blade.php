@extends('layouts.user_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Add News</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add News</h2>

            </div>
            <div class="box-content">
                <p class="alert alert-success">
                    <?php
                    $message = Session::get('message');
                    if ($message){
                        echo $message;
                        Session::put('message', null);
                    }
                    ?>
                </p>

                <form class="form-horizontal" action="{{URL::to('/save_prestation' )}}" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="date01">Nom du projet</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="prestation_name" required="">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Prestation email client</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="prestation_email_client" required="" >
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="fileInput">Fichier</label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="fileInput" name="prestation_file" type="file">
                            </div>
                        </div>



                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Ajouter une prestation</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div>

@endsection