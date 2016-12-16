@extends('layouts.header_admin') @section('content')

<div class="row">
    <div class="col-md">
        <div class="card" style="border-radius: 0px;">
            <div class="card-block text-md-center">

                <div class="col-md-10 offset-md-1">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-md-center">No.</th>
                                <th class="text-md-center">Type</th>
                                <th class="text-md-center">Link Product</th>
                                <th class="text-md-center">Product Name</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($custom_products as $custom_product)
                            <tr>
                                <td class="align-middle text-md-center">{{ $loop->iteration }}</td>
                                <td class="align-middle text-md-center">custom</td>
                                <td class="align-middle text-md-center">
                                    @php $product = App\Product::find($custom_product->id_product); echo $product->product_name; @endphp
                                </td>
                                <td class="align-middle text-md-center">{{ $custom_product->product_name }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="col-md-10 offset-md-1" style="border: 1px solid #abc; border-radius: 5px;">

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="table-none-border"></th>
                                <th class="table-none-border"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-md-right table-none-border"></td>
                                <td class="table-none-border">
                                    <strong style="color: blue; font-size: 20px;">UPDATE</strong>
                                </td>
                            </tr>

                            <!-- start type custom -->
                            <tr id="type_custom">
                                <form id="type_custom" action="{{ url('admin/manage/product/complete/custom/update'.$get_custom_product->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <td class="align-middle text-md-right table-none-border">Link Product</td>
                                    <td class="table-none-border">
                                        <select class="form-control" name="link_product" id="link_product" disabled>
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
                            <tr id="type_custom">
                                <td class="align-middle text-md-right table-none-border">Product Name</td>
                                <td class="table-none-border">
                                    <input type="text" class="form-control" name="product_name" value="{{ $get_custom_product->product_name }}">
                                </td>
                            </tr>
                            <tr id="type_custom">
                                <td class="align-middle text-md-right table-none-border">Detail</td>
                                <td class="table-none-border">
                                    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor" style="border: 1px solid #abc; margin: 0 auto;">
                                        <div class="btn-group">
                                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a data-edit="fontSize 5">
                                                        <font size="5">Huge</font>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-edit="fontSize 3">
                                                        <font size="3">Normal</font>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-edit="fontSize 1">
                                                        <font size="1">Small</font>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
                                            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
                                            <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
                                            <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
                                            <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
                                            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
                                            <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
                                            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
                                            <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
                                            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
                                            <div class="dropdown-menu input-append">
                                                <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                                <button class="btn" type="button">Add</button>
                                            </div>
                                            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>

                                        </div>

                                        <!-- <div class="btn-group">
                                <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
                                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                              </div> -->
                                        <div class="btn-group">
                                            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
                                            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
                                        </div>
                                        <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
                                    </div>

                                    <div id="editor" contenteditable="true">
                                        {!! $get_custom_product->product_detail !!}
                                    </div>

                                    <textarea name="product_detail" id="product_detail" rows="8" cols="80" hidden></textarea>
                                </td>
                            </tr>
                            <!-- end product_detail -->
                            <tr id="type_custom">
                                <td class="align-middle text-md-right table-none-border">Picture</td>
                                <td class="table-none-border text-md-left">
                                    <input type="file" name="product_picture" disabled>
                                </td>
                            </tr>
                            <tr id="type_custom">
                                <td class="align-middle text-md-right table-none-border">Product Price</td>
                                <td class="table-none-border text-md-left">
                                    <input type="text" class="form-control" name="product_price" value="{{ $get_custom_product->product_price }}">
                                </td>
                            </tr>
                            <tr id="type_custom">
                                <td class="align-middle text-md-right table-none-border"></td>
                                <td class="table-none-border text-md-left">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success" name="button" style="width: 100%;">Save</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ url('admin/manage/product/complete') }}"><button type="button" class="btn btn-danger" name="button" style="width: 100%;">Cancel</button></a>
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
        $('#enabled_change_sub_category').on('change', function() {
            if ($(this).is(':checked')) {
                $('#id_sub_category').prop('disabled', false);
            } else {
                $('#id_sub_category').prop('disabled', true);
            }
        });

        $('#enabled_change_picture').on('change', function() {
            if ($(this).is(':checked')) {
                $('#product_picture').prop('disabled', false);
            } else {
                $('#product_picture').prop('disabled', true);
            }
        });

        function initToolbarBootstrapBindings() {
            var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                    'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                    'Times New Roman', 'Verdana'
                ],
                fontTarget = $('[title=Font]').siblings('.dropdown-menu');
            $.each(fonts, function(idx, fontName) {
                fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
            });
            $('a[title]').tooltip({
                container: 'body'
            });
            $('.dropdown-menu input').click(function() {
                    return false;
                })
                .change(function() {
                    $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                })
                .keydown('esc', function() {
                    this.value = '';
                    $(this).change();
                });

            $('[data-role=magic-overlay]').each(function() {
                var overlay = $(this),
                    target = $(overlay.data('target'));
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
            });
            if ("onwebkitspeechchange" in document.createElement("input")) {
                var editorOffset = $('#editor').offset();
                $('#voiceBtn').css('position', 'absolute').offset({
                    top: editorOffset.top,
                    left: editorOffset.left + $('#editor').innerWidth() - 35
                });
            } else {
                $('#voiceBtn').hide();
            }
        };

        function showErrorAlert(reason, detail) {
            var msg = '';
            if (reason === 'unsupported-file-type') {
                msg = "Unsupported format " + detail;
            } else {
                console.log("error uploading file", reason, detail);
            }
            $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        };

        initToolbarBootstrapBindings();
        $('#editor').wysiwyg({
            fileUploadError: showErrorAlert
        });
        window.prettyPrint && prettyPrint();

        $('#editor').bind('DOMSubtreeModified', function() {
            $('#product_detail').text($(this).html());
            console.log($(this).html());
        });

    });
</script>

@endsection
