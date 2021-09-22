@extends('life.board_room.board_base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Board Room</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('life_jim.update_board_room', ['id' => $board_room->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-6 control-label">Title</label>

                            <div class="col-md-12">
                            <input id="name" type="text" class="form-control" name="title" value="{{ $board_room->title }}" required autofocus >

                                @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>

                            
                        </div>

                        <div class="form-group{{ $errors->has('attachment') ? ' has-error' : '' }}">
                            <label for="profile" class="col-md-6 control-label">Image</label>

                            <div class="col-md-12">
                                <input id="profile" type="file" class="form-control" name="attachment[]" value="{{ old('attachment') }}" multiple autofocus>
                                @foreach ($board_room_images as $key=>$s)
                                <img src="{{ $s->images }}" width="50px" height="50px"/>
                                @endforeach
                                @if ($errors->has('attachment'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('attachment') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-6 control-label">Image Description</label>

                            <div class="col-md-12">
                                <textarea id="content" class="ckeditor" name="content" rows="4" cols="50" required>{{$board_room->content}}</textarea>
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
