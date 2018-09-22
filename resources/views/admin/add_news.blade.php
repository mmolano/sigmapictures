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

                <form class="form-horizontal" action="{{URL::to('/save-news')}}" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="date01">News Title</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="news_title" required="">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">News Category</label>
                            <div class="controls">
                                <select id="selectError3" name="news_category">
                                    <option style="font-weight: bold !important; font-size: 20px !important;">Installation</option>
                                    <option style="font-weight: bold !important; font-size: 20px !important;">Contrat</option>
                                    <option style="font-weight: bold !important; font-size: 20px !important;">Salon</option>
                                    <option style="font-weight: bold !important; font-size: 20px !important;">Visite</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">News description</label>
                            <div class="controls">
                                <textarea name="news_description" rows="3" required=""></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">News Autor</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="news_auteur" required="">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Image product</label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="fileInput" name="news_image" type="file">
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Publication Status</label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" value="1">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Reference</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div>

@endsection