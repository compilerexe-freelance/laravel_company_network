@extends('layouts.header') @section('content')

    <script>
        @if (session('status') == 'success')
            swal("", "Upload Complete.", "success")
        @endif

        @if (session('status') == 'error')
            swal("", "Please upload file type jpg or png only.", "error")
        @endif
    </script>

<div class="container">
    <div class="row">

        <div class="col-md-12" style="//margin-top: 30px;">

            <div class="panel panel-default">

                <div class="panel-body">

                    <form action="{{ url('quotation/upload') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-4 col-md-offset-4">
                            <div class="form-group">
                                <div class="form-group"><strong>QUOTATION ( FILE TYPE JPG, PNG )</strong></div>
                                <div class="form-group"><input type="file" name="file_upload1" required></div>
                                <div class="form-group"><input type="file" name="file_upload2"></div>
                                <div class="form-group"><input type="file" name="file_upload3"></div>
                                <div class="form-group"><input type="file" name="file_upload4"></div>
                                <div class="form-group"><input type="file" name="file_upload5"></div>
                            </div>
                            <div class="form-group">
                                <div class="form-group"><button type="submit" class="btn btn-success" style="width: 100%;">อัพโหลด ใบเสนอราคา</button></div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
