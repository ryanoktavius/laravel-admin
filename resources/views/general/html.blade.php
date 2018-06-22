<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="{{config('custom.author')}}">
    <title>{{config('app.name')}} @yield('title')</title>
    @include('general.css')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      @include('general.header')
      @include('general.sidebar_navigation')
      <div class="content-wrapper">
        @yield('content')
      </div>
      @include('general.footer')
    </div>
    @include('general.js')
  </body>
</html>
