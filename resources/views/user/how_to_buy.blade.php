@extends('layouts.header') @section('content')
<div class="container">
<div class="row">

    <div class="col-md-3">

        <!-- <div class="form-group">
        <div class="text-md-center" style="//border: 1px solid #abc;margin-top: 30px;">
          <a href="#"><span style="font-size: 20px;"><i class="fa fa-comments-o fa-lg"></i> Live Chat.</span></a>
        </div>
      </div>

        <div class="form-group" style="//margin-top: 30px;">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-success">
                    <strong>Article</strong>
                </a>
                <a href="#" class="list-group-item">Server ...</a>
                <a href="#" class="list-group-item">Server ....</a>
                <a href="#" class="list-group-item">Server ...</a>
                <a href="#" class="list-group-item">Server ...</a>
            </div>
        </div>

        <div class="form-group">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-success">
                    <strong>Solution</strong>
                </a>
                <a href="#" class="list-group-item">text ...</a>
                <a href="#" class="list-group-item">text ...</a>
                <a href="#" class="list-group-item">text ...</a>
                <a href="#" class="list-group-item">text ...</a>
            </div>
        </div> -->

        @include('layouts.sidebar_category')

    </div>

    <div class="col-md-9" style="//margin-top: 30px;">

        <div class="panel panel-default">
            <div class="panel-heading">
                <strong style="font-size: 18px;">วิธีการสั่งซื้อสินค้า</strong>
            </div>
            <div class="panel-body">
                {!! $how_to_buy->how_to_buy_detail !!}
            </div>
        </div>


    </div>

</div>
</div>

@endsection
