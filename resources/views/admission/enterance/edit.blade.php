@extends('admission.enterance_base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Enterance Test</div>
                <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admission.update_enterance_test', ['id' => $enterance->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    

                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-6 control-label">Title</label>

                            <div class="col-md-12">
                            <input id="name" type="text" class="form-control" name="title" value="{{ $enterance->title }}" required autofocus>
                                @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-6 control-label">Content</label>

                            <div class="col-md-12">
                                <textarea id="content" class="ckeditor" name="content" rows="4" cols="50" required>{{ $enterance->content }}</textarea>
                                @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

