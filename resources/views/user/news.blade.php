@extends('layouts.header') @section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3">

            <!-- <div class="form-group">
        <div class="text-md-center" style="//border: 1px solid #abc;margin-top: 30px;">
          <a href="#"><span style="font-size: 20px;"><i class="fa fa-comments-o fa-lg"></i> Live Chat.</span></a>
        </div>
      </div> -->

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
            </div>

            <div class="form-group">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-success">
                        <strong>Category</strong>
                    </a>
                    <div class="list-group-item">
                        <span>TOWER 1 CPU (E3)</span>
                        <hr style="margin-top: 5px; margin-bottom: 5px;">
                        <a href="#">DELL ...</a><br>
                        <a href="#">DELL ...</a><br>
                        <a href="#">DELL ...</a><br><br>

                        <span>TOWER 1 CPU (E5)</span>
                        <hr style="margin-top: 5px; margin-bottom: 5px;">
                        <a href="#">DELL ...</a><br>
                        <a href="#">DELL ...</a><br>
                        <a href="#">DELL ...</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-9" style="//margin-top: 30px;">

            <div class="form-group">
                <div class="list-group">
                    <li class="list-group-item" style="background-color: #f2f2f2;"><strong style="font-size: 18px; //color: white;"><i class="fa fa-feed"></i> ข่าวสาร / โปรโมชั่น</strong></li>
                    <li class="list-group-item"><a href="{{ url('news/read') }}">ข่าวสาร ...</a></li>
                    <li class="list-group-item"><a href="{{ url('news/read') }}">ข่าวสาร ...</a></li>
                    <li class="list-group-item"><a href="{{ url('news/read') }}">ข่าวสาร ...</a></li>
                    <li class="list-group-item"><a href="{{ url('news/read') }}">โปรโมชั่น ...</a></li>
                    <li class="list-group-item"><a href="{{ url('news/read') }}">โปรโมชั่น ...</a></li>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
