@extends('layouts.header_admin') @section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="border-radius: 0px;">
                <div class="panel-body text-center">
                    <div class="form-group">
                        <h3>Report Quotations</h3>
                    </div>
                    <div class="form-group">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Quotation ID</th>
                                    <th>Company Name</th>
                                    <th>Created</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quotations as $quotation)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ sprintf("%08d", $quotation->id) }}</td>
                                        <td>{{ $quotation->company_name }}</td>
                                        <td>{{ $quotation->created_at }}</td>
                                        <th><a href="{{ url('admin/report/quotations/'. $quotation->id) }}" target="_blank"><button type="button" class="btn btn-info" style="width: 100%;">View</button></a></th>
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
