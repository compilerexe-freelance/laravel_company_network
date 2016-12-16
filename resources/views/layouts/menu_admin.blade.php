<nav class="navbar navbar-dark bg-inverse" style="border-radius: 0px;">

  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false" aria-label="Toggle navigation"></button>
  <div class="collapse navbar-toggleable-xs" id="navbar-header">

    <a class="navbar-brand" href="{{ url('admin/main') }}"><span style="color: #ffffb3;">Company</span></a>
    <ul class="nav navbar-nav">

      @if (session()->get('menu_active') == 'Main')
        <li class="nav-item active">
      @else
        <li class="nav-item">
      @endif
        <a class="nav-link" href="{{ url('admin/main') }}">Main <span class="sr-only">(current)</span></a>
      </li>

      @if (session()->get('menu_active') == 'Category')
        <li class="nav-item active dropdown">
      @else
        <li class="nav-item dropdown">
      @endif
        <a class="nav-link dropdown-toggle" href="http://example.com" id="supportedContentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
        <div class="dropdown-menu" aria-labelledby="supportedContentDropdown">
          <a class="dropdown-item" href="{{ url('admin/manage/main_category') }}">Manage Main_Category</a>
          <a class="dropdown-item" href="{{ url('admin/manage/category') }}">Manage Category</a>
          <a class="dropdown-item" href="{{ url('admin/manage/sub_category') }}">Manage Sub_Category</a>
        </div>
      </li>

      @if (session()->get('menu_active') == 'Product')
        <li class="nav-item active dropdown">
      @else
        <li class="nav-item dropdown">
      @endif
        <a class="nav-link dropdown-toggle" href="http://example.com" id="supportedContentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product</a>
        <div class="dropdown-menu" aria-labelledby="supportedContentDropdown">
          <strong class="dropdown-item" style="font-width: bold; color: blue;">Complete Product</strong>
          <a class="dropdown-item" href="{{ url('admin/manage/product/complete/insert') }}">Insert Product</a>
          <a class="dropdown-item" href="{{ url('admin/manage/product/complete/insert') }}">Insert Custom Product</a>
          <a class="dropdown-item" href="{{ url('admin/manage/product/complete/manage') }}">Manage Complete Product</a>
          <hr>
          <strong class="dropdown-item" style="font-width: bold; color: blue;">Custom Product</strong>
          <a class="dropdown-item" href="{{ url('admin/manage/product/custom') }}">Insert Custom Product</a>
          <a class="dropdown-item" href="{{ url('admin/manage/product/custom') }}">Manage Custom Product</a>
        </div>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="{{ url('about') }}">ABOUT</a>
      </li> -->

      <div class="float-md-right">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="supportedContentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrator</a>
          <div class="dropdown-menu text-md-center" aria-labelledby="supportedContentDropdown">
            <a class="dropdown-item" href="#">Sign Out <i class="fa fa-sign-out"></i></a>
          </div>
        </li>
      </div>

    </ul>

  </div>
</nav>
