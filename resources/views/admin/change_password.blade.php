@extends('layouts.header_admin') @section('content')

@if (session('success'))
  <script type="text/javascript">
    swal("", "Change password success.", "success")
  </script>
@endif

@if (session('error') == 1)
  <script type="text/javascript">
    swal("", "Please check your old password.", "error")
  </script>
@elseif (session('error') == 2)
  <script type="text/javascript">
    swal("", "Please check your confirm password.", "error")
  </script>
@endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="border-radius: 0px;">
                <div class="panel-body text-center">

                    <form action="{{ url('admin/change/password') }}" method="post">
                      {{ csrf_field() }}
                      <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                          <h3>Change Password</h3>
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" name="old_password" placeholder="Enter old password" required>
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" name="new_password" placeholder="Enter new password" required>
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" name="confirm_password" placeholder="Confirm new password" required>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success" style="width: 50%;">Save</button>
                        </div>
                      </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
