@extends('layouts.header_admin')

@section('content')

  <div class="row">
    <div class="col-md">
      <div class="card" style="border-radius: 0px;">
        <div class="card-block text-md-center">

          <div class="col-md-8 offset-md-2">
            <table class="table table-bordered">
              <thead class="thead-default">
                <tr>
                  <th class="text-md-center">No.</th>
                  <th class="text-md-center">Main Category Name</th>
                  <th class="text-md-center">Edit</th>
                  <th class="text-md-center">Delete</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($main_categorys as $main_category)
                  <tr>
                    <td class="text-md-center">{{ $loop->iteration }}</td>
                    <td class="text-md-center">{{ $main_category->main_category_name }}</td>
                    <td class="text-md-center"><a href="{{ url('admin/manage/main_category/update/'.$main_category->id) }}"><button type="button" name="button" class="btn btn-info" style="width: 100%;">Edit</button></a></td>
                    <td class="text-md-center"><a href="{{ url('admin/manage/main_category/delete/'.$main_category->id) }}"><button type="button" name="button" class="btn btn-warning" style="width: 100%;">Delete</button></a></td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>

          <div class="col-md-8 offset-md-2">
            <table class="table">
              <thead>
                <tr>
                  <th class="table-none-border"></th>
                  <th class="table-none-border"></th>
                  <th class="table-none-border"></th>
                </tr>
              </thead>
              <tbody>
                <form action="{{ url('admin/manage/main_category/insert') }}" method="post">
                  {{ csrf_field() }}
                  <tr>
                    <td class="align-middle table-none-border">Main Category Name</td>
                    <td class="table-none-border"><input type="text" class="form-control" name="main_category_name"></td>
                    <td class="table-none-border"><button type="submit" class="btn btn-success" style="width: 100%;">Add</button></td>
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
