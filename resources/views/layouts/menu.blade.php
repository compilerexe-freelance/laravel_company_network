@php

use App\MainCategory;
use App\Category;
use App\SubCategory;

$main_categorys = MainCategory::all();
$categorys = Category::all();
$sub_categorys = SubCategory::all();

@endphp

<nav class="navbar navbar-inverse" style="border-radius: 0px;">

  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}"><span style="color: #ffffb3;">Company</span></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

      @if (session()->get('menu_active') == 'Home')
        <li class="active">
      @else
        <li>
      @endif
        <a href="{{ url('/') }}">HOME <span class="sr-only">(current)</span></a>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PRODUCT <span class="caret"></span></a>

        <ul class="dropdown-menu">
          @foreach ($main_categorys as $main_category)
            <li class="dropdown-submenu" id="state-submenu-{{ $main_category->main_category_name }}">
              <a class="dropdown-item" href="#" id="submenu-{{ $main_category->main_category_name }}">{{ $main_category->main_category_name }}</a>

              <ul class="dropdown-menu">
                @foreach ($categorys as $category)
                  @if ($category->main_category_id == $main_category->id)
                    <li class="dropdown-submenu" id="state-submenu-{{ $category->category_name }}">
                      <a class="dropdown-item" href="#" id="submenu-{{ $category->category_name }}">{{ $category->category_name }}</a>
                      <ul class="dropdown-menu">
                        @foreach ($sub_categorys as $sub_category)
                          @if ($sub_category->category_id == $category->id)
                            <li><a class="dropdown-item" href="{{ url('product/category/'.$sub_category->id) }}">{{ $sub_category->sub_category_name }}</a></li>
                          @endif
                        @endforeach
                      </ul>
                    </li>
                  @endif
                @endforeach
              </ul>

            </li>

            <script>
              $(document).ready(function() {

                $('#submenu-{{ $main_category->main_category_name }}').on('mouseover', function() {
                  $('#state-submenu-{{ $main_category->main_category_name }}').attr('class', 'dropdown-submenu open');
                  @php
                    foreach ($main_categorys as $buffer_main_category) {
                      if ($buffer_main_category->main_category_name != $main_category->main_category_name) {
                        echo "$('#state-submenu-". $buffer_main_category->main_category_name . "').attr('class', 'dropdown-submenu');";
                      }
                    }

                    foreach ($main_categorys as $buffer_main_category) {
                      foreach ($categorys as $category) {
                        if ($buffer_main_category->id == $category->main_category_id) {
                          echo "$('#state-submenu-". $category->category_name . "').attr('class', 'dropdown-submenu');";
                        }
                      }
                    }

                  @endphp
                });

                @php
                  foreach ($categorys as $category) {
                    echo "$('#submenu-". $category->category_name ."').on('mouseover', function() {
                      $('#state-submenu-". $category->category_name ."').attr('class', 'dropdown-submenu open');";

                      foreach ($categorys as $buffer_category) {
                        if ($buffer_category->category_name != $category->category_name) {
                          echo "$('#state-submenu-". $buffer_category->category_name ."').attr('class', 'dropdown-submenu');";
                        }
                      }

                    echo "});";
                  }
                @endphp

              });
            </script>
          @endforeach

          <script>
            $(document).ready(function() {
              $('#menu-product').on('click', function() {
                @php
                  foreach ($main_categorys as $main_category) {
                    echo "$('#state-submenu-". $main_category->main_category_name ."').attr('class', 'dropdown-submenu');";
                  }
                @endphp
              });
            });
          </script>
        </ul>

        <!-- end product menu-->
      </li>

      <!-- SOLUTION -->

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SOLUTION <span class="caret"></span></a>

        <ul class="dropdown-menu">

          <li class="dropdown-submenu" id="state-submenu-small-business">
            <a class="dropdown-item" href="#" id="submenu-small-business">SMALL BUSINESS</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">NETWORK</a></li>
              <li><a class="dropdown-item" href="#">SERVER</a></li>
              <li><a class="dropdown-item" href="#">SECURITY</a></li>
              <li><a class="dropdown-item" href="#">FULL SOLUTION</a></li>
            </ul>
          </li>

          <li class="dropdown-submenu" id="state-submenu-business">
            <a class="dropdown-item" href="#" id="submenu-business">BUSINESS</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">NETWORK</a></li>
              <li><a class="dropdown-item" href="#">SERVER</a></li>
              <li><a class="dropdown-item" href="#">SECURITY</a></li>
              <li><a class="dropdown-item" href="#">FULL SOLUTION</a></li>
            </ul>
          </li>

          <li class="dropdown-submenu" id="state-submenu-enterprise">
            <a class="dropdown-item" href="#" id="submenu-enterprise">ENTERPRISE</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">NETWORK</a></li>
              <li><a class="dropdown-item" href="#">SERVER</a></li>
              <li><a class="dropdown-item" href="#">SECURITY</a></li>
              <li><a class="dropdown-item" href="#">FULL SOLUTION</a></li>
            </ul>
          </li>

        </ul> <!-- end product solution-->
      </li>

      <!-- END SOLUTION -->

      <li>
        <a href="{{ url('about') }}">ABOUT</a>
      </li>

      @if (session()->get('menu_active') == 'News')
        <li class="active">
      @else
        <li>
      @endif
        <a href="{{ url('news') }}">NEWS</a>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DOWNLOADS <span class="caret"></span></a>
        <ul class="dropdown-menu" aria-labelledby="supportedContentDropdown">
          <li><a href="#">SOFTWARE</a></li>
          <li><a href="#">SALES KID</a></li>
          <li><a href="#">MANUAL</a></li>
          <li><a href="#">KNOWLEDGE</a></li>
          <li><a href="#">FORM</a></li>
          <li><a href="#">OTHER</a></li>
        </ul>
      </li>

      <li>
        <a href="#">HOW TO BUY</a>
      </li>

      <li>
        <a href="{{ url('quotation/upload') }}">UPLOAD_QUOTATION</a>
      </li>

      <li>
        <a href="{{ url('contact') }}">CONTACT</a>
      </li>

    </ul>
  </div>

  </div>
