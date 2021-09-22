@extends('guest_speaker.guest_base')
@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Guest Speakers</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('guest_speaker.store_guest_speaker') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-6 control-label">Date</label>

                            <div class="col-md-12">
                                <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" required autofocus>

                                @if ($errors->has('date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
                                @endif
                            </div>


                        </div>

                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-6 control-label">Name of the Activity</label>

                            <div class="col-md-12">
                                <input id="activity" type="text" class="form-control" name="activity" value="{{ old('activity') }}" required autofocus>

                                @if ($errors->has('activity'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('activity') }}</strong>
                                </span>
                                @endif
                            </div>


                        </div>
                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-6 control-label">Resource Person</label>

                            <div class="col-md-12">
                                <input id="resource_person" type="text" class="form-control" name="resource_person" value="{{ old('resource_person') }}" required autofocus>

                                @if ($errors->has('resource_person'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('resource_person') }}</strong>
                                </span>
                                @endif
                            </div>


                        </div>
                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-6 control-label">Beneficiaries</label>

                            <div class="col-md-12">
                                <input id="beneficiaries" type="text" class="form-control" name="beneficiaries" value="{{ old('beneficiaries') }}" required autofocus>

                                @if ($errors->has('beneficiaries'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('beneficiaries') }}</strong>
                                </span>
                                @endif
                            </div>


                        </div>
                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-6 control-label">Time</label>

                            <div class="col-md-12">
                                <input id="time" type="time" class="form-control" name="time" value="{{ old('time') }}" required autofocus onchange="onTimeChange()">
                                <input id="time1" type="text" name="time1" class="form-control" readonly>
                                @if ($errors->has('time'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('time') }}</strong>
                                </span>
                                @endif
                            </div>


                        </div>
                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-6 control-label">Place</label>

                            <div class="col-md-12">
                                <input id="place" type="text" class="form-control" name="place" value="{{ old('place') }}" required autofocus>

                                @if ($errors->has('place'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('place') }}</strong>
                                </span>
                                @endif
                            </div>


                        </div>

                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-6 control-label">Content</label>

                            <div class="col-md-12">
                                <textarea id="content" class="ckeditor" name="content" rows="4" cols="50" required></textarea>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  
function onTimeChange() {
    var inputEle = document.getElementById('time');
  var timeSplit = inputEle.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
  $("#time1").val(hours + ':' + minutes + ' ' + meridian);
}
</script>