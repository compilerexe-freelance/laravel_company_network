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
                  <th class="align-middle text-md-center">No.</th>
                  <th class="align-middle text-md-center">Main Category</th>
                  <th class="align-middle text-md-center">Category Name</th>
                  <th class="align-middle text-md-center">Sub Category Name</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($sub_categorys as $sub_category)
                  <tr>
                    <td class="align-middle text-md-center">{{ $loop->iteration }}</td>
                    <td class="align-middle text-md-center">
                      @php
                        foreach ($categorys as $category) {
                          if ($category->id == $sub_category->id_category) {
                            foreach ($main_categorys as $main_category) {
                              if ($main_category->id == $category->id_main_category) {
                                echo $main_category->main_category_name;
                              }
                            }
                          }
                        }
                      @endphp
                    </td>
                    <td class="align-middle text-md-center">
                      @php
                        foreach ($categorys as $category) {
                          if ($category->id == $sub_category->id_category) {
                            echo $category->category_name;
                          }
                        }
                      @endphp
                    </td>
                    <td class="align-middle text-md-center">{{ $sub_category->sub_category_name }}</td>
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
                <form action="{{ url('admin/manage/sub_category/update/'.$get_sub_category->id) }}" method="post">
                  {{ csrf_field() }}
                  <tr>
                    <td class="align-middle table-none-border" style="color: red;">Change Catagory</td>
                    <td class="table-none-border">
                      <select name="select_category" id="select_category" class="form-control" disabled>
                        @foreach ($categorys as $category)
                          @if ($category->id_main_category == $get_main_category->id)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </td>
                    <td class="table-none-border">
                      <label for="" class="form-check-inline">
                        <input type="checkbox" class="form-check-input" name="" id="enabled_change_category"> Enabled
                      </label>
                    </td>
                  </tr>
                  <tr>
                    <td class="align-middle table-none-border" style="color: red;">Change Sub Category</td>
                    <td class="table-none-border"><input type="text" class="form-control" name="sub_category_name" value="{{ $get_sub_category->sub_category_name }}"></td>
                    <td class="table-none-border"><button type="submit" class="btn btn-success" style="width: 100%;">Save</button></td>
                    <td class="table-none-border"><a href="{{ url('admin/manage/sub_category') }}"><button type="button" class="btn btn-warning" style="width: 100px;">Cancle</button></a></td>
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
        var id_main_category = $('#select_main_category option:selected').val();
        var id_category = null;

        $.post("{{ url('admin/manage/ajax/id_category') }}", {
          id: id_main_category
        }, function(data, status) {
          id_category = data;
        }).done(function() {
          $.post("{{ url('admin/manage/ajax/category') }}", {
            id: id_main_category
          }, function(data, status) {
            $('#select_category').empty();
            for (var i = 0; i < data.length; i++) {
              $('#select_category')
              .append("<option id=\"" + id_category[i] + "\">" + data[i] + "</option>");
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
