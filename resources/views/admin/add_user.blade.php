@extends('layouts.admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Add Users</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Users</h2>

            </div>
            <div class="box-content">
                <h2 class="alert alert-success">
                    Message Log:
                    <?php
                    $message = Session::get('message');
                    if ($message){
                        echo $message;
                        Session::put('message', null);
                    }
                    ?>
                </h2>

                <h2 class="alert alert-danger">
                    Errors log :
                    <?php
                    $message = Session::get('errors');
                    if ($message){
                        echo $message;
                        Session::put('errors', null);
                    }
                    ?>
                </h2>




                <form class="form-horizontal" action="{{URL::to('/add-users')}}"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}


                    <fieldset>


                        <div class="control-group">
                            <label for="email" class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                <input class="form-control" id="email" value="{{ old('email') }}" type="email" class="form-control" name="email" required>
                            </div>
                        </div>



                        <div class="control-group">
                            <label for="name" class="col-md-4 control-label">Prénom</label>

                            <div class="col-md-6">
                                <input class="form-control" value="{{ old('name') }}" id="name" type="text" class="form-control" name="name" required>
                            </div>
                        </div>



                        <div class="control-group">
                            <label for="secname" class="col-md-4 control-label">Nom </label>

                            <div class="col-md-6">
                                <input class="form-control" id="secname" value="{{ old('secname') }}" type="text" class="form-control" name="secname" required>
                            </div>
                        </div>



                        <div class="control-group">
                            <label class="col-md-4 control-label text-muted ">Random password:</label>
                            <div class="col-md-6 input-group">
                                <input type="password" class="form-control" rel="gp" data-size="32" data-character-set="a-z,A-Z,0-9,#" name="password" required>
                                <span class="input-group-btn"><button type="button" class="btn btn-default getNewPass"><i class="icon-refresh"></i></button></span>
                            </div>
                        </div>


                        <div class="control-group">
                            <button type="submit" class="btn btn-primary">Créer</button>
                        </div>


                    </fieldset>
                </form>




            </div>
        </div>
    </div>


    </div>

@endsection