@extends('layouts.header') @section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12" style="//margin-top: 30px;">

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="col-md-4 col-md-offset-4">

                      <form action="{{ url('quotation/print') }}" method="post">
                        {{ csrf_field() }}
                        <input type="text" name="extension" value="{{ $extension }}" hidden>
                        <div class="form-group">
                            <div class="form-group"><strong>COMPANY INFOMATION</strong></div>
                            <div class="form-group"><input type="text" name="company_name" class="form-control" placeholder="ชื่อบริษัท" required></div>
                            <div class="form-group"><textarea name="address" rows="5" cols="80" class="form-control" placeholder="ที่อยู่" required></textarea></div>
                        </div>
                        <div class="form-group">
                            <div class="form-group"><strong>USER INFOMATION</strong></div>
                            <div class="form-group"><input type="text" name="full_name" class="form-control" placeholder="ชื่อ-นามสกุล" required></div>
                            <div class="form-group"><input type="email" name="email" class="form-control" placeholder="อีเมล" required></div>
                            <div class="form-group"><input type="text" name="tel" class="form-control" placeholder="เบอร์ติดต่อ" required></div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="sum" value="{{ $sum }}" hidden>
                            <input type="text" name="vat" value="{{ $vat }}" hidden>
                            <input type="text" name="inc_vat" value="{{ $inc_vat }}" hidden>
                            <div class="form-group"><button type="submit" class="btn btn-success" style="width: 100%;">สร้างใบเสนอราคา</button></div>
                        </div>

                      </form>

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
