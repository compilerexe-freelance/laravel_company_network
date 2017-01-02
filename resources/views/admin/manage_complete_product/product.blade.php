@extends('layouts.header_admin')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="border-radius: 0px;">
        <div class="panel-body text-center">

          <div class="col-md-10 col-md-offset-1">
            <table class="table table-bordered">
              <thead>
                <tr class="active">
                  <th>No.</th>
                  <!--<th>Type</th>-->
                  <th>Sub Category</th>
                  <th>Product Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($products as $product)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <!--<td>
                      COMPLETE
                    </td>-->
                    <td>
                      @php
                        $sub_category = App\SubCategory::find($product->sub_category_id);
                        echo $sub_category->sub_category_name;
                      @endphp
                    </td>
                    <td>{{ $product->product_name }}</td>
                    <td><a href="{{ url('admin/manage/product/complete/update/'.$product->id) }}"><button type="button" name="button" class="btn btn-info" style="width: 100%;">Edit</button></a></td>
                    <td><a href="{{ url('admin/manage/product/complete/delete/'.$product->id) }}"><button type="button" name="button" class="btn btn-warning" style="width: 100%;">Delete</button></a></td>
                  </tr>
                @endforeach

              </tbody>
            </table>

            <table class="table table-bordered">
              <thead class="thead-inverse">
                <tr class="active">
                  <th>No.</th>
                  <th>Type</th>
                  <th>Link Product</th>
                  <th>Product Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($custom_products as $custom_product)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>CUSTOM</td>
                    <td>
                      @php
                        $product = App\Product::find($custom_product->product_id);
                        echo $product->product_name;
                      @endphp
                    </td>
                    <td>{{ $custom_product->product_name }}</td>
                    <td><a href="{{ url('admin/manage/product/complete/custom/update/'.$custom_product->id) }}"><button type="button" name="button" class="btn btn-info" style="width: 100%;">Edit</button></a></td>
                    <td><a href="{{ url('admin/manage/product/complete/custom/delete/'.$custom_product->id) }}"><button type="button" name="button" class="btn btn-warning" style="width: 100%;">Delete</button></a></td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>

        </div>

      </div>
    </div>
  </div>

@endsection
