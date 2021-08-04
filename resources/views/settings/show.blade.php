@extends('settings.base')

@section('action-content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('settings.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ $settings->email }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $settings->phone }}" required autofocus>

                                @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Facebook</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="facebook" value="{{ $settings->face_book }}" required autofocus>

                                @if ($errors->has('facebook'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('youtube') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Youtube</label>

                            <div class="col-md-6">
                                <input id="youtube" type="text" class="form-control" name="youtube" value="{{ $settings->youtube }}" required autofocus>

                                @if ($errors->has('youtube'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('youtube') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">twitter</label>

                            <div class="col-md-6">
                                <input id="twitter" type="text" class="form-control" name="twitter" value="{{ $settings->twitter }}" required autofocus>

                                @if ($errors->has('twitter'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('twitter') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Instagram</label>

                            <div class="col-md-6">
                                <input id="instagram" type="text" class="form-control" name="instagram" value="{{ $settings->instagram }}" required autofocus>

                                @if ($errors->has('instagram'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('instagram') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('linked_in') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Linked In</label>

                            <div class="col-md-6">
                                <input id="linked_in" type="text" class="form-control" name="linked_in" value="{{ $settings->linked_in }}" required autofocus>

                                @if ($errors->has('linked_in'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('linked_in') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label">Logo</label>
                            <div class="col-md-6">
                                <input type="file" id="picture" name="picture">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
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