<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController as MainController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slider as MainModel;

class SliderController extends MainController
{
    public $model;
    public $pathViewController = 'admin.pages.slider.';  // slider
    public $controllerName     = 'slider';
    public $inTable     = 'sliders';
    public function __construct()
    {
        $this->model = new MainModel();
        view()->share('controllerName', $this->controllerName);
        view()->share('inTable', $this->inTable);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->model->listItems();
        return view('admin.pages.slider.index', ['items' => $items]);
    }

    public function formAdd(Request $request)
    {
   
        return view('admin.pages.slider.create',[]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo '<pre>';
        print_r ($request->all());
        echo '</pre>';
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
