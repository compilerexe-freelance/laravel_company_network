@extends('layouts.header_admin') @section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="border-radius: 0px;">
            <div class="panel-body text-center">

                <div class="col-md-12 table-responsive" style="//border: 1px solid #abc; border-radius: 5px;">

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="table-none-border"></th>
                                <th class="table-none-border"></th>
                                <th class="table-none-border"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-md-right table-none-border"></td>
                                <td class="table-none-border">
                                    <strong style="color: blue; font-size: 20px;">Product > Edit Custom Product</strong>
                                </td>
                                <td class="table-none-border"></td>
                            </tr>

                            <!-- start type custom -->
                            <form action="{{ url('admin/manage/product/complete/custom/update/'.$get_custom_product->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <tr>

                                    <td class="text-right table-none-border">Link Product</td>
                                    <td class="table-none-border">
                                        <select class="form-control" name="link_product" id="link_product" disabled>
                                          @php
                                            $products = App\Product::all();
                                            foreach ($products as $product) {
                                                if ($get_custom_product->product_id == $product->id) {
                                                    echo "<option id=\"".$product->id."\" selected>".$product->product_name."</option>";
                                                } else {
                                                    echo "<option id=\"".$product->id."\">".$product->product_name."</option>";
                                                }
                                            }
                                          @endphp
                                        </select>
                                    </td>
                                    <td class="table-none-border">
                                        <!-- <label for="" class="form-check-inline"> -->
                                        <input type="checkbox" class="form-check-input" name="" id="enabled_change_link_product"> Enabled
                                        <!-- </label> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right table-none-border">Product Name</td>
                                    <td class="table-none-border">
                                        <input type="text" class="form-control" name="product_name" value="{{ $get_custom_product->product_name }}">
                                    </td>
                                    <td class="table-none-border"></td>
                                </tr>
                                <tr>
                                    <td class="text-right table-none-border">Detail</td>
                                    <td class="table-none-border">
                                        <div id="summernote">
                                            {!! $get_custom_product->product_detail !!}
                                        </div>
                                        <input type="hidden" name="product_detail" id="product_detail" value="{{ $get_custom_product->product_detail }}">
                                    </td>
                                    <td class="table-none-border"></td>
                                </tr>
                                <!-- end product_detail -->
                                <tr>
                                    <td class="text-right table-none-border">Picture</td>
                                    <td class="table-none-border text-md-left">
                                        <input type="file" name="product_picture" id="product_picture" disabled>
                                    </td>
                                    <td class="table-none-border">
                                        <!-- <label for="" class="form-check-inline"> -->
                                        <input type="checkbox" class="form-check-input" name="" id="enabled_change_picture"> Enabled
                                        <!-- </label> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right table-none-border">General Price</td>
                                    <td class="table-none-border text-left">
                                        <input type="text" class="form-control" name="general_price" value="{{ $get_custom_product->general_price }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right table-none-border">Special Price</td>
                                    <td class="table-none-border text-md-left">
                                        <input type="text" class="form-control" name="special_price" value="{{ $get_custom_product->special_price }}">
                                    </td>
                                    <td class="table-none-border"></td>
                                </tr>
                                <tr>
                                    <td class="text-right table-none-border"></td>
                                    <td class="table-none-border text-md-left">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success" name="button" style="width: 100%;">Save</button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ url('admin/manage/product/complete/manage') }}"><button type="button" class="btn btn-danger" name="button" style="width: 100%;">Cancel</button></a>
                                        </div>
                                    </td>
                                    <td class="table-none-border"></td>
                                </tr>
                            </form>
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
        $('#enabled_change_link_product').on('change', function() {
            if ($(this).is(':checked')) {
                $('#link_product').prop('disabled', false);
            } else {
                $('#link_product').prop('disabled', true);
            }
        });

        $('#enabled_change_picture').on('change', function() {
            if ($(this).is(':checked')) {
                $('#product_picture').prop('disabled', false);
            } else {
                $('#product_picture').prop('disabled', true);
            }
        });

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
