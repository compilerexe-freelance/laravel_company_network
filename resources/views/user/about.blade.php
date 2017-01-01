@extends('layouts.header') @section('content')
<div class="container">
<div class="row">

    <div class="col-md-3">

        <!-- <div class="form-group">
        <div class="text-md-center" style="//border: 1px solid #abc;margin-top: 30px;">
          <a href="#"><span style="font-size: 20px;"><i class="fa fa-comments-o fa-lg"></i> Live Chat.</span></a>
        </div>
      </div>

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
        </div> -->

        <div class="form-group">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-success">
                    <strong>Category</strong>
                </a>
                <div class="list-group-item">
                    @php use App\SubCategory; $sub_categorys = SubCategory::all();
                            foreach ($sub_categorys as $sub_category) {
                               $product = App\Product::find($sub_category->id);
                               echo '
                                    <span>'.$sub_category->sub_category_name.'</span>
                                    <hr style="margin-top: 5px; margin-bottom: 5px;">
                                    <a href="'. url('quotation/form/'.$product->id) .'">'.$product->product_name.'</a><br><br>
                               ';
                            }
                    @endphp

                </div>
            </div>
        </div>

    </div>

    <div class="col-md-9" style="//margin-top: 30px;">

        <div class="panel panel-default">
            <div class="panel-heading">
                <strong style="font-size: 18px;">เกี่ยวกับบริษัท</strong>
            </div>
            <div class="panel-body">
                รายละเอียด ...
            </div>
        </div>


    </div>

</div>
</div>

@endsection
