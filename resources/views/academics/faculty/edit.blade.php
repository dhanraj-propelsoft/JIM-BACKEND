@extends('academics.faculty_base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Faculty</div>
                <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('academics.update_faculty', ['id' => $faculty->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="faculty_name" value="{{ $faculty->faculty_name }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label for="designation" class="col-md-4 control-label">Designation</label>

                            <div class="col-md-6">
                                <input id="designation" type="text" class="form-control" name="designation" value="{{ $faculty->designation }}" required autofocus>

                                @if ($errors->has('designation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('designation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('profile') ? ' has-error' : '' }}">
                            <label for="profile" class="col-md-4 control-label">Profile</label>

                            <div class="col-md-6">
                                <input id="profile" type="file" class="form-control" name="profile" value="{{ old('profile') }}" multiple autofocus>

                                @if ($errors->has('profile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('profile') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-4 control-label">About</label>

                            <div class="col-md-6">
                                <textarea id="about" class="ckeditor" name="about" rows="4" cols="50" required>{{ $faculty->about }}</textarea>
                                @if ($errors->has('about'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('about') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Mobile</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ $faculty->mobile }}" required autofocus>

                                @if ($errors->has('mobile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ $faculty->email }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Facebook</label>

                            <div class="col-md-6">
                                <input id="facebook" type="text" class="form-control" name="facebook" value="{{ $faculty->facebook }}" required autofocus>

                                @if ($errors->has('facebook'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('linked_in') ? ' has-error' : '' }}">
                            <label for="linked_in" class="col-md-4 control-label">Linked in</label>

                            <div class="col-md-6">
                                <input id="linked_in" type="text" class="form-control" name="linked_in" value="{{ $faculty->linked_in }}" required autofocus>

                                @if ($errors->has('linked_in'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('linked_in') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                            <label for="twitter" class="col-md-4 control-label">Twitter</label>

                            <div class="col-md-6">
                                <input id="twitter" type="text" class="form-control" name="twitter" value="{{ $faculty->twitter }}" required autofocus>

                                @if ($errors->has('twitter'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('twitter') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
                            <label for="instagram" class="col-md-4 control-label">Instagram</label>

                            <div class="col-md-6">
                                <input id="instagram" type="text" class="form-control" name="instagram" value="{{ $faculty->instagram }}" required autofocus>

                                @if ($errors->has('instagram'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('instagram') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('google_plus') ? ' has-error' : '' }}">
                            <label for="google_plus" class="col-md-4 control-label">Google plus</label>

                            <div class="col-md-6">
                                <input id="google_plus" type="text" class="form-control" name="google_plus" value="{{ $faculty->google_plus }}" required autofocus>

                                @if ($errors->has('google_plus'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('google_plus') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('joined_date') ? ' has-error' : '' }}">
                            <label for="joined_date" class="col-md-4 control-label">Joined date</label>

                            <div class="col-md-6">
                                <input id="joined_date" type="date" class="form-control" name="joined_date" value="{{ $faculty->joined_date }}" required autofocus>

                                @if ($errors->has('joined_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('joined_date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>





                        <div class="form-group{{ $errors->has('resume') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Resume</label>

                            <div class="col-md-6">
                                <input id="resume" type="file" class="form-control" name="resume" value="{{ old('documents') }}" multiple autofocus>

                                @if ($errors->has('resume'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('resume') }}</strong>
                                </span>
                                @endif
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

