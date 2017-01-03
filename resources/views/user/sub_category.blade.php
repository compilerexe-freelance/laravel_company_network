@extends('layouts.header') @section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3">

            <!--
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
            -->

            @include('layouts.sidebar_category')

        </div>

        <div class="col-md-9" style="//margin-top: 30px;">

            <div class="panel panel-default">

                <div class="panel-body">

                    @foreach ($products as $product)
                    <div class="col-md-12">
                        <div class="form-group">
                            <span style="font-size: 20px; color: blue;">{{ $product->product_name }}</span>
                        </div>
                    </div>

                    @if ($product->product_picture != null)
                      <div class="col-md-12" style="//border: 1px solid red;">
                          <img src="{{ url('uploads/products/'.$product->product_picture) }}" alt="" class="img-responsive" style=" //border: 1px solid red; margin: auto;">
                      </div>
                    @endif

                    <div class="col-md-8">
                        {!! $product->product_detail !!}
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="form-group">
                            <form action="{{ url('quotation/form/'.$product->id) }}" method="post">
                              {{ csrf_field() }}
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
                                            <td>
                                              @if ($product->special_price != null)
                                                <span>ราคาปกติ</span>
                                              @else
                                                <span>ราคา</span>
                                              @endif
                                            </td>
                                            <td>{{ number_format($product->general_price) }}</td>
                                            <td>บาท</td>
                                        </tr>
                                        @if ($product->special_price != null)
                                        <tr>
                                            <td>ราคาพิเศษ</td>
                                            <td>{{ number_format($product->special_price) }}</td>
                                            <td>บาท</td>
                                        </tr>
                                        <tr class="success">
                                            <td>ประหยัด</td>
                                            <td>
                                                @php $discount = $product->general_price - $product->special_price; echo number_format($discount); @endphp
                                            </td>
                                            <td>บาท</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-success" style="margin-top: 20px;"><i class="fa fa-shopping-cart fa-lg"></i> สร้างใบเสนอราคา</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    @endforeach

                </div>

            </div>

        </div>

    </div>

    @endsection
