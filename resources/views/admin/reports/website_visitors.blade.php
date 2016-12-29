@extends('layouts.header_admin') @section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="border-radius: 0px;">
                <div class="panel-body text-center">
                    <div class="form-group">
                      <h3>Report Website Visitors</h3>
                    </div>
                    <div class="form-group">
                      <span style="font-size: 20px;">{{ $count }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
