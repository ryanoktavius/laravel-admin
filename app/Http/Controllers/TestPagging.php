<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Paging;

class TestPagging extends Controller
{
    public function ajax()
    {
      if (Gate::allows('test-auth')) {
        return view('page_ajax_advanced');
      } else {
        echo Auth::id();
        echo 'not auth';
      }

    }

    public function response_ajax_advanced()
    {
      if (Request::ajax()) {
        $search     =  Input::has('search')     ? trim(Input::get('search'))     : '';
        $sort_by    =  Input::has('sort_by')    ? trim(Input::get('sort_by'))    : 'id';
        $sort_type  =  Input::has('sort_type')  ? trim(Input::get('sort_type'))  : 'asc';

        $pages = new \App\Paging;
        if( $search != '' ) $pages = $pages->where('nama', 'like', '%' . $search . '%');
        if( !empty($sort_by) && !empty($sort_type) ) $pages = $pages->orderBy($sort_by,$sort_type);
        $pages = $pages->paginate(10);

        return View::make('page_ajax_advanced_list', array('pages' => $pages , 'sort_by' => $sort_by , 'sort_type' => $sort_type))->render();
      } else {
        return 'You are not authorize to acccess this site';
      }
    }

    #public function index()
    #{
      # input query
      /*
      $paging = new Paging;
      $paging->nama = 'test_nama';
      $paging->status = 'test_status';
      $paging->daerah = 'test_daerah';
      $paging->gender = 'test_gender';
      $paging->save();
      */

      # select data
      // Method 1
      // Print_r(Paging::all());
      // Method 2
      //print_r(\App\Paging::all());

      /*
      # pagination
      $pages = \App\Paging::paginate(200);
      //$links = $page->links();
      return view('paging', ['pages' => $pages]);
      */

      # update Data
      // Method 1
      /*
      $paging = new Paging;
      $paging_data = $paging->find(2);
      $paging_data->nama = 'test_nama_updated_222';
      $paging_data->save();
      $paging_data = $paging->find(3);
      $paging_data->nama = 'test_nama_updated_333';
      $paging_data->save();
      */
      // Method 2 Bulk update
      /* \App\Paging::whereBetween('id', [5, 10])
          ->update(['nama' => 'bulk_update']);
      */
    #}

    /*
    public function response_ajax()
    {
      $pages = \App\Paging::orderBy('id')
                            ->paginate(10);
      if (Request::ajax()) {
          return Response::json(View::make('page_ajax_list', array('pages' => $pages))->render());
      }
    }
    */

    /*
    public function ajax()
    {
      $pages = \App\Paging::paginate(10);
      if (Request::ajax()) {
          return Response::json(View::make('page_ajax_list', array('pages' => $pages))->render());
      }
      return View::make('paging_ajax', array('pages' => $pages));
    }
    */
}
