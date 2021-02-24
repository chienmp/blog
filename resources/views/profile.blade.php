<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ trans('Profile') }}</title>
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h1>{{ trans('Edit profile') }}</h1>
    <hr>
    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('profile.update') }}">
      <div class="row">
        <!-- left column -->
        <div class="col-md-3">
          <div class="text-center">
            @csrf
            <img id="img" src="{{ asset('storage/avatar/'. $user->image) }}" class="avatar img-circle" alt="avatar">
            <h6>{{ trans('upload_image') }}</h6>
            <input type="file" name="image" onchange="loadFile(event)" class="form-control">
          </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
          <h3>{{ trans('personal_info') }}</h3>
          <div class="form-group">
            <label class="col-lg-3 control-label">{{ trans('name') }}</label>
            <div class="col-lg-8">
              <input class="form-control" name="name" type="text" value="{{ Auth::user()->name }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" value="{{ Auth::user()->email }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="{{ trans('submit') }}">
              <span></span>
              <input type="reset" class="btn btn-outline-info" value="{{ trans('Cancel') }}">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <hr>
  <script>
    var loadFile = function(event) {
        document.getElementById("img").height = "200";
        document.getElementById("img").width = "200";
        var output = document.getElementById('img');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

  </script>
</body>

</html>
