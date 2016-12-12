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
                  <th class="text-md-center">Main Category</th>
                  <th class="text-md-center">Category Name</th>
                  <th class="text-md-center">Edit</th>
                  <th class="text-md-center">Delete</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($categorys as $category)
                  <tr>
                    <td class="text-md-center">{{ $loop->iteration }}</td>
                    <td class="text-md-center">
                      @foreach ($main_categorys as $main_category)
                        @if ($main_category->id == $category->id_main_category)
                          {{ $main_category->main_category_name }}
                        @endif
                      @endforeach
                    </td>
                    <td class="text-md-center">{{ $category->category_name }}</td>
                    <td class="text-md-center"><a href="{{ url('admin/manage/category/update/'.$category->id) }}"><button type="button" name="button" class="btn btn-info" style="width: 100%;">Edit</button></a></td>
                    <td class="text-md-center"><a href="{{ url('admin/manage/category/delete/'.$category->id) }}"><button type="button" name="button" class="btn btn-warning" style="width: 100%;">Delete</button></a></td>
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
                <form action="{{ url('admin/manage/category/insert') }}" method="post">
                  {{ csrf_field() }}
                  <tr>
                    <td class="align-middle table-none-border">Select Main Catagory</td>
                    <td class="table-none-border">
                      <select name="select_main_category" class="form-control">
                        @foreach ($main_categorys as $main_category)
                          <option value="{{ $main_category->id }}">{{ $main_category->main_category_name }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td class="table-none-border"></td>
                  </tr>
                  <tr>
                    <td class="align-middle table-none-border">Category Name</td>
                    <td class="table-none-border"><input type="text" class="form-control" name="category_name"></td>
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
