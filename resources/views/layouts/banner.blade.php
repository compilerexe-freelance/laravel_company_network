@php
  $banner = App\Banner::find(1);
@endphp
<div class="row">
  <div class="col-md-12">
    <img src="{{ url('uploads/banner/'.$banner->file) }}" alt="" style="width: 100%; height: 200px; //background-color: #abc;">
  </div>
</div>
