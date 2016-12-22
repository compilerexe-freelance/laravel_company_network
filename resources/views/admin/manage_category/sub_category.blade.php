@extends('layouts.header_admin')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="border-radius: 0px;">
        <div class="panel-body text-center">

          <div class="col-md-12">
            <span style="color: blue; font-size: 20px; font-weight: bold;">Manage Sub Category</span>
          </div>

          <div class="col-md-10 col-md-offset-1 table-responsive" style="margin-top: 20px;">
            <table class="table table-bordered table-hover">
              <thead>
                <tr class="active">
                  <th>No.</th>
                  <th>Main Category</th>
                  <th>Category Name</th>
                  <th>Sub Category Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($sub_categorys as $sub_category)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
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
                    <td>
                      @php
                        foreach ($categorys as $category) {
                          if ($category->id == $sub_category->id_category) {
                            echo $category->category_name;
                          }
                        }
                      @endphp
                    </td>
                    <td>{{ $sub_category->sub_category_name }}</td>
                    <td><a href="{{ url('admin/manage/sub_category/update/'.$sub_category->id) }}"><button type="button" name="button" class="btn btn-info" style="width: 100%;">Edit</button></a></td>
                    <td><a href="{{ url('admin/manage/sub_category/delete/'.$sub_category->id) }}"><button type="button" name="button" class="btn btn-warning" style="width: 100%;">Delete</button></a></td>
                  </tr>
                @endforeach

                <form action="{{ url('admin/manage/sub_category/insert') }}" method="post">
                  {{ csrf_field() }}
                  <tr class="success">
                    <td colspan="2"><b>Select Main Catagory</b></td>
                    <td colspan="2">
                      <select name="select_main_category" id="select_main_category" class="form-control">
                        @foreach ($main_categorys as $main_category)
                          <option value="{{ $main_category->id }}">{{ $main_category->main_category_name }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td colspan="2"></td>
                  </tr>
                  <tr class="success">
                    <td colspan="2"><b>Select Catagory</b></td>
                    <td colspan="2">
                      <select name="select_category" id="select_category" class="form-control"></select></td>
                    <td colspan="2"></td>
                  </tr>
                  <tr class="success">
                    <td colspan="2"><b>Sub Category Name</b></td>
                    <td colspan="2"><input type="text" class="form-control" name="sub_category_name"></td>
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

    });
  </script>

@endsection
