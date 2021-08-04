@extends('home.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Events</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('home-page.update_events', ['id' => $events->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $events->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="content" name="description" rows="4" cols="50" required autofocus>{{ $events->description }}
</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-4 control-label">Event Date</label>
                        <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="event_date" value="{{ $events->event_date }}" required autofocus>

                                @if ($errors->has('event_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                      
                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label" >Image</label>
                            <div class="col-md-6">
                                <input type="file" id="picture" name="picture" >
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
