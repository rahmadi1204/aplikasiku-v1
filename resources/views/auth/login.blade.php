
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.css">
  <link rel="stylesheet" href="../../dist/css/extra.css">
  <link rel="icon" href="../../dist/img/favicon.ico"/>
</head>
<body class="hold-transition login-page">
    <x-alert></x-alert>
<div class="login-box">
  <div class="login-logo">
    <a href="/register"><b>{{ config('app.name') }}</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-header">
        <div class="card-title">
            <div class="dot1"></div>
            <div class="dot2"></div>
            <div class="dot3"></div>
        </div>
    </div>
    <div class="card-body">
      <form action="{{ route('login') }}" method="post">
          @csrf

        <div class="input-group mt-1">
          <input name="username" type="text" class="form-control" placeholder="Username" value="{{ old('username') ?? '' }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('username')
        <div class="text-danger text-sm">
            {{ $message }}
        </div>
        @enderror
        <div class="input-group mt-3">
          <input id="password" name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
        <div class="text-danger text-sm">
            {{ $message }}
        </div>
        @enderror
        <div class="row mt-3">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" onclick="showPassword()">
              <label for="remember">
               Show Password
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script>
    function showPassword() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
</body>
</html>
