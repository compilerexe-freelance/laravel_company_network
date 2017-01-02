<div class="form-group">
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-success">
            <strong>Category</strong>
        </a>
        <div class="list-group-item">
            @php use App\SubCategory; $sub_categorys = SubCategory::all();
                foreach ($sub_categorys as $sub_category) {
                   $product = App\Product::where('sub_category_id', $sub_category->id)->first();
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