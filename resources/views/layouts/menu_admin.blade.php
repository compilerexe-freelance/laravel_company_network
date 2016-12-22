
<nav class="navbar navbar-inverse" style="border-radius: 0px;">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('admin/main') }}"><span style="color: #ffffb3;">Company</span></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        @if (session()->get('menu_active') == 'Main')
          <li class="active">
        @else
          <li>
        @endif
          <a href="{{ url('admin/main') }}">Main <span class="sr-only">(current)</span></a>
        </li>

        @if (session()->get('menu_active') == 'Category')
          <li class="active dropdown">
        @else
          <li class="dropdown">
        @endif
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>

          <ul class="dropdown-menu" aria-labelledby="supportedContentDropdown">
            <li><a href="#" style="font-weight: bold; color: blue;">Main Category</a></li>
            <li><a class="dropdown-item" href="{{ url('admin/manage/main_category') }}">Manage Main Category</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#" style="font-weight: bold; color: blue;">Category</a></li>
            <li><a class="dropdown-item" href="{{ url('admin/manage/category') }}">Manage Category</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#" style="font-weight: bold; color: blue;">Sub Category</a></li>
            <li><a class="dropdown-item" href="{{ url('admin/manage/sub_category') }}">Manage Sub Category</a></li>
          </ul>
        </li>

        @if (session()->get('menu_active') == 'Product')
          <li class="active dropdown">
        @else
          <li class="dropdown">
        @endif
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product <span class="caret"></span></a>

          <ul class="dropdown-menu">
            <li><a href="#" style="font-weight: bold; color: blue;">Complete Product</a></li>
            <li><a href="{{ url('admin/manage/product/complete/insert') }}">Insert Product</a></li>
            <li><a href="{{ url('admin/manage/product/complete/custom/insert') }}">Insert Custom Product</a></li>
            <li><a href="{{ url('admin/manage/product/complete/manage') }}">Manage Complete Product</a></li>
            <!-- <li role="separator" class="divider"></li>
            <li><a href="#" style="font-weight: bold; color: blue;">Custom Product</a></li>
            <li><a href="{{ url('admin/manage/product/custom/insert') }}">Insert Custom Product</a></li>
            <li><a href="{{ url('admin/manage/product/custom/manage') }}">Manage Custom Product</a></li> -->
          </ul>
        </li>

      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrator <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <a href="#">Sign Out <i class="fa fa-sign-out"></i></a>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->

</nav>











<!-- <nav class="navbar navbar-dark bg-inverse" style="border-radius: 0px;">

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
</nav> -->
