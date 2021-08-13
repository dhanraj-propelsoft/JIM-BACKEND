@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Academics>Learning
      </h1>
      <ol class="breadcrumb">
        <li class="active">Academics</li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Learning</h3>
        </div>
        <div class="col-sm-4" style="display:none">
          <a class="btn btn-primary" href="{{ route('home-page.create_slider') }}">Add new Slider</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
      <form class="form-horizontal" role="form" method="POST" action="{{ route('academics.store_learning') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('communication_course') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-4 control-label">Communication Course</label>

                            <div class="col-md-12">
                                <textarea id="about" class="ckeditor" name="communication_course" rows="4" cols="50" required>@isset($learning->communication_course)
{{ $learning->communication_course}}@endisset</textarea>
                                @if ($errors->has('communication_course'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('communication_course') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('bridge_course') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-4 control-label">Bridge Course</label>

                            <div class="col-md-12">
                                <textarea id="about" class="ckeditor" name="bridge_course" rows="4" cols="50" required>
                                @isset($learning->bridge_course)
                                {{ $learning->bridge_course}}
@endisset
                                  </textarea>
                                @if ($errors->has('bridge_course'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bridge_course') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('personal_growth_lab') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-4 control-label">Personal growth lab</label>

                            <div class="col-md-12">
                                <textarea id="about" class="ckeditor" name="personal_growth_lab" rows="4" cols="50" required>
                                @isset($learning->personal_growth_lab)
                                {{ $learning->personal_growth_lab}}
@endisset

                              </textarea>
                                @if ($errors->has('personal_growth_lab'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('personal_growth_lab') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('skill_enhancements') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-4 control-label">Skill enhancement programme</label>

                            <div class="col-md-12">
                                <textarea id="about" class="ckeditor" name="skill_enhancements" rows="4" cols="50" required>
                                @isset($learning->skill_enhancements)
                                {{ $learning->skill_enhancements}}
@endisset  
                                </textarea>
                                @if ($errors->has('skill_enhancements'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('skill_enhancements') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('indian_institute_interface') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-4 control-label">The Indian Institute Interface</label>

                            <div class="col-md-12">
                                <textarea id="about" class="ckeditor" name="indian_institute_interface" rows="4" cols="50" required>
                                @isset($learning->indian_institute_interface)
                                {{ $learning->indian_institute_interface}}
@endisset    
                               </textarea>
                                @if ($errors->has('indian_institute_interface'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('indian_institute_interface') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('learning_assest') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-4 control-label">Assessment of Leaning</label>

                            <div class="col-md-12">
                                <textarea id="about" class="ckeditor" name="learning_assest" rows="4" cols="50" required>
                                @isset($learning->learning_assest)
                                {{ $learning->learning_assest}}
@endisset      
                               </textarea>
                                @if ($errors->has('learning_assest'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('learning_assest') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('learning_academy') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-4 control-label">Learning Academy</label>

                            <div class="col-md-12">
                                <textarea id="about" class="ckeditor" name="learning_academy" rows="4" cols="50" required>
                                  
                                @isset($learning->learning_academy)
                                {{ $learning->learning_academy}}
@endisset      
                                
                                </textarea>
                                @if ($errors->has('learning_academy'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('learning_academy') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('industrial_training') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-4 control-label">Industrial Ready Training</label>

                            <div class="col-md-12">
                                <textarea id="about" class="ckeditor" name="industrial_training" rows="4" cols="50" required>
                                @isset($learning->industrial_training)
                                {{ $learning->industrial_training}}
@endisset      
                              </textarea>
                                @if ($errors->has('industrial_training'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('industrial_training') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('social_involvement') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-4 control-label">Social Involvement Programme</label>

                            <div class="col-md-12">
                                <textarea id="about" class="ckeditor" name="social_involvement" rows="4" cols="50" required>
                                @isset($learning->social_involvement)
                                {{ $learning->social_involvement}}
@endisset      

                               </textarea>
                                @if ($errors->has('social_involvement'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('social_involvement') }}</strong>
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
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
   <!-- /.box-body -->
   </div>
       </section>
       <!-- /.content -->
     </div>
   @endsection