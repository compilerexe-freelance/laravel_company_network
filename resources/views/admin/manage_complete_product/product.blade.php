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
                  <th>Type</th>
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
                    <td>complete</td>
                    <td>
                      @php
                        $sub_category = App\SubCategory::find($product->id_sub_category);
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
                    <td>custom</td>
                    <td>
                      @php
                        $product = App\Product::find($custom_product->id_product);
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


  <script>
    $(document).ready(function() {

      // complete product
      function initToolbarBootstrapBindings() {
        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
              'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
              'Times New Roman', 'Verdana'],
              fontTarget = $('[title=Font]').siblings('.dropdown-menu');
        $.each(fonts, function (idx, fontName) {
            fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
        });
        $('a[title]').tooltip({container:'body'});
      	$('.dropdown-menu input').click(function() {return false;})
  		    .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
          .keydown('esc', function () {this.value='';$(this).change();});

        $('[data-role=magic-overlay]').each(function () {
          var overlay = $(this), target = $(overlay.data('target'));
          overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
        });
        if ("onwebkitspeechchange"  in document.createElement("input")) {
          var editorOffset = $('#editor').offset();
          $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
        } else {
          $('#voiceBtn').hide();
        }
    	};

    	function showErrorAlert (reason, detail) {
    		var msg='';
    		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
    		else {
    			console.log("error uploading file", reason, detail);
    		}
    		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+
    		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
    	};

      initToolbarBootstrapBindings();
  	  $('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
      window.prettyPrint && prettyPrint();

      // end complete product

      $('#editor').bind('DOMSubtreeModified', function() {
        $('#product_complete_detail').text($(this).html());
        console.log($(this).html());
      });

      $('table #type_custom').hide();

      $('#type_product').on('change', function() {
        if ($(this).val() == 1) {
          $('table #type_custom').hide();
          $('table #type_complete').show();
        } else {
          $('table #type_complete').hide();
          $('table #type_custom').show();
        }
      });

    });
  </script>

@endsection
