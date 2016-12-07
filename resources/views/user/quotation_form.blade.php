@extends('layouts.header')

@section('content')

  <div class="row">

    <div class="col-md-12" style="margin-top: 30px;">

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

          <div class="col-md-4 offset-md-4 text-md-center">
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
                    <td>SUM</td>
                    <td>20,000</td>
                    <td>บาท</td>
                  </tr>
                  <tr>
                    <td>VAT</td>
                    <td>5,000</td>
                    <td>บาท</td>
                  </tr>
                  <tr>
                    <td>INC VAT</td>
                    <td>25,000</td>
                    <td>บาท</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="col-md-12 text-md-center">
            <div class="form-group">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="border-top: 1px solid #fff !important; border-left: 1px solid #fff !important; border-right: 1px solid #fff !important;"></th>
                    <th style="border-top: 1px solid #fff !important; border-left: 1px solid #fff !important; border-right: 1px solid #fff !important;"></th>
                    <th style="border-top: 1px solid #fff !important; border-left: 1px solid #fff !important; border-right: 1px solid #fff !important;"></th>
                    <th style="border-top: 1px solid #fff !important; border-left: 1px solid #fff !important; border-right: 1px solid #fff !important;"></th>
                    <th style="border-top: 1px solid #fff !important; border-left: 1px solid #fff !important; border-right: 1px solid #fff !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="align-middle"><img src="https://www.2beshop.com/images/products/HPE%20ProLiant%20ML10%20Gen9.jpg" alt="" style="width: 100px; height: 90px;"></td>
                    <td class="align-middle">[845678-375] HPE ProLiant ML10 Gen9 Intel Xeon E3-1225v5 (3.3GHz/4-core/8MB/80W) Proce</td>
                    <td class="align-middle">+ 17,500 Baht</td>
                    <td class="align-middle"><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                    <td class="align-middle"><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                  </tr>
                  <tr>
                    <td class="align-middle"><img src="http://i.ebayimg.com/00/s/MzAyWDY4Nw==/z/yvYAAOxyVaBS-Ome/$_32.JPG" alt="" style="width: 100px; height: 90px;"></td>
                    <td class="align-middle">[805667-B21] HPE 4GB 1Rx8 PC4-2133P-E-15 STND Kit</td>
                    <td class="align-middle">+ 7,500 Baht</td>
                    <td class="align-middle"><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                    <td class="align-middle"><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                  </tr>
                  <tr>
                    <td class="align-middle"><img src="http://www.partsinthebox.com/media/catalog/product/cache/1/small_image/300x300/9df78eab33525d08d6e5fb8d27136e95/_/3/_3_2_5.jpg" alt="" style="width: 100px; height: 90px;"></td>
                    <td class="align-middle">[843266-B21] HPE 1TB 6G SATA 7.2K 3.5in NHP ETY HDD</td>
                    <td class="align-middle">+ 5,000 Baht</td>
                    <td class="align-middle"><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                    <td class="align-middle"><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <a href="{{ url('quotation/create') }}"><button type="button" class="btn btn-success" style="margin-top: 20px;"><i class="fa fa-shopping-cart fa-lg"></i> สร้างใบเสนอราคา</button></a>
          </div>

        </div>
      </div>

    </div>

  </div>

@endsection
