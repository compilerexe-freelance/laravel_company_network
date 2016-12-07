@extends('layouts.header')

@section('content')

  <div class="row">

    <div class="col-md-3">

      <!-- <div class="form-group">
        <div class="text-md-center" style="//border: 1px solid #abc;margin-top: 30px;">
          <a href="#"><span style="font-size: 20px;"><i class="fa fa-comments-o fa-lg"></i> Live Chat.</span></a>
        </div>
      </div> -->

      <div class="form-group" style="margin-top: 30px;">
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

    <div class="col-md-9" style="margin-top: 30px;">

      <div class="card">

        <div class="card-block">

          <div class="col-md-12">
            <div class="form-group">
              <a href="#"><span style="font-size: 18px;">HPE ProLiant ML10 Gen9 [P/N 845678-375]</span></a>
            </div>
          </div>
          <div class="col-md-12 text-md-center">
            <img src="https://www.2beshop.com/images/products/HPE%20ProLiant%20ML10%20Gen9.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-md-8">
            Intel Xeon E3-1225v5 (3.3GHz/4-core/8MB/80W) Processor<br>
            8GB (1x8GB DDR-4 UDIMMs, 2133 MHz)<br>
            4 Disk Bay LFF None Hot Plug SATA (Upgradeability : Up to 6LFF Non-hot plug SATA 3.5" drives : Optional)<br>
            Intel Ethernet Connection I219-LM (1x1GbE)<br>
            Intel RST SATA RAID Controller (Support RAID 0/1/10, 5)<br>
            SATA DVD-RW<br>
            HP 300W Multi-Output Non-Hot Plug, Non redundant Power Supply<br>
            Intel Active Management Technology (Intel AMT 11.0)<br>
            No VGA Port!! (2 x Display Port)<br>
            3-year NBD ML10 H/W On-site Support Warranty by HPE<br>
          </div>
          <div class="col-md-12 text-md-center">
            <div class="form-group">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="border-top: 1px solid #fff !important; border-left: 1px solid #fff !important; border-right: 1px solid #fff !important;"></th>
                    <th style="border-top: 1px solid #fff !important; border-left: 1px solid #fff !important; border-right: 1px solid #fff !important;"></th>
                    <th style="border-top: 1px solid #fff !important; border-left: 1px solid #fff !important; border-right: 1px solid #fff !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>ราคาปกติ</td>
                    <td>20,000</td>
                    <td>บาท</td>
                  </tr>
                  <tr>
                    <td>ราคาของเรา</td>
                    <td>15,000</td>
                    <td>บาท</td>
                  </tr>
                  <tr>
                    <td>ประหยัด</td>
                    <td>5,000</td>
                    <td>บาท</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <a href="{{ url('quotation/form') }}"><button type="button" class="btn btn-success" style="margin-top: 20px;"><i class="fa fa-shopping-cart fa-lg"></i> สร้างใบเสนอราคา</button></a>
          </div>

        </div>
      </div>

    </div>

  </div>

@endsection
