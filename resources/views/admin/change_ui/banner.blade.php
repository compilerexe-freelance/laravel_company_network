@extends('layouts.header_admin') @section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="border-radius: 0px;">
                <div class="panel-body text-center">

                  <form action="{{ url('admin/change/ui/banner') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-4 col-md-offset-4">
                      <div class="form-group">
                        <h3>Change Banner</h3>
                      </div>
                      <div class="form-group">
                        <input type="file" name="fileupload">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-success" style="width: 50%;">Save</button>
                      </div>
                    </div>
                  </form>

                </div>
            </div>
        </div>
    </div>

@endsection
