@extends('event.gallery.gallery_base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Gallery</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('events.store_gallery') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-6 control-label">Event</label>

                            <div class="col-md-12">
                            <select class="form-control js-country" name="event">
                                    <option value="-1">Please select your Event</option>
                                    @foreach ($events as $e)
                                        <option value="{{$e->id}}">{{$e->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            
                        </div>

                        <div class="form-group{{ $errors->has('attachment') ? ' has-error' : '' }}">
                            <label for="profile" class="col-md-6 control-label">Image</label>

                            <div class="col-md-12">
                                <input id="profile" type="file" class="form-control" name="attachment" value="{{ old('attachment') }}" multiple required autofocus>

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
                                <textarea id="content" class="ckeditor" name="image_description" rows="4" cols="50" required></textarea>
                                @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


               

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Create
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
