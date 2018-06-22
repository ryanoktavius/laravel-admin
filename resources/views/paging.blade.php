@extends('general.html')
@section('title', 'Project Alpha')
@section('description', 'Project Alpha')
@section('css')
  <link rel="stylesheet" href="{{config('custom.path.plugin')}}AdminLTE/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="{{config('custom.path.plugin')}}AdminLTE/plugins/datatables/jquery.dataTables.min.css">
@endsection
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
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <table id="example" class="table table-bordered table-striped table-hover" width="100%" cellspacing="0">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Status</th>
          <th>Daerah</th>
          <th>Gender</th>
        </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Daerah</th>
            <th>Gender</th>
          </tr>
        </tfoot>
        <tbody>
        @foreach ($pages as $page)
          <tr>
            <td>{{ $page->id }}</td>
            <td>{{ $page->nama }}</td>
            <td>{{ $page->status }}</td>
            <td>{{ $page->daerah }}</td>
            <td>{{ $page->gender }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      Footer
      {{ $pages->links() }}
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->
@endsection
@section('js')
  <script src="{{config('custom.path.plugin')}}adminLTE/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="{{config('custom.path.plugin')}}adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
  <script>
  $('#example').DataTable({
     "paging": true,
     "lengthChange": false,
     "searching": true,
     "ordering": true,
     "info": true
   });
  </script>
@endsection
