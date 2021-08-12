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
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
   <!-- /.box-body -->
   </div>
       </section>
       <!-- /.content -->
     </div>
   @endsection