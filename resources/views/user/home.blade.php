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
                    <strong style="font-size: 18px; //color: white;">Company</strong>
                </div>
                <div class="panel-body">
                    {!! $information_index->information_detail !!}
                </div>
            </div>

            <div class="form-group">
                <div class="list-group">
                    <li class="list-group-item" style="background-color: #f2f2f2;"><strong style="font-size: 18px; //color: white;"><i class="fa fa-feed"></i> ข่าวสาร / โปรโมชั่น</strong></li>
                    @foreach ($promotes as $promote)
                      <li class="list-group-item"><a href="{{ url('news/read/'.$promote->id) }}">{{ $promote->promote_title }}</a></li>
                    @endforeach
                    <!-- <li class="list-group-item"><a href="{{ url('news/read') }}">ข่าวสาร ...</a></li>
                    <li class="list-group-item"><a href="{{ url('news/read') }}">ข่าวสาร ...</a></li>
                    <li class="list-group-item"><a href="{{ url('news/read') }}">ข่าวสาร ...</a></li>
                    <li class="list-group-item"><a href="{{ url('news/read') }}">โปรโมชั่น ...</a></li>
                    <li class="list-group-item"><a href="{{ url('news/read') }}">โปรโมชั่น ...</a></li> -->
                </div>
            </div>

            <div class="panel panel-default">

                <div class="panel-body">

                    @foreach ($products as $product)
                      <div class="col-md-12">
                          <div class="form-group">
                              <span style="font-size: 18px;">{{ $product->product_name }}</span>
                          </div>
                      </div>
                      @if ($product->product_picture != null)
                        <div class="col-md-4">
                            <!-- <a href="{{ url('product/detail') }}"> -->
                                <img src="{{ url('uploads/products/'.$product->product_picture) }}" alt="" class="img-responsive">
                            <!-- </a> -->
                        </div>
                        <div class="col-md-8">
                      @else
                        <div class="col-md-12">
                      @endif

                          {!! $product->product_detail !!}

                          <div class="text-right">
                            <a href="{{ url('quotation/form/'.$product->id) }}">
                              <button type="button" class="btn btn-success" style="margin-top: 20px;">
                                <i class="fa fa-shopping-cart fa-lg"></i> สร้างใบเสนอราคา
                              </button>
                            </a>
                          </div>

                      </div>
                      <div class="col-md-12">
                          <hr>
                      </div>
                    @endforeach

                    <!-- <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('product/detail') }}"><span style="font-size: 18px;">HPE ProLiant ML10 Gen9 [P/N 845678-375]</span></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url('product/detail') }}">
                            <img src="https://www.2beshop.com/images/products/HPE%20ProLiant%20ML10%20Gen9.jpg" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-md-8">
                        Intel Xeon E3-1225v5 (3.3GHz/4-core/8MB/80W) Processor<br> 8GB (1x8GB DDR-4 UDIMMs, 2133 MHz)<br> 4 Disk Bay LFF None Hot Plug SATA (Upgradeability : Up to 6LFF Non-hot plug SATA 3.5" drives : Optional)<br> Intel Ethernet Connection
                        I219-LM (1x1GbE)<br> Intel RST SATA RAID Controller (Support RAID 0/1/10, 5)<br> SATA DVD-RW<br> HP 300W Multi-Output Non-Hot Plug, Non redundant Power Supply<br> Intel Active Management Technology (Intel AMT 11.0)<br> No VGA Port!!
                        (2 x Display Port)<br> 3-year NBD ML10 H/W On-site Support Warranty by HPE<br>

                        <button type="button" class="btn btn-success float-md-right" style="margin-top: 20px;"><i class="fa fa-shopping-cart fa-lg"></i> สร้างใบเสนอราคา</button>

                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('product/detail') }}"><span style="font-size: 18px;">HPE ProLiant ML10 Gen9 [P/N 845678-375]</span></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url('product/detail') }}">
                            <img src="https://www.2beshop.com/images/products/HPE%20ProLiant%20ML10%20Gen9.jpg" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-md-8">
                        Intel Xeon E3-1225v5 (3.3GHz/4-core/8MB/80W) Processor<br> 8GB (1x8GB DDR-4 UDIMMs, 2133 MHz)<br> 4 Disk Bay LFF None Hot Plug SATA (Upgradeability : Up to 6LFF Non-hot plug SATA 3.5" drives : Optional)<br> Intel Ethernet Connection
                        I219-LM (1x1GbE)<br> Intel RST SATA RAID Controller (Support RAID 0/1/10, 5)<br> SATA DVD-RW<br> HP 300W Multi-Output Non-Hot Plug, Non redundant Power Supply<br> Intel Active Management Technology (Intel AMT 11.0)<br> No VGA Port!!
                        (2 x Display Port)<br> 3-year NBD ML10 H/W On-site Support Warranty by HPE<br>

                        <button type="button" class="btn btn-success float-md-right" style="margin-top: 20px;"><i class="fa fa-shopping-cart fa-lg"></i> สร้างใบเสนอราคา</button>

                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div> -->

                </div>
            </div>

        </div>

    </div>
</div>
@endsection
