@extends('layouts.header') @section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12" style="//margin-top: 30px;">

            <div class="panel panel-default">

                <div class="panel-body">

                    @foreach ($categorys as $category)
                    <div class="col-md-3 text-center">
                        <div class="form-group">
                            <ul>{{ $category->category_name }}
                                @foreach ($sub_categorys as $sub_category)
                                  @if ($sub_category->category_id == $category->id)
                                    <ul>{{ $sub_category->sub_category_name }}
                                      @foreach ($products as $product)
                                        @if ($product->sub_category_id == $sub_category->id)
                                          <li style="list-style-type: none;"><a href="{{ url('quotation/form/'.$product->id) }}">{{ $product->product_name }}</a></li>
                                        @endif
                                      @endforeach
                                    </ul>
                                  @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach

                    @foreach ($categorys as $category)
                      @foreach ($sub_categorys as $sub_category)
                        @if ($sub_category->category_id == $category->id)
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <hr>
                                <strong style="font-size: 20px;">{{ $category->category_name }} <i class="fa fa-angle-right"></i> {{ $sub_category->sub_category_name }}</strong>
                                <hr>
                            </div>
                        </div>
                          @foreach ($products as $product)
                            @if ($product->sub_category_id == $sub_category->id)


                              <div class="col-md-12 text-center">
                                  <div class="form-group">
                                      <table class="table table-bordered">
                                          <thead>
                                              <tr>
                                                  <th class="text-center">สินค้า {{ $product->product_name }}</th>
                                                  <th class="text-center">รายละเอียด</th>
                                                  <th class="text-center">ราคา</th>
                                                  <th class="text-center" style="width: 20%;"></th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td>
                                                    @if ($product->product_picture != null)
                                                      <img src="{{ url('uploads/products/'.$product->product_picture) }}" alt="" class="img-responsive" style="margin: auto;">
                                                    @else
                                                      <span>ยังไม่มีรูปสินค้าในขณะนี้</span>
                                                    @endif
                                                  </td>
                                                  <td class="text-left">{!! $product->product_detail !!}</td>
                                                  <td>
                                                    @if ($product->special_price != null)
                                                      {{ number_format($product->special_price) }} Bath
                                                    @else
                                                      {{ number_format($product->general_price) }} Bath
                                                    @endif
                                                  </td>
                                                  <td><a href="{{ url('quotation/form/'.$product->id) }}"><button type="button" class="btn btn-success" style="width: 100%;"><i class="fa fa-shopping-cart fa-lg"></i> สร้างใบเสนอราคา</button></a></td>
                                                  <!-- <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td> -->
                                              </tr>
                                              <!-- <tr>
                                                  <td><img src="" alt="" style="width: 100px; height: 90px;"></td>
                                                  <td>[843266-B21] HPE 1TB 6G SATA 7.2K 3.5in NHP ETY HDD</td>
                                                  <td>+ 5,000 Baht</td>
                                                  <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                                  <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                              </tr>
                                              <tr class="table-success">
                                                  <td></td>
                                                  <td>รวมราคา</td>
                                                  <td>12,500 Bath</td>
                                                  <td colspan="2"><a href="{{ url('quotation/create') }}"><button type="button" class="btn btn-success"><i class="fa fa-shopping-cart fa-lg"></i> สร้างใบเสนอราคา</button></a></td>
                                              </tr> -->
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    @endforeach

                    <!-- <div class="col-md-12 text-md-center">
                        <div class="form-group">
                            <hr>
                            <strong style="font-size: 20px;">เลือกสินค้า</strong>
                            <hr>
                        </div>
                    </div>

                    <div class="col-md-12 text-md-center">
                        <div class="form-group">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-md-center">RAM</th>
                                        <th class="text-md-center">รายละเอียด</th>
                                        <th class="text-md-center">ราคา</th>
                                        <th class="text-md-center"></th>
                                        <th class="text-md-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="http://i.ebayimg.com/00/s/MzAyWDY4Nw==/z/yvYAAOxyVaBS-Ome/$_32.JPG" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[805667-B21] HPE 4GB 1Rx8 PC4-2133P-E-15 STND Kit</td>
                                        <td>+ 7,500 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="http://i.ebayimg.com/00/s/MzAyWDY4Nw==/z/yvYAAOxyVaBS-Ome/$_32.JPG" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[805667-B21] HPE 4GB 1Rx8 PC4-2133P-E-15 STND Kit</td>
                                        <td>+ 7,500 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="http://i.ebayimg.com/00/s/MzAyWDY4Nw==/z/yvYAAOxyVaBS-Ome/$_32.JPG" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[805667-B21] HPE 4GB 1Rx8 PC4-2133P-E-15 STND Kit</td>
                                        <td>+ 7,500 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> -->

                    <!-- <div class="col-md-12 text-md-center">
                        <div class="form-group">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-md-center">HARDDISK</th>
                                        <th class="text-md-center">รายละเอียด</th>
                                        <th class="text-md-center">ราคา</th>
                                        <th class="text-md-center"></th>
                                        <th class="text-md-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="http://www.partsinthebox.com/media/catalog/product/cache/1/small_image/300x300/9df78eab33525d08d6e5fb8d27136e95/_/3/_3_2_5.jpg" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[843266-B21] HPE 1TB 6G SATA 7.2K 3.5in NHP ETY HDD</td>
                                        <td>+ 5,000 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="http://www.partsinthebox.com/media/catalog/product/cache/1/small_image/300x300/9df78eab33525d08d6e5fb8d27136e95/_/3/_3_2_5.jpg" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[843266-B21] HPE 1TB 6G SATA 7.2K 3.5in NHP ETY HDD</td>
                                        <td>+ 5,000 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="http://www.partsinthebox.com/media/catalog/product/cache/1/small_image/300x300/9df78eab33525d08d6e5fb8d27136e95/_/3/_3_2_5.jpg" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[843266-B21] HPE 1TB 6G SATA 7.2K 3.5in NHP ETY HDD</td>
                                        <td>+ 5,000 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> -->

                </div>
            </div>

        </div>

    </div>
</div>
@endsection
