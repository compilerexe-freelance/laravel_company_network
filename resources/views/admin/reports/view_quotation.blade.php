@extends('layouts.header_admin') @section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="border-radius: 0px;">
                <div class="panel-body text-center">
                    <div class="form-group">
                        <h3>Quotation ID {{ $quotation->id }}</h3>
                    </div>
                    <div class="form-group">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="table-none-border"></th>
                                    <th class="table-none-border"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-none-border" style="width: 50%; text-align: right;">Company Name : </td>
                                    <td class="table-none-border" style="width: 50%; text-align: left;">{{ $quotation->company_name }}</td>
                                </tr>
                                <tr>
                                    <td class="table-none-border" style="width: 50%; text-align: right;">Address : </td>
                                    <td class="table-none-border" style="width: 50%; text-align: left;">{{ $quotation->address }}</td>
                                </tr>
                                <tr>
                                    <td class="table-none-border" style="width: 50%; text-align: right;">Full Name : </td>
                                    <td class="table-none-border" style="width: 50%; text-align: left;">{{ $quotation->full_name }}</td>
                                </tr>
                                <tr>
                                    <td class="table-none-border" style="width: 50%; text-align: right;">Email : </td>
                                    <td class="table-none-border" style="width: 50%; text-align: left;">{{ $quotation->email }}</td>
                                </tr>
                                <tr>
                                    <td class="table-none-border" style="width: 50%; text-align: right;">Tel : </td>
                                    <td class="table-none-border" style="width: 50%; text-align: left;">{{ $quotation->tel }}</td>
                                </tr>
                                <tr>
                                    <td class="table-none-border" style="width: 50%; text-align: right;">Created : </td>
                                    <td class="table-none-border" style="width: 50%; text-align: left;">{{ $quotation->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
