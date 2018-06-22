@extends('general.html')
@section('title', 'Project Alpha')
@section('description', 'Project Alpha')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Paging
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Paging</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Paging</h3>
      <input type="button" id="btn_request" value="Show">
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="posts">

      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      Footer
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->
@endsection
@section('js')
  <script>
     $(window).on('hashchange', function() {
         if (window.location.hash) {
             var page = window.location.hash.replace('#', '');
             if (page == Number.NaN || page <= 0) {
                 return false;
             } else {
                 getPosts(page);
             }
         }
     });

     $(document).ready(function() {
         $(document).on('click', '.pagination a', function (e) {
             getPosts($(this).attr('href').split('page=')[1]);
             e.preventDefault();
         });
     });

     $('#btn_request').click( function() {
       getPosts(1);
       e.preventDefault();
     });

     function getPosts(page) {
         $.ajax({
             url : 'paging_ajax/response_ajax?page=' + page,
             dataType: 'json',
         }).done(function (data) {
             $('.posts').html(data);
             location.hash = page;
         }).fail(function () {
             alert('Posts could not be loaded.');
         });
     }
  </script>
@endsection
