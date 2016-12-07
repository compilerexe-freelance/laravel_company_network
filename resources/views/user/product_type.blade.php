@extends('layouts.header')

@section('content')

  <div class="row">

    <div class="col-md-12" style="margin-top: 30px;">

      <div class="card">

        <div class="card-block">

          <div class="col-md-4 offset-md-4">
            <div class="form-group">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th ></th>
                    <th class="text-md-center" ><strong style="font-size: 20px;">เลือกชนิดสินค้า</strong></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-md-center" ><input type="radio" name="product_type" checked></td>
                    <td >สินค้าสำเร็จรูป</td>
                  </tr>
                  <tr>
                    <td class="text-md-center" ><input type="radio" name="product_type"></td>
                    <td >สินค้าประกอบเอง</td>
                  </tr>
                  <tr>
                    <td ></td>
                    <td ><button type="button" class="btn btn-success" style="width: 100%;">ถัดไป <i class="fa fa-angle-right"></i></button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>



        </div>
      </div>

    </div>

  </div>

@endsection
