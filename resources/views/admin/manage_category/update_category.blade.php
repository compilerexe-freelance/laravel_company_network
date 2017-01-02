@extends('layouts.header_admin')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="border-radius: 0px;">
        <div class="panel-body text-center">

          <div class="col-md-12">
            <span style="color: blue; font-size: 20px; font-weight: bold;">Edit Category</span>
          </div>

          <div class="col-md-10 col-md-offset-1 table-responsive" style="margin-top: 20px;">
            <table class="table table-bordered table-hover">
              <thead>
                <tr class="active">
                  <th>No.</th>
                  <th>Main Category</th>
                  <th colspan="2">Category Name</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($categorys as $category)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      @foreach ($main_categorys as $main_category)
                        @if ($main_category->id == $category->main_category_id)
                          {{ $main_category->main_category_name }}
                        @endif
                      @endforeach
                    </td>
                    <td colspan="2">{{ $category->category_name }}</td>
                  </tr>
                @endforeach

                <form action="{{ url('admin/manage/category/update/'.$get_category->id) }}" method="post">
                  {{ csrf_field() }}
                  <tr class="warning">
                    <td style="color: red; font-weight: bold;">Change Main Catagory</td>
                    <td>
                      <select name="select_main_category" class="form-control" id="select_main_category" disabled>
                        @foreach ($main_categorys as $main_category)
                          @if ($get_category->main_category_id == $main_category->id)
                            <option value="{{ $main_category->id }}" selected>{{ $main_category->main_category_name }}</option>
                          @else
                            <option value="{{ $main_category->id }}">{{ $main_category->main_category_name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </td>
                    <td colspan="2">
                      <label for="" class="form-check-inline">
                        <input type="checkbox" class="form-check-input" name="" id="enabled_change_main_category"> Enabled
                      </label>
                    </td>
                  </tr>

                  <tr class="warning">
                    <td style="color: red; font-weight: bold;">Filter Category</td>
                    <td>
                      <select name="filter_category" id="filter_category" class="form-control" disabled>
                        @if ($get_category->filter_category == 0)
                          <option value="0" selected>Complete</option>
                          <option value="1">Custom</option>
                        @else
                          <option value="0">Complete</option>
                          <option value="1" selected>Custom</option>
                        @endif
                      </select>
                    </td>
                    <td colspan="2">
                      <label for="" class="form-check-inline">
                        <input type="checkbox" class="form-check-input" name="" id="enabled_change_filter_category"> Enabled
                      </label>
                    </td>
                  </tr>

                  <tr class="warning">
                    <td style="color: red; font-weight: bold;">Change Category Name</td>
                    <td><input type="text" class="form-control" name="category_name" value="{{ $get_category->category_name }}"></td>
                    <td><button type="submit" class="btn btn-success" style="width: 100%;">Save</button></td>
                    <td><a href="{{ url('admin/manage/category') }}"><button type="button" class="btn btn-warning" style="width: 100%;">Cancle</button></a></td>
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
      $('#enabled_change_main_category').on('change', function() {

        if ($(this).is(':checked')) {
          $('#select_main_category').prop('disabled', false);
        } else {
          $('#select_main_category').prop('disabled', true);
        }

      });

      $('#enabled_change_filter_category').on('change', function() {

        if ($(this).is(':checked')) {
          $('#filter_category').prop('disabled', false);
        } else {
          $('#filter_category').prop('disabled', true);
        }

      });
    });
  </script>

@endsection
