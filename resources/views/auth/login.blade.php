@extends('general.html_login')
@section('title', 'Project Alpha')
@section('description', 'Project Alpha')
@section('css')
  <link rel="stylesheet" href="{{config('custom.path.css')}}login.css">
@endsection
@section('content')
    <div class="login-box">
      <div class="login-logo">
          <a href="{{ url('/') }}"><img src="{{config('custom.path.img')}}ktm-logo-med.png"></a>
      </div>
      <div class="login-box-body">
          <p class="login-box-msg"><b>Alpha Project</b></p>
            <form method="POST" role="form" action="{{ url('/') }}">
              {{ csrf_field() }}
              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                @if ($errors->has('username'))
                    <div class="callout callout-danger">
                      <span class="glyphicon glyphicon-ban-circle"></span><span> {{ $errors->first('username') }}</span>
                    </div>
                @endif
                @if ($errors->has('password'))
                    <div class="callout callout-danger">
                      <span class="glyphicon glyphicon-ban-circle"></span><span> {{ $errors->first('password') }}</span>
                    </div>
                @endif
                <div class="form-group has-feedback">
                    <input type="input" id="username" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" autocomplete="off" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
              </div>
              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <div class="form-group has-feedback">
                    <input type="password" id="password" class="form-control" placeholder="Password" name="password" value="" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
              </div>
              <div class="row">
                  <div class="col-xs-6">
                  </div>
                  <div class="col-xs-6">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                  </div>
              </div>
          </form>
      </div>
    </div>
    <footer class="footer">
      <div class="container login-footer">
        <span class="glyphicon glyphicon-copyright-mark"></span>&nbsp;<span>PT. Kebun Tebu Mas</span>
      </div>
    </footer>
@endsection
