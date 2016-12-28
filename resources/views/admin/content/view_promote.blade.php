@extends('layouts.header_admin') @section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="border-radius: 0px;">
                <div class="panel-body text-center">

                    <div class="col-md-12 table-responsive">

                      <table class="table">

                        <tbody>

                          <tr>
                            <td class="table-none-border" style="width: 15%;"></td>
                            <td class="table-none-border"><h3>View PR / Promote</h3></td>
                          </tr>
                          <tr>
                            <td class="table-none-border" style="width: 15%;">Promote Title</td>
                            <td class="table-none-border"><input type="text" name="promote_title" class="form-control" value="{{ $promote->promote_title }}"></td>
                          </tr>
                          <tr>
                            <td class="table-none-border" style="width: 15%;">Promote Detail</td>
                            <td class="table-none-border">
                              <div id="summernote">{!! $promote->promote_detail !!}</div>
                            </td>
                          </tr>
                          <tr>
                            <td class="table-none-border" style="width: 15%;"></td>
                            <td class="table-none-border">
                              <a href="{{ url('admin/content/pr_promotion') }}"><button type="button" class="btn btn-success" style="width: 20%;">Back</button></a>
                            </td>
                          </tr>

                        </tbody>

                      </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
      $(document).ready(function() {

        $('#summernote').summernote({
            toolbar: false,
            height: 300
        });

      });
    </script>

@endsection
