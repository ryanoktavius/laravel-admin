@extends('general.html')
@section('title', 'Project Alpha')
@section('description', 'Project Alpha')
@section('css')
  <style>
    .sort-trigger {
      cursor:pointer;
    }

    .sort-trigger:hover {
      background-color: #F0F0F0;
    }

    .sort-symbol{
      font-size:12px;
      padding-top:3px;
      color:#6B6B6B;
    }

    .glyphicon-refresh-animate {
      -animation: spin .7s infinite linear;
      -webkit-animation: spin2 .7s infinite linear;
    }

    @-webkit-keyframes spin2 {
      from { -webkit-transform: rotate(0deg);}
      to { -webkit-transform: rotate(360deg);}
    }

    @keyframes spin {
      from { transform: scale(1) rotate(0deg);}
      to { transform: scale(1) rotate(360deg);}
    }
  </style>
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
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-3 form-group">
          <div class="input-group">
              <input type="hidden" id="sort_by" value="">
              <input type="hidden" id="sort_type" value="">
              <input class="form-control" id="search_textbox" name="search_textbox" value="" placeholder="Search" type="text" autofocus>
              <div class="input-group-btn">
                  <button type="button" class="btn btn-primary btn-flat" id="searh_button"><i class="fa  fa-list"></i> Show</button>
              </div>
          </div>
        </div>
      </div>
      <div id="table_container">
      </div>
    </div>
  </div>
</section>
@endsection
@section('js')
  <script>
    $(document).ready(function() {
        {{-- Table pagination link --}}
        $(document).on('click', '.pagination a', function (event) {
          event.preventDefault();
          ajaxLoad($(this).attr('href'));
        });

        {{-- Table Sorting --}}
        $(document).on('click', '.sort-trigger', function (event) {
          event.preventDefault();
          var current_sort_by   = $('#sort_by').val();
          var current_sort_type = $('#sort_type').val();
          var trigger_sort_by   = $(this).attr('sort-by');
          var sort_type = 'asc';

          if( current_sort_by == trigger_sort_by ) {
            sort_type = ( current_sort_type == 'asc' ) ? 'desc' : 'asc';
          }

          $('#sort_by').val(trigger_sort_by);
          $('#sort_type').val(sort_type);

          ajaxLoad();
        });

        $('#search_textbox').on('keypress', function (event) {
          if (event.keyCode == 13) {
            event.preventDefault();
            ajaxLoad();
          }
        });

        $('#searh_button').click(function (event) {
          event.preventDefault();
          ajaxLoad();
        });
    });

    function ajaxLoad(ajax_url) {
        var container_id = 'table_container';
        var default_ajax_url = '/paging_ajax/response_ajax_advanced';
        var data = { 'search': $('#search_textbox').val() ,
                     'sort_by': $('#sort_by').val() ,
                     'sort_type': $('#sort_type').val()
                   };

        ajax_url = typeof(ajax_url) !== 'undefined' ? ajax_url : default_ajax_url;

        $.ajax({
            type: "GET",
            url: ajax_url,
            contentType: false,
            data: data,
            dataType: 'html',
            beforeSend: function() {
              $('#searh_button').html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Please Wait').prop( "disabled", true );
              $('#search_textbox').prop('disabled',true);
              $('.pagination a').bind('click', false);
              $('#table_container').fadeTo( "fast", 0.33 );
            },
            success: function (data) {
              $("#" + container_id).html(data);
              $('#searh_button').html('<i class="fa  fa-list"></i> Show').prop( "disabled", false );
              $('#search_textbox').prop('disabled',false);
              $('.pagination a').unbind('click', false);
              $('#table_container').fadeTo( "fast", 1 );
            },
            error: function (xhr, status, error) {
                var response = jQuery.parseJSON(xhr.responseText);
                if( response.error == 'Unauthenticated.' ) {
                  location.reload();
                } else {
                  alert(response.error);
                }
            }
        });
    }
  </script>
@endsection
