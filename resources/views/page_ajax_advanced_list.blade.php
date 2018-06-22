
<div class="table-responsive">
  <table class="table table-condensed table-striped table-hover" disabled>
      <thead>
      <tr>
          <th class="sort-trigger" sort-by="id">
              ID
              <i
                 class="glyphicon {{ $sort_by =='id'? ( $sort_type == 'asc' ? 'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt' ):'' }} sort-symbol pull-right">
              </i>
          </th>
          <th class="sort-trigger" sort-by="nama" style="cursor:pointer;">
              Nama
              <i class="glyphicon {{ $sort_by =='nama'? ( $sort_type == 'asc' ? 'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt' ):'' }} sort-symbol pull-right"></i>
          </th>
          <th class="sort-trigger" sort-by="status" style="cursor:pointer;">
              Status
              <i class="glyphicon {{ $sort_by =='status'? ( $sort_type == 'asc' ? 'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt' ):'' }} sort-symbol pull-right"></i>
          </th>
          <th class="sort-trigger" sort-by="daerah" style="cursor:pointer;">
              Daerah
              <i class="glyphicon {{ $sort_by =='daerah'? ( $sort_type == 'asc' ? 'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt' ):'' }} sort-symbol pull-right"></i>
          </th>
          <th class="sort-trigger" sort-by="gender" style="cursor:pointer;">
              Gender
              <i class="glyphicon {{ $sort_by =='gender'? ( $sort_type == 'asc' ? 'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt' ):'' }} sort-symbol pull-right"></i>
          </th>
      </tr>
      </thead>
      <tbody>
      @if ( $pages->total() > 0)
        @foreach($pages as $page)
          <tr>
            <td>{{$page->id}}</td>
            <td>{{$page->nama}}</td>
            <td>{{$page->status}}</td>
            <td>{{$page->daerah}}</td>
            <td>{{$page->gender}}</td>
          </tr>
        @endforeach
      @else
        <tr>
          <td class="text-center" colspan="5">No matching record found</td>
        </tr>
      @endif
      </tbody>
  </table>
</div>
<div class="row">
    <div class="col-sm-6">
      <div style="padding:20px 5px;">Total : <b>{{$pages->total()}}</b> @if( $pages->total() > 1) records @else record @endif</div>
    </div>
    <div class="col-sm-6">
      <div class="pull-right">{!! str_replace('/?','?',$pages->render()) !!}</div>
    <div>
</div>
