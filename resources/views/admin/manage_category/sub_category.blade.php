@extends('layouts.header_admin')

@section('content')

  <div class="row">
    <div class="col-md">
      <div class="card" style="border-radius: 0px;">
        <div class="card-block text-md-center">

          <div class="col-md-10 offset-md-1">
            <table class="table table-bordered">
              <thead class="thead-inverse">
                <tr>
                  <th class="align-middle text-md-center">No.</th>
                  <th class="align-middle text-md-center">Main Category</th>
                  <th class="align-middle text-md-center">Category Name</th>
                  <th class="align-middle text-md-center">Sub Category Name</th>
                  <th class="align-middle text-md-center">Edit</th>
                  <th class="align-middle text-md-center">Delete</th>
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
                    <td class="align-middle text-md-center"><a href="{{ url('admin/manage/sub_category/update/'.$sub_category->id) }}"><button type="button" name="button" class="btn btn-info" style="width: 100%;">Edit</button></a></td>
                    <td class="align-middle text-md-center"><a href="{{ url('admin/manage/sub_category/delete/'.$sub_category->id) }}"><button type="button" name="button" class="btn btn-warning" style="width: 100%;">Delete</button></a></td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>

          <div class="col-md-10 offset-md-1" style="border: 1px solid #abc; border-radius: 5px;">
            <table class="table">
              <thead>
                <tr>
                  <th class="table-none-border"></th>
                  <th class="table-none-border"></th>
                  <th class="table-none-border"></th>
                </tr>
              </thead>
              <tbody>
                <form action="{{ url('admin/manage/sub_category/insert') }}" method="post">
                  {{ csrf_field() }}
                  <tr>
                    <td class="align-middle table-none-border"></td>
                    <td class="table-none-border"><strong style="color: blue; font-size: 20px;">INSERT</strong></td>
                    <td class="table-none-border"></td>
                  </tr>
                  <tr>
                    <td class="align-middle table-none-border">Select Main Catagory</td>
                    <td class="table-none-border">
                      <select name="select_main_category" id="select_main_category" class="form-control">
                        @foreach ($main_categorys as $main_category)
                          <option value="{{ $main_category->id }}">{{ $main_category->main_category_name }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td class="table-none-border"></td>
                  </tr>
                  <tr>
                    <td class="align-middle table-none-border">Select Catagory</td>
                    <td class="table-none-border">
                      <select name="select_category" id="select_category" class="form-control"></select>
                    </td>
                    <td class="table-none-border"></td>
                  </tr>
                  <tr>
                    <td class="align-middle table-none-border">Sub Category Name</td>
                    <td class="table-none-border"><input type="text" class="form-control" name="sub_category_name"></td>
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
