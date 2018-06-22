<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Status</th>
      <th>Daerah</th>
      <th>Gender</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($pages as $page)
      <tr>
        <td>{{$page->id}}</td>
        <td>{{$page->nama}}</td>
        <td>{{$page->status}}</td>
        <td>{{$page->daerah}}</td>
        <td>{{$page->gender}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $pages->links() }}
