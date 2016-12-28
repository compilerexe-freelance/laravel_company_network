@extends('layouts.header_admin') @section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="border-radius: 0px;">
                <div class="panel-body text-center">

                  <div class="col-md-12 table-responsive">
                    <form action="{{ url('admin/change_ui/contact/edit') }}" method="post">
                      {{ csrf_field() }}
                      <table class="table">

                        <tbody>

                          <tr>
                            <td class="table-none-border"><h3>Edit Contact Detail</h3></td>
                          </tr>
                          <tr>
                            <td class="table-none-border">
                              <div id="summernote1">{!! $contact->contact_detail !!}</div>
                              <input type="hidden" name="contact_detail" id="contact_detail" value="{{ $contact->contact_detail }}">
                            </td>
                          </tr>

                          <tr>
                            <td class="table-none-border"><h3>Edit Contact Map (Source Code)</h3></td>
                          </tr>
                          <tr>
                            <td class="table-none-border">
                              <div id="summernote2">{{ $contact->contact_map }}</div>
                              <input type="hidden" name="contact_map" id="contact_map" value="{{ $contact->contact_map }}">
                            </td>
                          </tr>
                          <tr>
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

        $('#summernote1').summernote({
            height: 300
        });
        $('#summernote1').on('summernote.change', function(we, contents, $editable) {
            $('#contact_detail').val(contents);
            // console.log(contents);
        });

        $('#summernote2').summernote({
            height: 300
        });
        $('#summernote2').on('summernote.change', function(we, contents, $editable) {
            $('#contact_map').val(contents);
            // console.log(contents);
        });

      });
    </script>

@endsection
