@extends('academics.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Academics</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('academics.create_syllabus') }}">Add new Syllabus</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
   
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
              <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">S.no</th>
                <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">Name</th>
                <th  class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Year</th>
                <th  class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Batch</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($syllabus as $key=>$s)
                <tr role="row" class="odd">
                <td class="sorting_1">{{ $key+1 }}</td>
                  <td class="sorting_1">{{ $s->name }}</td>
                  <td class="hidden-xs">{{ $s->year }}</td>
                  <td class="hidden-xs">{{ $s->batch }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('academics.destroy_syllabus', ['id' => $s->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <!-- <input type="hidden" name="_method" value="DELETE"> -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('academics.edit_syllabus', ['id' => $s->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Update
                        </a>
                         <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          Delete
                        </button>
                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <tr role="row">
                <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">S.no</th>
                <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">Name</th>
                <th  class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Year</th>
                <th  class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Batch</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($syllabus)}} of {{count($syllabus)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $syllabus->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection