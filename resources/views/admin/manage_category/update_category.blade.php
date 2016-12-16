@extends('layouts.header_admin')

@section('content')

  <div class="row">
    <div class="col-md">
      <div class="card" style="border-radius: 0px;">
        <div class="card-block text-md-center">

          <div class="col-md-10 offset-md-1">
            <table class="table table-bordered table-hover">
              <thead class="thead-inverse">
                <tr>
                  <th class="text-md-center">No.</th>
                  <th class="text-md-center">Main Category</th>
                  <th class="text-md-center">Category Name</th>
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
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>

          <div class="col-md-10 offset-md-1">
            <table class="table">
              <thead>
                <tr>
                  <th class="table-none-border"></th>
                  <th class="table-none-border"></th>
                  <th class="table-none-border"></th>
                  <th class="table-none-border"></th>
                </tr>
              </thead>
              <tbody>
                <form action="{{ url('admin/manage/category/update/'.$get_category->id) }}" method="post">
                  {{ csrf_field() }}
                  <tr>
                    <td class="align-middle table-none-border" style="color: red;">Change Main Catagory</td>
                    <td class="table-none-border">
                      <select name="select_main_category" class="form-control" id="select_main_category" disabled>
                        @foreach ($main_categorys as $main_category)
                          <option value="{{ $main_category->id }}">{{ $main_category->main_category_name }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td class="table-none-border align-middle">
                      <label for="" class="form-check-inline">
                        <input type="checkbox" class="form-check-input" name="" id="enabled_change"> Enabled
                      </label>
                    </td>
                    <td class="table-none-border align-middle"></td>
                  </tr>

                  <tr>
                    <td class="align-middle table-none-border"  style="color: red;">Change Category Name</td>
                    <td class="table-none-border"><input type="text" class="form-control" name="category_name" value="{{ $get_category->category_name }}"></td>
                    <td class="table-none-border"><button type="submit" class="btn btn-success" style="width: 100px;">Save</button></td>
                    <td class="table-none-border"><a href="{{ url('admin/manage/category') }}"><button type="button" class="btn btn-warning" style="width: 100px;">Cancle</button></a></td>
                  </tr>
                </form>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#enabled_change').on('change', function() {

        if ($(this).is(':checked')) {
          $('#select_main_category').prop('disabled', false);
        } else {
          $('#select_main_category').prop('disabled', true);
        }

      });
    });
  </script>

@endsection
