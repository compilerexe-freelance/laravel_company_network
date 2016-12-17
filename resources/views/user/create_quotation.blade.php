@extends('layouts.header') @section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12" style="//margin-top: 30px;">

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <div class="form-group"><strong>COMPANY INFOMATION</strong></div>
                            <div class="form-group"><input type="text" class="form-control" placeholder="ชื่อบริษัท"></div>
                            <div class="form-group"><textarea name="name" rows="5" cols="80" class="form-control" placeholder="ที่อยู่"></textarea></div>
                        </div>
                        <div class="form-group">
                            <div class="form-group"><strong>USER INFOMATION</strong></div>
                            <div class="form-group"><input type="text" class="form-control" placeholder="ชื่อ-นามสกุล"></div>
                            <div class="form-group"><input type="email" class="form-control" placeholder="อีเมล"></div>
                            <div class="form-group"><input type="text" class="form-control" placeholder="เบอร์ติดต่อ"></div>
                        </div>
                        <div class="form-group">
                            <div class="form-group"><button type="button" class="btn btn-success" style="width: 100%;">สร้างใบเสนอราคา</button></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
