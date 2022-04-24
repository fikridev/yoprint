<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
            return ($row->filename);
        })
        ->editColumn('status', function ($row) {

            if($row->status == 'pending') {
                $status = '<span class="badge alert-info">Pending</span>';
            }

            if($row->status == 'processing') {
                $status = '<span class="badge alert-warning">Processing</span>';
            }

            if($row->status == 'failed') {
                $status = '<span class="badge alert-danger">Failed</span>';
            }

            if($row->status == 'completed') {
                $status = '<span class="badge alert-success">Completed</span>';
            }

            return $status;

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