</nav>

<script>
/*
  $(document).ready(function() {

    // software
    $('#submenu-software').on('mouseover', function() {
      $('#state-submenu-software').attr('class', 'dropdown-submenu open');
      $('#state-submenu-hardware').attr('class', 'dropdown-submenu');

      $('#state-submenu-erp').attr('class', 'dropdown-submenu');
      $('#state-submenu-security').attr('class', 'dropdown-submenu');
      $('#state-submenu-microsoft').attr('class', 'dropdown-submenu');
      $('#state-submenu-virtualization').attr('class', 'dropdown-submenu');
      $('#state-submenu-hyper-converged').attr('class', 'dropdown-submenu');
    });
    $('#submenu-erp').on('mouseover', function() {
      $('#state-submenu-erp').attr('class', 'dropdown-submenu open');
      $('#state-submenu-security').attr('class', 'dropdown-submenu');
      $('#state-submenu-microsoft').attr('class', 'dropdown-submenu');
      $('#state-submenu-virtualization').attr('class', 'dropdown-submenu');
      $('#state-submenu-hyper-converged').attr('class', 'dropdown-submenu');
    });
    $('#submenu-security').on('mouseover', function() {
      $('#state-submenu-erp').attr('class', 'dropdown-submenu');
      $('#state-submenu-security').attr('class', 'dropdown-submenu open');
      $('#state-submenu-microsoft').attr('class', 'dropdown-submenu');
      $('#state-submenu-virtualization').attr('class', 'dropdown-submenu');
      $('#state-submenu-hyper-converged').attr('class', 'dropdown-submenu');
    });
    $('#submenu-microsoft').on('mouseover', function() {
      $('#state-submenu-erp').attr('class', 'dropdown-submenu');
      $('#state-submenu-security').attr('class', 'dropdown-submenu');
      $('#state-submenu-microsoft').attr('class', 'dropdown-submenu open');
      $('#state-submenu-virtualization').attr('class', 'dropdown-submenu');
      $('#state-submenu-hyper-converged').attr('class', 'dropdown-submenu');
    });
    $('#submenu-virtualization').on('mouseover', function() {
      $('#state-submenu-erp').attr('class', 'dropdown-submenu');
      $('#state-submenu-security').attr('class', 'dropdown-submenu');
      $('#state-submenu-microsoft').attr('class', 'dropdown-submenu');
      $('#state-submenu-virtualization').attr('class', 'dropdown-submenu open');
      $('#state-submenu-hyper-converged').attr('class', 'dropdown-submenu');
    });
    $('#submenu-hyper-converged').on('mouseover', function() {
      $('#state-submenu-erp').attr('class', 'dropdown-submenu');
      $('#state-submenu-security').attr('class', 'dropdown-submenu');
      $('#state-submenu-microsoft').attr('class', 'dropdown-submenu');
      $('#state-submenu-virtualization').attr('class', 'dropdown-submenu');
      $('#state-submenu-hyper-converged').attr('class', 'dropdown-submenu open');
    });
    // end software

    // hardware
    $('#submenu-hardware').on('mouseover', function() {
      $('#state-submenu-software').attr('class', 'dropdown-submenu');
      $('#state-submenu-hardware').attr('class', 'dropdown-submenu open');

      $('#state-submenu-server').attr('class', 'dropdown-submenu');
      $('#state-submenu-storage').attr('class', 'dropdown-submenu');
      $('#state-submenu-network').attr('class', 'dropdown-submenu');
      $('#state-submenu-workstation').attr('class', 'dropdown-submenu');
      $('#state-submenu-other').attr('class', 'dropdown-submenu');
    });
    $('#submenu-server').on('mouseover', function() {
      $('#state-submenu-server').attr('class', 'dropdown-submenu open');
      $('#state-submenu-storage').attr('class', 'dropdown-submenu');
      $('#state-submenu-network').attr('class', 'dropdown-submenu');
      $('#state-submenu-workstation').attr('class', 'dropdown-submenu');
      $('#state-submenu-other').attr('class', 'dropdown-submenu');
    });
    $('#submenu-storage').on('mouseover', function() {
      $('#state-submenu-server').attr('class', 'dropdown-submenu');
      $('#state-submenu-storage').attr('class', 'dropdown-submenu open');
      $('#state-submenu-network').attr('class', 'dropdown-submenu');
      $('#state-submenu-workstation').attr('class', 'dropdown-submenu');
      $('#state-submenu-other').attr('class', 'dropdown-submenu');
    });
    $('#submenu-network').on('mouseover', function() {
      $('#state-submenu-server').attr('class', 'dropdown-submenu');
      $('#state-submenu-storage').attr('class', 'dropdown-submenu');
      $('#state-submenu-network').attr('class', 'dropdown-submenu open');
      $('#state-submenu-workstation').attr('class', 'dropdown-submenu');
      $('#state-submenu-other').attr('class', 'dropdown-submenu');
    });
    $('#submenu-workstation').on('mouseover', function() {
      $('#state-submenu-server').attr('class', 'dropdown-submenu');
      $('#state-submenu-storage').attr('class', 'dropdown-submenu');
      $('#state-submenu-network').attr('class', 'dropdown-submenu');
      $('#state-submenu-workstation').attr('class', 'dropdown-submenu open');
      $('#state-submenu-other').attr('class', 'dropdown-submenu');
    });
    $('#submenu-other').on('mouseover', function() {
      $('#state-submenu-server').attr('class', 'dropdown-submenu');
      $('#state-submenu-storage').attr('class', 'dropdown-submenu');
      $('#state-submenu-network').attr('class', 'dropdown-submenu');
      $('#state-submenu-workstation').attr('class', 'dropdown-submenu');
      $('#state-submenu-other').attr('class', 'dropdown-submenu open');
    });
    // end hardware

    // solution
    $('#submenu-small-business').on('mouseover', function() {
      $('#state-submenu-small-business').attr('class', 'dropdown-submenu open');
      $('#state-submenu-business').attr('class', 'dropdown-submenu');
      $('#state-submenu-enterprise').attr('class', 'dropdown-submenu');
    });
    $('#submenu-business').on('mouseover', function() {
      $('#state-submenu-small-business').attr('class', 'dropdown-submenu');
      $('#state-submenu-business').attr('class', 'dropdown-submenu open');
      $('#state-submenu-enterprise').attr('class', 'dropdown-submenu');
    });
    $('#submenu-enterprise').on('mouseover', function() {
      $('#state-submenu-small-business').attr('class', 'dropdown-submenu');
      $('#state-submenu-business').attr('class', 'dropdown-submenu');
      $('#state-submenu-enterprise').attr('class', 'dropdown-submenu open');
    });
    // end solution

    $('#menu-product').on('click', function() {
      $('#state-submenu-software').attr('class', 'dropdown-submenu');
      $('#state-submenu-hardware').attr('class', 'dropdown-submenu');
    });

    $('#menu-solution').on('click', function() {
      $('#state-submenu-small-business').attr('class', 'dropdown-submenu');
      $('#state-submenu-business').attr('class', 'dropdown-submenu');
      $('#state-submenu-enterprise').attr('class', 'dropdown-submenu');
    });

  });
  */
</script>
