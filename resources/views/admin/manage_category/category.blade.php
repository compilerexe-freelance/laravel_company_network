@extends('layouts.header_admin')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="border-radius: 0px;">
        <div class="panel-body text-center">

          <div class="col-md-12">
            <span style="color: blue; font-size: 20px; font-weight: bold;">Manage Category</span>
          </div>

          <div class="col-md-10 col-md-offset-1 table-responsive" style="margin-top: 20px;">
            <table class="table table-bordered table-hover">
              <thead>
                <tr class="active">
                  <th>No.</th>
                  <th>Main Category</th>
                  <th>Category Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($categorys as $category)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      @foreach ($main_categorys as $main_category)
                        @if ($main_category->id == $category->id_main_category)
                          {{ $main_category->main_category_name }}
                        @endif
                      @endforeach
                    </td>
                    <td>{{ $category->category_name }}</td>
                    <td><a href="{{ url('admin/manage/category/update/'.$category->id) }}"><button type="button" name="button" class="btn btn-info" style="width: 100%;">Edit</button></a></td>
                    <td><a href="{{ url('admin/manage/category/delete/'.$category->id) }}"><button type="button" name="button" class="btn btn-warning" style="width: 100%;">Delete</button></a></td>
                  </tr>
                @endforeach

                <form action="{{ url('admin/manage/category/insert') }}" method="post">
                  {{ csrf_field() }}
                  <tr class="success">
                    <td><b>Select Main Catagory</b></td>
                    <td colspan="2">
                      <select name="select_main_category" class="form-control">
                        @foreach ($main_categorys as $main_category)
                          <option value="{{ $main_category->id }}">{{ $main_category->main_category_name }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td colspan="2"></td>
                  </tr>
                  <tr class="success">
                    <td><b>Category Name</b></td>
                    <td colspan="2">
                      <input type="text" class="form-control" name="category_name">
                    </td>
                    <td colspan="2"><button type="submit" class="btn btn-success" style="width: 100%;">Add</button></td>
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
