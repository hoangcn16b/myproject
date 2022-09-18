<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category as MainModel;

class CategoryController extends Controller
{
    public $model;
    public $pathViewController = 'admin.pages.category.';  // slider
    public $controllerName     = 'category';
    public $inTable     = 'categories';
    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        view()->share('inTable', $this->inTable);
        $this->model = new MainModel();
        $this->model->fixTree();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $this->params['search']['field']  = $request->input('search_field', ''); // all id description
        $this->params['search']['value']  = $request->input('search_value', '');
        $this->params['search']['filter']  = $request->input('search_filter', '');

        $items = $this->model->listItems($this->params, ['task' => 'admin-list']);
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
        return view('admin.pages.category.index', [
            'items' => $items,
            'params' => $this->params,
            'itemsStatusCount' => $itemsStatusCount
        ]);
    }

    public function ordering(Request $request)
    {
        // dd($request->all());
        $params["currentOrdering"]   = $request->ordering;
        $params["id"]               = $request->id;
        $this->model->changeOrdering($params);
        $notify = 'Update success';
        return redirect()->route('admin/category/index')->with('zvn_notify', $notify);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
