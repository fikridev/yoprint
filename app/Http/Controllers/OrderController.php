<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('welcome');
    }
    
    public function orderList()
    {

        $order = Order::all();
      

        return DataTables::of($order)
  
        ->editColumn('time', function ($row) {
            return $row->created_at;
        })
        ->editColumn('file_name', function ($row) {
            return ($row->file_name);
        })
        ->editColumn('status', function ($row) {
            $items = '<select class="form-control select2" name="status" onchange="switchStatus('.$row->id.')" id="status" data-style="form-control">';

                if($row->status == 'active') {
                    $items .= '<option selected="true" value="active">Active</option>';
                } else {
                    $items .= '<option value="active">Active</option>';
                }

                if($row->status == 'inactive') {
                    $items .= '<option selected="true" value="inactive">Inactive</option>';
                } else {
                    $items .= '<option value="inactive">Inactive</option>';
                }

                if($row->status == 'invalid') {
                    $items .= '<option selected="true" value="invalid">Invalid</option>';
                } else {
                    $items .= '<option value="invalid">Invalid</option>';
                }

                if($row->status == 'rejected') {
                    $items .= '<option selected="true" value="rejected">Rejected</option>';
                } else {
                    $items .= '<option value="Rejected">rejected</option>';
                }

            $items .= '</select>';

            return $items;
        })
        ->rawColumns(['status'])
        ->make(true);
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
