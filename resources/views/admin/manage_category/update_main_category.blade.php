@extends('layouts.header_admin')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="border-radius: 0px;">
        <div class="panel-body text-center">

          <div class="col-md-12">
            <span style="color: blue; font-size: 20px; font-weight: bold;">Edit Main Category</span>
          </div>

          <div class="col-md-10 col-md-offset-1 table-responsive" style="margin-top: 20px;">
            <table class="table table-bordered table-hover">
              <thead>
                <tr class="active">
                  <th>No.</th>
                  <th>Main Category Name</th>
                  <th colspan="2"></th>
                </tr>
              </thead>
              <tbody>

                @foreach ($main_categorys as $main_category)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $main_category->main_category_name }}</td>
                    <td colspan="2"></td>
                  </tr>
                @endforeach

                <form action="{{ url('admin/manage/main_category/update/'.$get_main_category->id) }}" method="post">
                  {{ csrf_field() }}
                  <tr class="warning">
                    <td style="color: red; font-weight: bold;">Change Category Name</td>
                    <td><input type="text" class="form-control" name="main_category_name" value="{{ $get_main_category->main_category_name }}"></td>
                    <td><button type="submit" class="btn btn-success" style="width: 100%;">Save</button></td>
                    <td><a href="{{ url('admin/manage/main_category') }}"><button type="button" class="btn btn-warning" style="width: 100%;">Cancle</button></a></td>
                  </tr>
                </form>

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
