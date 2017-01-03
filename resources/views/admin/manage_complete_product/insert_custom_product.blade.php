@extends('layouts.header_admin')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="border-radius: 0px;">
        <div class="panel-body text-center">

          <div class="col-md-12" style="//border: 1px solid #abc; border-radius: 5px;">

            <table class="table">
              <thead>
                <tr>
                  <th class="table-none-border"></th>
                  <th class="table-none-border"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-right table-none-border"></td>
                  <td class="table-none-border">
                    <strong style="color: blue; font-size: 20px;">Product > Insert Custom Product</strong>
                  </td>
                </tr>

                <!-- start type custom -->
                <tr>
                  <form action="{{ url('admin/manage/product/complete/custom/insert') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <td class="text-right table-none-border">Link Product</td>
                  <td class="table-none-border">
                    <select class="form-control" name="link_product" id="link_product">
                      @php
                        $products = App\Product::all();
                        foreach ($products as $product) {
                          echo "
                            <option id=\"".$product->id."\">".$product->product_name."</option>
                          ";
                        }
                      @endphp
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="text-right table-none-border">Product Name</td>
                  <td class="table-none-border">
                    <input type="text" class="form-control" name="product_name">
                  </td>
                </tr>
                <tr>
                  <td class="text-right table-none-border">Detail</td>
                  <td class="table-none-border">
                    <div id="summernote"></div>
                    <input type="hidden" name="product_detail" id="product_detail">
                  </td>
                </tr> <!-- end product_detail -->
                <tr>
                  <td class="text-right table-none-border">Picture</td>
                  <td class="table-none-border text-left">
                    <input type="file" name="product_picture">
                  </td>
                </tr>
                <tr>
                  <td class="text-right table-none-border">General Price</td>
                  <td class="table-none-border text-left">
                    <input type="text" class="form-control" name="general_price">
                  </td>
                </tr>
                <tr>
                  <td class="text-right table-none-border">Special Price</td>
                  <td class="table-none-border text-left">
                    <input type="text" class="form-control" name="special_price">
                  </td>
                </tr>
                <tr>
                  <td class="text-right table-none-border"></td>
                  <td class="table-none-border text-left">
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-success" name="button" style="width: 100%;">Save</button>
                    </div>
                    <div class="col-md-6">
                      <a href="{{ url('admin/manage/product/complete/manage') }}"><button type="button" class="btn btn-danger" name="button" style="width: 100%;">Cancel</button></a>
                    </div>
                  </td>
                  </form>
                </tr>

                <!-- end type custom -->

              </tbody>
            </table>
          </div>

        </div>

      </div>
    </div>
  </div>


  <script>
    $(document).ready(function() {

      $('#summernote').summernote({
          height: 300
      });
      $('#summernote').on('summernote.change', function(we, contents, $editable) {
          $('#product_detail').val(contents);
          // console.log(contents);
      });

    });
  </script>

@endsection
