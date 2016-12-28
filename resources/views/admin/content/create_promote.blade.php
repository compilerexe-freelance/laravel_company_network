@extends('layouts.header_admin') @section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="border-radius: 0px;">
                <div class="panel-body text-center">

                    <div class="col-md-12 table-responsive">
                      <form action="{{ url('admin/content/pr_promotion/create') }}" method="post">
                        {{ csrf_field() }}
                        <table class="table">

                          <tbody>

                            <tr>
                              <td class="table-none-border" style="width: 15%;"></td>
                              <td class="table-none-border"><h3>Create PR / Promote</h3></td>
                            </tr>
                            <tr>
                              <td class="table-none-border" style="width: 15%;">Promote Title</td>
                              <td class="table-none-border"><input type="text" name="promote_title" class="form-control"></td>
                            </tr>
                            <tr>
                              <td class="table-none-border" style="width: 15%;">Promote Detail</td>
                              <td class="table-none-border">
                                <div id="summernote"></div>
                                <input type="hidden" name="promote_detail" id="promote_detail">
                              </td>
                            </tr>
                            <tr>
                              <td class="table-none-border" style="width: 15%;"></td>
                              <td class="table-none-border"><button type="submit" class="btn btn-success" style="width: 20%;">Save</button></td>
                            </tr>

                          </tbody>

                        </table>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
      $(document).ready(function() {

        $('#summernote').summernote({
            height: 300
        });
        $('#summernote').on('summernote.change', function(we, contents, $editable) {
            $('#promote_detail').val(contents);
            // console.log(contents);
        });

      });
    </script>

@endsection
