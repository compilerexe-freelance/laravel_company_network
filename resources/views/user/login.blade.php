@extends('layouts.header') @section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12" style="//margin-top: 30px;">

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="col-md-4 col-md-offset-4 text-center">
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
                                        <td class="table-none-border">Username</td>
                                        <td class="table-none-border"><input type="text" class="form-control" name="" value=""></td>
                                    </tr>
                                    <tr>
                                        <td class="table-none-border">Password</td>
                                        <td class="table-none-border"><input type="password" class="form-control" name="" value=""></td>
                                    </tr>
                                    <tr>
                                        <td class="table-none-border"></td>
                                        <td class="table-none-border"><button type="button" class="btn btn-success" style="width: 100%;">เข้าสู่ระบบ</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection
