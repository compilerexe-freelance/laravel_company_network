@extends('layouts.header') @section('content')

<script>
  var sum = {{ $product->special_price }};
  var vat = @php echo 0.07 * $product->special_price; @endphp;
  var inc_vat = sum + vat;

  var extension = [];
</script>

<div class="container">
    <div class="row">

        <div class="col-md-12" style="//margin-top: 30px;">

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="col-md-10 col-md-offset-1 text-center">
                        <div class="form-group">
                          <span style="font-size: 26px; color: blue;">{{ $product->product_name }}</span>
                        </div>
                    </div>

                    @if ($product->product_picture != null)
                      <div class="col-md-10 col-md-offset-1 text-center">
                          <img src="{{ url('uploads/products/'.$product->product_picture) }}" alt="" class="img-responsive" style="margin: auto;">
                      </div>
                    @endif

                    <div class="col-md-10 col-md-offset-2">
                      <div class="form-group">
                        {!! $product->product_detail !!}
                      </div>
                    </div>

                    <div class="col-md-10 col-md-offset-2" style="text-align: right;">
                        <div class="form-group">
                          @if ($product->special_price != null)
                            <span style="font-size: 16px;">ราคาปกติ {{ number_format($product->general_price) }} บาท</span>
                          @else
                            <span style="font-size: 16px;">ราคา {{ number_format($product->general_price) }} บาท</span>
                          @endif
                        </div>
                        <div class="form-group">
                          @if ($product->special_price != null)
                            <span style="color: green; font-size: 18px;">ราคาพิเศษ {{ number_format($product->special_price) }} บาท</span>
                          @endif
                        </div>
                    </div>

                    <div class="col-md-10 col-md-offset-1">
                      <hr>
                    </div>

                    <div class="col-md-4 col-md-offset-4 text-center">
                        <div class="form-group">
                            <table class="table">
                                <thead>
                                    <tr class="table-none-border">
                                        <th class="table-none-border"></th>
                                        <th class="table-none-border"></th>
                                        <th class="table-none-border"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-none-border">
                                        <td class="table-none-border">SUM</td>
                                        <td class="table-none-border">
                                          @if ($product->special_price != null)
                                            <span id="sum">{{ number_format($product->special_price,2) }}</span>
                                          @else
                                            <span id="sum">{{ number_format($product->general_price,2) }}</span>
                                          @endif
                                        </td>
                                        <td class="table-none-border">บาท</td>
                                    </tr>
                                    <tr class="table-none-border">
                                        <td class="table-none-border">VAT</td>
                                        <td class="table-none-border">
                                          <span id="vat">
                                            @php
                                              if ($product->special_price != null) {
                                                $vat = 0.07 * $product->special_price;
                                                echo number_format($vat, 2);
                                              } else {
                                                $vat = 0.07 * $product->general_price;
                                                echo number_format($vat, 2);
                                              }
                                            @endphp
                                          </span>
                                        </td>
                                        <td class="table-none-border">บาท</td>
                                    </tr>
                                    <tr class="table-none-border">
                                        <td class="table-none-border">INC VAT</td>
                                        <td class="table-none-border">
                                          <span id="inc_vat">
                                            @php
                                              if ($product->special_price != null) {
                                                $inc_vat = $product->special_price + $vat;
                                                echo number_format($inc_vat, 2);
                                              } else {
                                                $inc_vat = $product->general_price + $vat;
                                                echo number_format($inc_vat, 2);
                                              }
                                            @endphp
                                          </span>
                                        </td>
                                        <td class="table-none-border">บาท</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-10 col-md-offset-1 text-center">
                        <div class="form-group table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="table-none-border" style="border-top: 1px solid #fff !important; border-left: 1px solid #fff !important; border-right: 1px solid #fff !important;"></th>
                                        <th class="table-none-border" style="border-top: 1px solid #fff !important; border-left: 1px solid #fff !important; border-right: 1px solid #fff !important;"></th>
                                        <th class="table-none-border" style="border-top: 1px solid #fff !important; border-left: 1px solid #fff !important; border-right: 1px solid #fff !important;"></th>
                                        <th class="table-none-border" style="border-top: 1px solid #fff !important; border-left: 1px solid #fff !important; border-right: 1px solid #fff !important;"></th>
                                        <th class="table-none-border" style="border-top: 1px solid #fff !important; border-left: 1px solid #fff !important; border-right: 1px solid #fff !important;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($custom_products as $custom_product)
                                      @php
                                        if ($custom_product->special_price != null) {
                                          $check_price = $custom_product->special_price;
                                        } else {
                                          $check_price = $custom_product->general_price;
                                        }
                                      @endphp
                                      <tr>
                                        <td class="table-none-border">
                                          @if ($custom_product->product_picture != null)
                                            <img src="{{ url('uploads/products/'.$custom_product->product_picture) }}" alt="" class="img-responsive">
                                          @endif
                                        </td>
                                        <td class="table-none-border">{{ $custom_product->product_name }}</td>
                                        <td class="table-none-border">+{{ number_format($check_price) }} Baht</td>
                                        <td class="table-none-border"><button type="button" id="btn_add_{{ $custom_product->id }}" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td class="table-none-border"><button type="button" id="btn_remove_{{ $custom_product->id }}" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                      </tr>

                                      <script>
                                        $(document).ready(function() {
                                          $('#btn_add_{{ $custom_product->id }}').on('click', function() {
                                            sum = sum + {{ $check_price }};
                                            vat = 0.07 * sum;
                                            inc_vat = sum + vat;
                                            $(this).prop('disabled', true);
                                            $('#sum').text(sum.toFixed(0).replace(/(\d)(?=(\d{3})+$)/g, "$1,"));
                                            $('#vat').text(vat.toFixed(2));
                                            $('#inc_vat').text(inc_vat.toFixed(2));
                                            $('#input_sum').val(sum);
                                            $('#input_vat').val(vat);
                                            $('#input_inc_vat').val(inc_vat);

                                            extension.push('{{ $custom_product->id }}');
                                            sessionStorage.setItem('extension', JSON.stringify(extension));
                                            $('#extension').val(sessionStorage.getItem('extension'));
                                            // console.log(sessionStorage.getItem('extension'));
                                            // console.log(sum);
                                          });
                                          $('#btn_remove_{{ $custom_product->id }}').on('click', function() {
                                            if ($('#btn_add_{{ $custom_product->id }}').prop('disabled')) {
                                              sum = sum - {{ $check_price }};
                                              vat = 0.07 * sum;
                                              inc_vat = sum + vat;
                                              $('#btn_add_{{ $custom_product->id }}').prop('disabled', false);
                                              $('#sum').text(sum.toFixed(0).replace(/(\d)(?=(\d{3})+$)/g, "$1,"));
                                              $('#vat').text(vat.toFixed(2));
                                              $('#inc_vat').text(inc_vat.toFixed(2));
                                              $('#input_sum').val(sum);
                                              $('#input_vat').val(vat);
                                              $('#input_inc_vat').val(inc_vat);

                                              var index = extension.indexOf('{{ $custom_product->id }}');
                                              extension.splice(index, 1);
                                              sessionStorage.setItem('extension', JSON.stringify(extension));
                                              $('#extension').val(sessionStorage.getItem('extension'));
                                              // console.log(sessionStorage.getItem('extension'));
                                            }
                                          });
                                        });
                                      </script>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- <a href="{{ url('quotation/create') }}"><button type="button" class="btn btn-success" style="//margin-top: 20px;"><i class="fa fa-shopping-cart fa-lg"></i> สร้างใบเสนอราคา</button></a> -->
                        <form action="{{ url('quotation/create') }}" method="post">
                          {{ csrf_field() }}
                          <input type="text" name="product_id" value="{{ $product->id }}" hidden>
                          <input type="text" name="input_sum" id="input_sum" hidden>
                          <input type="text" name="input_vat" id="input_vat" hidden>
                          <input type="text" name="input_inc_vat" id="input_inc_vat" hidden>
                          <input type="text" name="extension" id="extension" hidden>
                          <button type="submit" class="btn btn-success" style="//margin-top: 20px;"><i class="fa fa-shopping-cart fa-lg"></i> สร้างใบเสนอราคา</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<script>
  $(document).ready(function() {
    $('#input_sum').val(sum);
    $('#input_vat').val(vat);
    $('#input_inc_vat').val(inc_vat);
  });
</script>

@endsection
