@extends('layouts.header_admin')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="border-radius: 0px;">
        <div class="panel-body text-center">

          <div class="col-md-12">
            <span style="color: blue; font-size: 20px; font-weight: bold;">Edit Sub Category</span>
          </div>

          <div class="col-md-10 col-md-offset-1 table-responsive" style="margin-top: 20px;">
            <table class="table table-bordered table-hover">
              <thead>
                <tr class="active">
                  <th>No.</th>
                  <th>Main Category</th>
                  <th>Category Name</th>
                  <th>Sub Category Name</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($sub_categorys as $sub_category)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      @php
                        foreach ($categorys as $category) {
                          if ($category->id == $sub_category->category_id) {
                            foreach ($main_categorys as $main_category) {
                              if ($main_category->id == $category->main_category_id) {
                                echo $main_category->main_category_name;
                              }
                            }
                          }
                        }
                      @endphp
                    </td>
                    <td>
                      @php
                        foreach ($categorys as $category) {
                          if ($category->id == $sub_category->category_id) {
                            echo $category->category_name;
                          }
                        }
                      @endphp
                    </td>
                    <td>{{ $sub_category->sub_category_name }}</td>
                  </tr>
                @endforeach

                <form action="{{ url('admin/manage/sub_category/update/'.$get_sub_category->id) }}" method="post">
                  {{ csrf_field() }}
                  <tr class="warning">
                    <td style="color: red; font-weight: bold;">Change Catagory</td>
                    <td>
                      <select name="select_category" id="select_category" class="form-control" disabled>
                        @foreach ($categorys as $category)
                          @if ($category->main_category_id == $get_main_category->id)
                            @if ($sub_category->category_id == $category->id)
                              <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                            @else
                              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endif
                          @endif
                        @endforeach
                      </select>
                    </td>
                    <td colspan="2">
                      <label for="" class="form-check-inline">
                        <input type="checkbox" class="form-check-input" name="" id="enabled_change_category"> Enabled
                      </label>
                    </td>
                  </tr>
                  <tr class="warning">
                    <td style="color: red; font-weight: bold;">Change Sub Category</td>
                    <td><input type="text" class="form-control" name="sub_category_name" value="{{ $get_sub_category->sub_category_name }}"></td>
                    <td><button type="submit" class="btn btn-success" style="width: 100%;">Save</button></td>
                    <td><a href="{{ url('admin/manage/sub_category') }}"><button type="button" class="btn btn-warning" style="width: 100%;">Cancle</button></a></td>
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
    $(document).ready(function(){

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('#select_main_category').on('change', function() {
        var main_category_id = $('#select_main_category option:selected').val();
        var category_id = null;

        $.post("{{ url('admin/manage/ajax/category_id') }}", {
          id: main_category_id
        }, function(data, status) {
          category_id = data;
        }).done(function() {
          $.post("{{ url('admin/manage/ajax/category') }}", {
            id: main_category_id
          }, function(data, status) {
            $('#select_category').empty();
            for (var i = 0; i < data.length; i++) {
              $('#select_category')
              .append("<option id=\"" + category_id[i] + "\">" + data[i] + "</option>");
            }
            // console.log("data: " + data + "\n" + "status: " + status);
          });
        });

      });

      $('#select_main_category').change();

      $('#enabled_change_main').on('change', function() {

        if ($(this).is(':checked')) {
          $('#select_main_category').prop('disabled', false);
          $('#select_category').prop('disabled', false);
        } else {
          $('#select_main_category').prop('disabled', true);
        }

      });

      $('#enabled_change_category').on('change', function() {

        if ($(this).is(':checked')) {
          $('#select_category').prop('disabled', false);
        } else {
          $('#select_category').prop('disabled', true);
        }

      });

    });
  </script>

@endsection
