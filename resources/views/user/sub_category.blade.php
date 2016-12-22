@extends('layouts.header') @section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3">

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

            <div class="panel panel-default">

                <div class="panel-body">

                    @foreach ($products as $product)
                    <div class="col-md-12">
                        <div class="form-group">
                            <span style="font-size: 20px; color: blue;">{{ $product->product_name }}</span>
                        </div>
                    </div>
                    <div class="col-md-12" style="//border: 1px solid red;">
                        <img src="{{ url('uploads/products/'.$product->product_picture) }}" alt="" class="img-responsive" style=" //border: 1px solid red; margin: auto;">
                    </div>
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
                                            <td>ราคาปกติ</td>
                                            <td>{{ number_format($product->general_price) }}</td>
                                            <td>บาท</td>
                                        </tr>
                                        <tr>
                                            <td>ราคาของเรา</td>
                                            <td>{{ number_format($product->product_price) }}</td>
                                            <td>บาท</td>
                                        </tr>
                                        <tr class="success">
                                            <td>ประหยัด</td>
                                            <td>
                                                @php $discount = $product->general_price - $product->product_price; echo number_format($discount); @endphp
                                            </td>
                                            <td>บาท</td>
                                        </tr>
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
