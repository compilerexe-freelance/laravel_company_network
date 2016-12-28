@extends('layouts.header_admin') @section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="border-radius: 0px;">
                <div class="panel-body text-center">
                    <div class="form-group">
                      <h3>PR / Promote</h3>
                    </div>
                    <div class="form-group text-left">
                      <a href="{{ url('admin/content/pr_promotion/create') }}"><button type="button" class="btn btn-success"><i class="fa fa-pencil"></i> Create PR / Promote</button></a>
                    </div>
                    <div class="form-group">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr class="active">
                            <th>No</th>
                            <th>Promote Title</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($promotes as $promote)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td><a href="{{ url('admin/content/pr_promotion/view/'.$promote->id) }}">{{ $promote->promote_title }}</a></td>
                              <td style="width: 15%;"><a href="{{ url('admin/content/pr_promotion/edit/'.$promote->id) }}"><button type="button" class="btn btn-info" style="width: 100%;">Edit</button></a></td>
                              <td style="width: 15%;"><a href="{{ url('admin/content/pr_promotion/delete/'.$promote->id) }}"><button type="button" class="btn btn-warning" style="width: 100%;">Delete</button></a></td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
