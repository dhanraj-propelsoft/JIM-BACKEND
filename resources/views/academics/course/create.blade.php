@extends('academics.course_base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Course Allotment</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('academics.store_course_allotment') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="faculty" class="col-md-4 control-label">Faculty</label>

                            <div class="col-md-6">
                                <input id="faculty" type="text" class="form-control" name="faculty" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('faculty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('faculty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('semester') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Semester</label>

                            <div class="col-md-6">
                                <select  id="semester" class="form-control" name="semester" required>
                                    <option value="">select</option>
                                    <option value="1">First</option>
                                    <option value="2">Second</option>
                                    <option value="">Third</option>
                                </select>
                                @if ($errors->has('semester'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('semester') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('session') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Session</label>

                            <div class="col-md-6">
                                <input id="session" type="text" class="form-control" name="session" value="{{ old('batch') }}" placeholder="Enter Session" required autofocus>

                                @if ($errors->has('session'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('session') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Total</label>

                            <div class="col-md-6">
                                <input id="total" type="text" class="form-control" name="total" value="{{ old('batch') }}" placeholder="Enter Total" required autofocus>

                                @if ($errors->has('total'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('total') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                            
                            <textarea id="description" class="form-control" name="description" rows="4" cols="50"></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('documents') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Documents</label>

                            <div class="col-md-6">
                                <input id="documents" type="file" class="form-control" name="documents" value="{{ old('documents') }}" multiple required autofocus>

                                @if ($errors->has('documents'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('documents') }}</strong>
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
