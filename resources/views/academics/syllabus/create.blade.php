@extends('academics.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add syllabus</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('academics.store_syllabus') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Year</label>

                            <div class="col-md-6">
                                <select  id="year" class="form-control" name="year" required>
                                    <option value="">select</option>
                                    <option value="1">First</option>
                                    <option value="2">Second</option>
                                    <option value="">Third</option>
                                </select>
                                @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('batch') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Batch</label>

                            <div class="col-md-6">
                                <input id="batch" type="text" class="form-control" name="batch" value="{{ old('batch') }}" placeholder="ex.2020-2022" required autofocus>

                                @if ($errors->has('batch'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('batch') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('documents') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Documents</label>

                            <div class="col-md-6">
                                <input id="documents" type="file" class="form-control" name="documents[]" value="{{ old('documents') }}" multiple required autofocus>

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
